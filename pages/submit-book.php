<?php
include(plugin_dir_path( __FILE__ ).'../include/website_form_helper.php');

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
			$output .= '<p><label>' . $field['form-label'] . $required . '</label><br>';
			if (isset($field['note'])) {
				$output .= '<span class="ebook-form-hint">' . $field['note'] . '</span><br>';
			}
			$output .= '<input type="' . $field['type'] . '" name="' . $field['name'] . '" value="' . $field['value'] . '"';
			$output .= $field['required'] == 1 ? ' required=""' : '';
			$output .= isset($field['class']) ? ' class="' . $field['class'] . '"' : '';
			$output .= '></p>';
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
	<?php include( dirname(__FILE__) . '/../css/style.css');?>
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
			url: '<?= plugins_url( '../ajax/submit-book.php', __FILE__ ) ?>',
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
		        onclick="window.location.href='<?php print(admin_url('admin.php?page=add-edit-book&book-id=') . $book_id); ?>'"
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
<h1>Additional Free Book Submission Websites (Manually Submitted)</h1>
<div class="note-box">

	<span style="color: #c09853">Click any of the buttons below and you will be taken directly to a website that will allow you the opportunity to manually submit your FREE book promotion to their website.  All are Free and some have paid options.  <b>PLEASE NOTE</b> that some of these websites do not guarantee that they will promote your site.  Also, be aware that some websites have strict requirements on the number of reviews as well as rating.</span>

</div>
<?php
$additionalSitesSubmitTo=array();
for ($i=0; $i <get_option('additional_set_count_name') ; $i++) { 
	// array_push(array, var)
	$mk_notes_url=get_option('mk_notes_url_'.$i);
	$notes_mk=get_option('notes_mk_'.$i);
	$additionalSitesSubmitTo[$mk_notes_url]=$notes_mk;
	# code...
}
	// $additionalSitesSubmitTo = array(
	// 	'http://digitalbooktoday.com/12-top-100-submit-your-free-book-to-be-included-on-this-list/' => 'Digital Book Today',
	// 	'http://support.hotzippy.net/?p=459' => 'HotZippy.net',
	// 	'http://www.freebooksy.com/editorial-submissions/' => 'Free Booksy',
	// 	'http://www.thereadingsofa.com/authors.html' => 'The Reading Sofa',
	// 	'http://bookpreviewclub.com/thank-you-free/' => 'Book Preview Club',
	// 	'http://www.freebooks.com/submit/' => 'Free Books',
	// 	'http://onehundredfreebooks.com/author-free-kindle-book-submission.html' => 'One Hundred Free Books',
	// 	'http://freedigitalreads.com/author-submissions/' => 'Free Digital Reads',
	// 	'http://promo.slashedreads.com/free-listing/' => 'Slashed Reads',
	// 	'http://lovelybookpromotions.com/?page_id=124' => 'Lovely Book Promotions',
	// 	'http://www.iloveebooks.com/for-authors.html' => 'I Love Books',
	// 	'http://www.writerowned.com/list-your-free-book-promotion.html' => 'Writer Owned',
	// 	'http://ebookasaurus.com/free-book-listing/' => 'eBookasaurus',
	// 	'http://readcheaply.com/submit/' => 'Read Cheaply',
	// 	'http://www.efictionfinds.com/p/author-corner.html' => 'eFiction Finds',
	// 	'http://www.themidlist.com/submit' => 'The Midlist',
	// 	'http://jungledealsandsteals.com/submit-your-kindle-freebie/' => 'Jungle Deals and Steals',
	// 	'http://www.freebookshub.com/authors/' => 'Free Books Hub',
	// 	'http://www.indieauthornews.com/p/contact-us.html' => 'Indie Author News',
	// 	'http://www.bestebooksfree.com/Authors-eBook-Promotion.shtml' => 'Best eBooks Free (10 Reviews Req.)',
	// 	'http://bookloversheaven.com/author-information-form/' => 'Book Lovers Heaven',
	// 	'https://authors.ereadernewstoday.com/' => 'eReader News Today',
	// 	'http://bookpinning.com/?sws=home/submit-book' => 'Book Pinning',
	// 	'http://www.armadilloebooks.com/submit-free-ebooks/' => 'Armadillo eBooks',
	// 	'http://fkbt.com/for-authors/regular-book-posting/' => 'FKBT',
	// 	'http://www.book-circle.com/submit-free-kindle-ebook-listing/' => 'Book-Circle',
	// 	'http://contentmo.com/submit-your-free-ebook-promo' => 'ContentMo',
	// 	'http://freediscountedbooks.com/submit/' => 'Free Discounted Books',
	// 	'http://newfreekindlebooks.com/authors/' => 'New Free Kindle Books',
	// 	'http://www.readfree.ly/submityourfreebook/' => 'Read Free.ly',


	// );
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
for ($i=0; $i <get_option('paid_additional_set_count_name') ; $i++) { 
	// array_push(array, var)
	$paid_mk_notes_url=get_option('paid_mk_notes_url_'.$i);
	$paid_notes_mk=get_option('paid_notes_mk_'.$i);
	$paidSites[$paid_mk_notes_url]=$paid_notes_mk;
	# code...
}
	// $paidSites = array(
	// 	'http://digitalbooktoday.com/join-our-team ' => 'Digital Book Today (option #13)',
	// 	'http://form.jotformpro.com/form/21078469493969' => 'The Kindle Book Review ($20)',
	// 	'http://support.hotzippy.net/?page_id=581/'=> 'HotZippy & PixScroll ($15x2)',
	// 	'http://awesomebookpromotion.com/awesome-book-promotion/'=> 'Awesome Promo ($60 for 4 sites)',
	// 	'http://bookgoodies.com/submit-your-free-kindle-days/highlight-your-free-kindle-days/' => 'Book Goodies (5 days $30)',
	// 	'http://itswritenow.com/submit-your-book/' => 'It\'s Write Now ($10)',
	// 	'http://ereaderutopia.com' => 'eReader Utopia (sign up)',
	// 	'https://secure.jotformpro.com/form/40851973729971' => 'eBooks Daily ($5)',
	// 	'http://readershideaway.com/author-advertising/' => 'Readers Hide Away ($10)',
	// 	'http://freediscountedbooks.com/free-days-social-media/' => 'Free Discounted Books (sign up)',
	// 	'http://ebookshabit.com/guaranteed-placement/' => 'eBook Habbit ($10)',
	// 	'http://www.goodkindles.net/p/submit-your-book.html/' => 'Good Kindles (Read Directions)',
	// 	'http://readingdeals.com/submit-ebook/paid' => 'Reading Deals ($5)',
	// 	'http://bookreadermagazine.com/submit-your-book/' => 'Book Reader Magazine ($20)',
	// 	'http://contentmo.com/social-media-ads-for-authors/'=> 'ContentMo ($19)',
	// 	'http://awesomegang.com/submit-your-book/' => 'Awesome Gang ($10)',
	// 	'http://manybooks.net/promote.php/'=> 'Many Books ($25)',
		
	// );
?>

<div class="additionalSitesSubmitTo">
	<?php foreach($paidSites as $k => $v){?>
		<a href="<?=$k?>" target="blank">
			<button class="popup_btn"><?=$v?></button>
		</a>
	<?php } ?>
</div>
<br />
<br />

<div id="resultss"></div>

<div class="popup-overlay"></div>
