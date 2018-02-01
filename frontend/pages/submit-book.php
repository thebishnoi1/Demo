<?php
require(plugin_dir_path( __FILE__ ).'../../include/website_form_helper.php');
global $wpdb;

$current_user = wp_get_current_user();
$id=get_the_ID ();
$main=get_permalink( $id);
// echo "string";
// this 2 functions are helper for generating buttons for websites + hidden form.
function print_form_opening($display_name, $web, $form_id, $submited)
{
	$notice = "";
	$button_class = "popup_btn ";
	$is_submited = 0;
	foreach ($submited as $key => $value) {
		if($value->url == $form_id){
			$notice = '<div class="form-notice"><h2>NOTICE:</h2>Your book has been already submitted to this site!</div>';
			$button_class .= 'submited';
			$is_submited = 1;
			break;
		}
	}
	//var_dump($submited);
	//print_r($all_urls);
	echo '
		<button id="btn-' . $form_id . '" class="' . $button_class.' newclass" data-popup-target="#' . $form_id . '" data-submited = "'.$is_submited.'">
			<img src="//www.google.com/s2/favicons?domain=http://' . $web . '/"><br>' . $display_name . '
		</button>
		<div id="' . $form_id . '" class="popup" data-submited = "'.$is_submited.'">
			<div class="popup-body">
				<span class="popup-exit"></span>
				<div class="popup-content">
					<h2 class="popup-title">' . $display_name . '</h2>' . $notice . '
					<form id="' . $form_id . '-form" data-id="' . $form_id . '" onsubmit="submit_book_form(this); return false;" enctype="multipart/form-data">
					<div id="' . $form_id . '-content">
	';
}

function print_form_body($data)
{
	$output = '';

	foreach ($data as $field) {
		if(isset($field['required']) && $field['required'] == 1) {
			$required = ' *';
		} else {
			$required = '';
		}
		if ($field['input'] == 'input') {
			if($field['type']=="radio")
			{
					$output .= '<p><label>' . $field['form-label'] . $required . '</label>';
			if (isset($field['note'])) {
				$output .= '<span class="ebook-form-hint">' . $field['note'] . '</span>';
			}
			$output .= '<input style="margin-right:10px;float:left;" type="' . $field['type'] . '" name="' . $field['name'] . '" value="' . $field['value'] . '"';
			$output .= $field['required'] == 1 ? ' required=""' : '';
			$output .= isset($field['class']) ? ' class="' . $field['class'] . '"' : '';
			$output .= '></p>';
			}
			else{
					$output .= '<p><label>' . $field['form-label'] . $required . '</label><br>';
			if (isset($field['note'])) {
				$output .= '<span class="ebook-form-hint">' . $field['note'] . '</span><br>';
			}
			$output .= '<input type="' . $field['type'] . '" name="' . $field['name'] . '" value="' . $field['value'] . '"';
			$output .= $field['required'] == 1 ? ' required=""' : '';
			$output .= isset($field['class']) ? ' class="' . $field['class'] . '"' : '';
			$output .= '></p>';
			}
		
		} else if ($field['input'] == 'textarea') {
			$output .= '<p><label>' . $field['form-label'] . $required . '</label><br>';
			if (isset($field['note'])) {
				$output .= '<span class="ebook-form-hint">' . $field['note'] . '</span><br>';
			}
			$output .= '<textarea cols="60" rows="8" name="' . $field['name'] . '"';
			$output .= $field['required'] == 1 ? 'required=""' : '';
			$output .= '>' . $field['value'] . '</textarea></p>';
		} else if ($field['input'] == 'hidden') {
			$output .= '<input type="hidden" name="' . $field['name'] . '" value="' . $field['value'] . '">';
		} else if ($field['input'] == 'checkboxes') {
			$output .= '<p><label>' . $field['form-label'] . $required . '</label><br>';
			if (isset($field['note'])) {
				$output .= '<span class="ebook-form-hint">' . $field['note'] . '</span><br>';
			}
			foreach ($field['values'] as $key => $value) {
				if($key != 'checked') {
					$key = '';
				}
				$output .= '<input type="checkbox" name="' . $field['name'] . $required . '" value="' . $value . '" '. $key .'> ' . $value . '<br>';
			}
		} else if ($field['input'] == 'checkbox') {
			$output .= '<br><input type="checkbox" name="' . $field['name'] . '" value="' . $field['value'] . '" '. $field['selected'] .'> ' . $field['label'] . '<br>';
		} else if ($field['input'] == 'label') {
			$output .= '<p><label>' . $field['form-label'] . '</label><br>';
			if (isset($field['note'])) {
				$output .= '<span class="ebook-form-hint">' . $field['note'] . '</span><br>';
			}
		} else if ($field['input'] == 'select') {
			$output .= '<p><label>' . $field['form-label'] . '</label><br>';
			if (isset($field['note'])) {
				$output .= '<span class="ebook-form-hint">' . $field['note'] . '</span><br>';
			}
			$output .= '<select name="' . $field['name'] . '">';
			foreach ($field['values'] as $key => $value) {
				$output .= '<option " value="' . $key . '"> ' . $value . '</option>';
			}
			$output .= '</select>';
		} else if ($field['input'] == 'custom') {
			$output .= $field['value'];
		}
	}

	echo $output;
}


function print_form_end($form_id, $book_id)
{

	// Check if this is last form and hide "Next" button:
	$all_forms = get_form_data_array($book_id);
	foreach($all_forms as $k => $v)
	{
		$last_form_id = $v['settings']['id'];
	}
	unset($all_forms);

	$hideNext = false;
	if($form_id == $last_form_id){
		$hideNext = true;
	}

	echo '
			<input type="hidden" name="submission_to" value="' . $form_id . '">
			<input type="hidden" name="book_id" value="' . $book_id . '">
			</div>
			<button data-id="' . $form_id . '" id="' . $form_id . '-submit" class="button button-primary">
					Submit
				</button>
				<button class="button button-primary" onclick="clear_popup(); return false;">
					Close
				</button>';

	if( $hideNext === false){
		echo '
				<button id="' . $form_id . '-next" class="button button-primary" onclick="open_next_form(\'' . $form_id . '\'); return false;" disabled>
					Next
				</button>';
	} else {
		echo '<span id="'.$form_id.'-last" style="visibility: hidden;">true</span>';
	}
	echo '
			</form>

			</div></div></div>
	';
}

function print_form($display_name, $web, $id, $form_data, $book_id, $submitted)
{
	print_form_opening($display_name, $web, $id, $submitted);
	print_form_body($form_data[$id]);
	print_form_end($id, $book_id);
}

// Get book id from session
$book_id = $_SESSION['book_id'];

if (empty($book_id)) {
	echo 'Error';
	return;
}

// Get current user
$current_user = wp_get_current_user();
//session_start();
$_SESSION['user'] = $current_user;
global $wpdb;

// get book info
$book = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . BSP_BST_TABLE . "  WHERE id=" . $book_id, OBJECT);

if (!$book) {
	echo 'Book not found';
	return;
}

$completed_forms = $wpdb->get_results("SELECT DISTINCT url FROM " . $wpdb->prefix . BSP_BST_BOOK_URL . " WHERE book_id = " . $book_id, OBJECT);
 
 $all_urls=array();
 foreach ($completed_forms as $test) {
   array_push( $all_urls, $test->url);
    //echo $test->url;
}
 

//print_r($completed_forms);
$completed = count($completed_forms);

//$websites = get_websites_array();

$websites = get_form_data_array($book);

$to_complete = count($websites) - $completed;

$submitted = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . BSP_BST_BOOK_URL . " WHERE book_id = " . $book_id, OBJECT);

wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
?>

<style>
	<?php include( dirname(__FILE__) . '/../../css/style.css');?>
</style>

<? bsp_bst_expand_menu(); ?>

<script type="text/javascript">
	jQuery(document).ready(function () {
		jQuery('.datepicker').datepicker({
			dateFormat: 'mm/dd/yy'
		})
	});

	jQuery(window).load(function () {

		// events for opening/closing forms
		jQuery(document).ready(function ($) {

			jQuery('[data-popup-target]').click(function () {
				$('html').addClass('overlay');
				var activePopup = $(this).attr('data-popup-target');
				$(activePopup).addClass('visible');

			});

			jQuery(document).keyup(function (e) {
				if (e.keyCode == 27 && $('html').hasClass('overlay')) {
					clear_popup();
				}
			});

			$('.popup-exit').click(function () {
				clear_popup();
			});

			$('.popup-overlay').click(function () {
				clear_popup();
			});
		});
	});

	// Close form
	function clear_popup() {
		jQuery('.popup.visible').removeClass('visible');
		jQuery('html').removeClass('overlay');

		setTimeout(function () {
			jQuery('.popup').removeClass('transitioning');
		}, 200);
	}

	// function for opening next form
	function open_next_form(current_id) {
		var current_form_passed = 0;
		jQuery(".popup").each(function (index) {

			if (current_id == jQuery(this).attr('id')) {
				current_form_passed = 1;
			} else {
				if (current_form_passed === 1) {
					jQuery('.popup.visible').removeClass('visible');
					jQuery('html').removeClass('overlay');
					open_popup('#' + jQuery(this).attr('id'));
					return false;
				}
			}
		});
	}

	// function for opening next form
	function open_first_unsubmited_form() {
		//var current_form_passed = 0;
		jQuery(".popup").each(function (index) {

			if(jQuery(this).attr('data-submited') == 0) {
				jQuery('.popup.visible').removeClass('visible');
				jQuery('html').removeClass('overlay');
				open_popup('#' + jQuery(this).attr('id'));
				return false;
			}
		});
	}

	function open_popup(id) {
		jQuery('html').addClass('overlay');
		jQuery(id).addClass('visible');
	}

	function submit_book_form(el) {
		var id = jQuery(el).attr('data-id');
		var form_id = id + '-form';

		var d = jQuery('#' + form_id).serialize();
		d += "&cacheavoid="+Math.random();

		var submit = jQuery('#' + id + '-submit');
		submit.html('Loading');
		submit.attr('disabled', 'disabled');

		jQuery.ajax({
			url: '<?= plugins_url( '../../ajax/submit-book.php', __FILE__ ) ?>',
			type: 'POST',
			data: d,
			success: function (res) {
				console.log(res);
				if (res == 1 || res == 2) {
					if(res == 1)
					{

					jQuery('#' + id + '-content').html('<div class="email_sent">Email Sent !</div><div class="message_box_success">Book submited! Click on NEXT to start new submission.</div>');
					}
					else{
					jQuery('#' + id + '-content').html('<div class="email_sent">Email sending failed!</div><div class="message_box_success">Book submited! Click on NEXT to start new submission.</div>');

					}
					jQuery('#btn-' + id).addClass("submited");
					submit.html('Book submited');
					var next = jQuery('#' + id + '-next');
					next.prop("disabled", false);
					if( jQuery('#' + id + '-last').html()=='true'){
						jQuery('#' + id + '-form').append(
							'<a class="button button-primary" onclick="window.location.reload();">'
								+ 'Finish'
							+ '</a>'
						);
					}
				} else {
					alert(res);
					jQuery('#resultss').html(res);
					//console.log(res);
					submit.html('Submit');
					submit.removeAttr('disabled');
				}

				window.location = '#'; // Scroll to the top!

				return false;
			}
		})
		return false;
	}
</script>

<hr>
<div class="submission-box">
<span style="color: #112743; font-size: 16px;"><b>You Are About To Submit:</b></span><br />
<span style="color: #112743; font-size: 18px;"> "<?= $book->book_title ?>"</span>
</div>
<div class="getstarted-box">

	<span style="color: #325c21"><b>Getting Started:</b> To begin using our Book Submission Tool, click the GREEN button below that says "Click to start submitting".  You will then see a pop-up hover over the page with your book's information preloaded into the book submission form.  <b>PLEASE NOTE</b> that some fields will require you to input information MANUALLY such as Twitter handle and Genre. You will click the "SUBMIT" button at the bottom of the form and be taken to the next submission website.  Continue this process until you have hit the last website. </span> 

</div>

<div class="note-box">

	<span style="color: #c09853"><b>Note:</b> This tool deal with many websites that all have their own structure and functions.  At times you may try to submit your book to a website with our tool and receive an error message in return.  Just cancel and move on to the next site.  We will be automatically notified when you receive these errors.  If you receive an abnormal amount of error messages then feel free to send us an email <b>(steve@bestsellerpublishing.org)</b>.</span>

</div>
<div id="submission-info">
	<div class="sites-remaining">
		<center><span style="color: #ffffff; font-size: 25px;"><?= $to_complete; ?> </span>
		<br /> <span style="color: #ffffff; font-size: 21px;">Sites remaining</span></center>
	</div>
	<div class="sites-completed">
		<center><span style="color: #ffffff; font-size: 25px;"><?= $completed; ?> </span>
		<br /> <span style="color: #ffffff; font-size: 21px;">Sites completed</span></center>
	</div>
	<div class="edit-button">
		<button class="button button-primary" 
		        onclick="window.location.href='<?php echo $main."?page=add-edit-book&book-id=" . $book_id; ?>'"
		>Edit book</button>	
	</div>	
</div>
<div style="clear: both"></div>

<button class="popup_btn green" onclick="open_first_unsubmited_form()">Click to start <br />submiting<br/>
</button>
<!-- START of form for Coupon crazy mom-->

<?php

/*foreach ($websites as $key => $value) {
	//print_form($value['display_name'], $value['web'], $value['id'], $form_data, $book->id, $submitted);
}*/

foreach ($websites as $key => $value) {
	print_form(
		$value['settings']['display_name'],
		$value['settings']['web'],
		$value['settings']['id'],
		$websites,
		$book->id,
		$submitted
	);
}

?>
<br />
<br />
<!--<h1>Additional Free Book Submission Websites (Manually Submitted)</h1>
<div class="note-box">

	<span style="color: #c09853">Click any of the buttons below and you will be taken directly to a website that will allow you the opportunity to manually submit your FREE book promotion to their website.  All are Free and some have paid options.  <b>PLEASE NOTE</b> that some of these websites do not guarantee that they will promote your site.  Also, be aware that some websites have strict requirements on the number of reviews as well as rating.</span>

</div>
<?php
// $additionalSitesSubmitTo=array();
// for ($i=0; $i <30 ; $i++) { 
// 	// array_push(array, var)
// 	$mk_notes_url=get_option('mk_notes_url_'.$i);
// 	$notes_mk=get_option('notes_mk_'.$i);
// 	$additionalSitesSubmitTo[$mk_notes_url]=$notes_mk;
// 	# code...
// }
?>
<div class="additionalSitesSubmitTo">
	<?php foreach($additionalSitesSubmitTo as $k => $v){?>
		<a href="<?=$k?>" target="blank">
			<button class="popup_btn"><?=$v?></button>
		</a>
	<?php } ?>
</div>
<br />
<br />
<h1>Paid Submission Options</h1>
<div class="note-box">

	<span style="color: #c09853">These sites offer GUARANTEED paid promotion.  They offer many different types of promotion like: Facebook posts, Tweets, Email Blasts and Premium Website Listings.  Prices range from $4 to $30 and some require you to sign up for an account in order to purchase any of their promotion.</span>

</div>
<?php
$paidSites=array();
for ($i=0; $i <21 ; $i++) { 
	// array_push(array, var)
	$paid_mk_notes_url=get_option('paid_mk_notes_url_'.$i);
	$paid_notes_mk=get_option('paid_notes_mk_'.$i);
	$paidSites[$paid_mk_notes_url]=$paid_notes_mk;
	# code...
}

?>

<div class="additionalSitesSubmitTo">
	<?php foreach($paidSites as $k => $v){?>
		<a href="<?=$k?>" target="blank">
			<button class="popup_btn"><?=$v?></button>
		</a>
	<?php } ?>
</div>
<br />
<br />-->

<h1> <span>Additional Free Book Submission Websites</span> </h1>
<div class="note-box"><span style="color: #c09853">Click any of the buttons below and you will be taken directly to a website that will allow you the opportunity to manually submit your FREE book promotion to their website.  All are Free and some have paid options.  <b>PLEASE NOTE</b> that some of these websites do not guarantee that they will promote your site.  Also, be aware that some websites have strict requirements on the number of reviews as well as rating.</span></div>
	
	<!-- get -->

<table class="responstable">
  
  <tr>
    <!-- <th>Main driver</th> -->
    <th data-th="Driver details"><span>URL</span></th>
    <th>Notes</th>
<!--     <th>Date of birth</th>
    <th>Relationship</th> -->
  </tr>
  <?php for ($i=0; $i < get_option('additional_set_count_name'); $i++) { 
	$mk_notes_url=get_option('mk_notes_url_'.$i);
	$notes_mk=get_option('notes_mk_'.$i); 
	$title_mk=get_option('title_mk_'.$i); 


	?>
  	
  <tr>
    <td name="mk_notes_url_<?php echo $i; ?>"> <a href="<?php echo $mk_notes_url;  ?>" target="_blank"><i class="fa fa-link" aria-hidden="true"> </i> <?php echo $title_mk;  ?></a></td>
    <td name="notes_mk_<?php echo $i; ?>"><?php echo $notes_mk; ?></td>
    <!-- <td>Foo</td> -->
  </tr>
 <?php } ?>
 
  
</table>
	
<h1> <span>Paid Submission Options</span> </h1>
	<div class="note-box"><span style="color: #c09853">These sites offer GUARANTEED paid promotion.  They offer many different types of promotion like: Facebook posts, Tweets, Email Blasts and Premium Website Listings.  Prices range from $4 to $30 and some require you to sign up for an account in order to purchase any of their promotion.
	<br />
	<b>NOTE: We do not use EVERY site. We listed these sites in order of OUR priority.   </span></div>
	<!-- get -->

<table class="responstable">
  
  <tr>
    <!-- <th>Main driver</th> -->
    <th data-th="Driver details"><span>URL</span></th>
    <th>Notes</th>
<!--     <th>Date of birth</th>
    <th>Relationship</th> -->
  </tr>
  <?php for ($i=0; $i < get_option('paid_additional_set_count_name'); $i++) { 
	$paid_mk_notes_url=get_option('paid_mk_notes_url_'.$i);
	$paid_notes_mk=get_option('paid_notes_mk_'.$i);
	$paid_title_mk=get_option('paid_title_mk_'.$i); 


	 ?>
  	
  <tr>
    <td name="paid_mk_notes_url_<?php echo $i; ?>"> <a href="<?php echo $paid_mk_notes_url;  ?>" target="_blank"><i class="fa fa-link" aria-hidden="true"> </i> <?php echo $paid_title_mk;  ?></a></td>
    <td name="paid_notes_mk_<?php echo $i; ?>"><?php echo $paid_notes_mk; ?></td>
    <!-- <td>Foo</td> -->
  </tr>
 <?php } ?>
 
  
</table>
<style type="text/css" media="screen">
		/*

RESPONSTABLE 2.0 by jordyvanraaij
  Designed mobile first!

If you like this solution, you might also want to check out the 1.0 version:
  https://gist.github.com/jordyvanraaij/9069194

*/
/*************************foe additional sites css*******************/
.responstable {
  margin: 1em 0;
  width: 100%;
  overflow: hidden;
  background: #FFF;
  color: #024457;
  border-radius: 10px;
  border: 1px solid #167F92;
}

.note-box {
    padding: 8px 35px 8px 14px;
    margin-bottom: 20px;
    text-shadow: 0 1px 0 rgba(255,255,255,0.5);
    background-color: #fcf8e3;
    border: 1px solid #c09853;
width: 95%;
align: center;}

.responstable td{
    border-radius: 3px;
    height: 25px;
    line-height: 25px;
    border: 1px solid #eee;
    /*padding: 6px 12px;*/
  }
.responstable tr {
  border: 1px solid #D9E4E6;
}
.responstable tr:nth-child(odd) {
  background-color: #EAF3F3;
}
.responstable th {
  display: none;
  border: 1px solid #FFF;
  background-color: #167F92;
  color: #FFF;
  padding: 1em;
}
.responstable th:first-child {
  display: table-cell;
  text-align: center;
}
.mk_front table td:first-child{
  background: none !important;
}
.mk_front table td:first-child{
	/*padding: 0px 10px;*/
	text-align: left;
	font-weight: bold;
}
.mk_front table td{
	   padding:0.5% 2% 0.5% 2%; 

}
.responstable th:nth-child(2) {
  display: table-cell;
}
.responstable th:nth-child(2) span {
  display: none;
}
.responstable th:nth-child(2):after {
  content: attr(data-th);
}
@media (min-width: 480px) {
  .responstable th:nth-child(2) span {
    display: block;
  }
  .responstable th:nth-child(2):after {
    display: none;
  }
}
.responstable td {
  display: block;
  word-wrap: break-word;
  max-width: 7em;
}
.responstable td:first-child {
  display: table-cell;
  text-align: center;
  border-right: 1px solid #D9E4E6;
}
@media (min-width: 480px) {
  .responstable td {
    border: 1px solid #D9E4E6;
  }
}
.responstable th, .responstable td {
  text-align: left;
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .responstable th, .responstable td {
    display: table-cell;
    padding: 1em;
  }
}

body {
  padding: 0 2em;
  font-family: Arial, sans-serif;
  color: #024457;
  background: #f2f2f2;
}

h1 {
  font-family: Verdana;
  font-weight: normal;
  color: #024457;
}
h1 span {
  color: #167F92;
}
/*input {
	width: 100%;
}*/
input[type="submit"] {
    width: 123px;
    text-align: center;
    margin: 0 auto;
    background: green;
    color: #fff;
    border: none;
    padding: 12px;
}
	</style>

<div id="resultss"></div>

<div class="popup-overlay"></div>
