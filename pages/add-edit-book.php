<?php

$current_user = wp_get_current_user();
$title = "New submission";

if( isset($_POST['save'])){

	$asin_check = file_get_contents(plugins_url('../ajax/get_book_info.php?asin='.$_POST['asin'], __FILE__));
// print_r($asin_check);
	if($asin_check === '0') {
		echo '<div class="message_box_failure">
			<p><h3>Invalid ASIN code!</h3></p>
			<p><h4>Please enter valid ASIN!<h4></p>
			</div>';

	} else {
		$insert = array();
		global $bsp_bst_arrMysqlFields, $wpdb;

		foreach ($bsp_bst_arrMysqlFields as $fld => $sql)
		{
			$insert[$fld] = isset($_POST[$fld]) ? stripslashes_deep($_POST[$fld]) : "no fld $fld";
		}
		
		// Changing date fromat for database
		$insert['start_date'] = date('Y-m-d', strtotime($insert['start_date']));
		$insert['end_date'] = date('Y-m-d', strtotime($insert['end_date']));

		if(!isset($_SESSION['book-id'])){
			$insert['user_id'] = $current_user->ID;
			$wpdb->insert($wpdb->prefix . BSP_BST_TABLE, $insert);
		} else {
			$wpdb->update($wpdb->prefix . BSP_BST_TABLE, $insert, array('id' => $_SESSION['book-id']));
		}

		$book_id = $wpdb->insert_id ? $wpdb->insert_id : $_SESSION['book-id'];
		
		echo '
			<div class="updated">
				<p>
					Book has been added! 
				</p>
				<p>
					Now you can proceed and submit it to the promotion websites
						 by clicking on the button below.
				</p>
			</div>
			<p>
				<a href="' . admin_url('admin.php?page=submit-book&id=') . $book_id . '">
					<input type="button" value="Submit to websites">
				</a>
			</p>
		';
		return 1;
	}
}

if(isset($_SESSION['book-id'])){

	global $wpdb;

	$book = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . BSP_BST_TABLE . " WHERE id = " . $_SESSION['book-id'], OBJECT);

	$title = "Edit book";
} else if(isset($_POST['save'])) {

	$book = new stdClass();
	foreach($_POST as $key=>$value) {
		$book->$key = $value;
	}

}

$user_email = $current_user->user_email;

wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
?>
<style type="text/css">
	<?php include( dirname(__FILE__) . '/../css/style.css');?>
</style>

<?php
// Check if user can edit book
if(isset($_SESSION['book-id']) && (int)$_SESSION['book-id'] > 0){
	if(!can_edit_book($book,$current_user)){
		return;
	}
}
?>

<h2><?= $title?></h2>

<script type="text/javascript">

	jQuery(document).ready(function(){
		jQuery('.datepicker').datepicker({
			dateFormat : 'mm/dd/yy'
		})
	});

	function get_book_info(el){

		var old_label = el.innerHTML;
		el.innerHTML = "Loading...";
		el.disabled = true;

		var asin = document.getElementById('asin').value;

		if(asin.length != 10){
			alert("ASIN need to be 10 characters long");
			el.innerHTML = old_label;
			el.disabled = false;
			return false;
		}
console.log(asin);
		jQuery.ajax({
			url: '<?= plugins_url('../ajax/get_book_info.php', __FILE__) ?>',
			type: 'POST',
			data: {'asin': asin},
			dataType: 'json',
			success: function(res){
				var result = res;
console.log(result);
				if(result == 0) {
					console.log(result);
					alert('Invalid ASIN');
					el.innerHTML = old_label;
					el.disabled = false;

					return false;

				} else {
					console.log(result);
					document.getElementById('author_name').value = result['author_name'];
					document.getElementById('book_title').value = result['book_title'][0];
					document.getElementById('amazon_url').value = result['amazon_url'];
					document.getElementById('book_description').value = result['book_description'][0];
					document.getElementById('book-image').innerHTML = result['book_image'];
					document.getElementById('cover_img_url').value = result['book_image_url'];
					document.getElementById('reviews').value = result['reviews'];
					document.getElementById('rating').value = result['rating'];

					el.innerHTML = old_label;
					el.disabled = false;

					return false;
				}
			}
		})
		return false;
	}

</script>

<style type="text/css">
	.new_submission { display: inline-block; float: left; width:50%;}
	.new_submission label{ display: inline-block; width: 175px !important; font-weight: bold; font-size: 15px; float:left; }
	.look-up { display: inline-block; float:right; margin-top: -50px; /*position: absolute!important;*/}
	#book-image { display: inline-block; float:left; margin-left: 50px; }
</style>
<div>
	<form class="new_submission" method="POST" action="">

		<p>
			<label>ASIN</label>
			<input type="text" name="asin" id="asin" required="" value="<?php echo $book->asin;?>">
		</p>

		<div class="look-up">
		<button class="button button-primary" onclick="get_book_info(this)">Lookup</button>
	</div>
		<p>
			<label>Email</label>
			<input type="text" name="email" id="email" value="<?php echo $user_email;?>" required="">
		</p>
		<p>
			<label>Author name</label>
			<input type="text" name="author_name" id="author_name" required="" value="<?php echo $book->author_name;?>">
		</p>
		<p>
			<label>Book Title</label>
			<input type="text" name="book_title" id="book_title" required="" value="<?php echo $book->book_title;?>">
		</p>
		<p>
			<label>Amazon URL</label>
			<input type="text" name="amazon_url" id="amazon_url" required="" value="<?php echo $book->amazon_url;?>">
		</p>
		<p>
			<label>Book cover image URL</label>
			<input type="text" name="cover_img_url" id="cover_img_url" required="" value="<?php echo $book->cover_img_url;?>">
		</p>
		<p>
			<label>Start date</label>
			<input type="text" name="start_date" id="start_date" class="datepicker" required=""
			       value="<?=isset($book) ? date("m/d/Y", strtotime($book->start_date)): ''?>">
		</p>
		<p>
			<label>End date</label>
			<input type="text" name="end_date" id="end_date" class="datepicker" required=""
			       value="<?= isset($book) ? date("m/d/Y", strtotime($book->end_date)) : ''?>">
		</p>
		<p>
			<label>Days free</label>
			<input type="text" name="days_free" id="days_free"
			       value="<?=$book->days_free?>">
		</p>
		<p>
			<label>Genre</label>
			<select name="genre" id="genre">
				<option value="<?php echo $book->genre;?>" selected><?php echo $book->genre;?></option>
				<option value="Action &amp; Adventure">Action &amp; Adventure</option>
				<option value="Advice &amp; How-to">Advice &amp; How-to</option>
				<option value="Biographies &amp; Memoirs">Biographies &amp; Memoirs</option>
				<option value="Business">Business</option>
				<option value="Chick Lit">Chick Lit</option>
				<option value="Children's Books">Children's Books</option>
				<option value="Christian Fiction">Christian Fiction</option>
				<option value="Contemporary Fiction">Contemporary Fiction</option>
				<option value="Fantasy">Fantasy</option>
				<option value="Historical">Historical</option>
				<option value="Horror">Horror</option>
				<option value="Humor">Humor</option>
				<option value="Literary Fiction">Literary Fiction</option>
				<option value="Mystery">Mystery</option>
				<option value="Nonfiction">Nonfiction</option>
				<option value="Paranormal">Paranormal</option>
				<option value="Romance">Romance</option>
				<option value="Science Fiction">Science Fiction</option>
				<option value="Suspense">Suspense</option>
				<option value="Thriller">Thriller</option>
			</select>
		</p>
		<p>
			<label>Sub-genre</label>
			<input type="text" name="sub_genre" id="sub_genre" value="<?php echo $book->sub_genre;?>">
		</p>
		<p>
			<label>Regular price</label>
			<input type="text" name="regular_price" id="regular_price" value="<?php echo $book->regular_price;?>">
		</p>
		<p>
			<label>Reviews</label>
			<input type="text" name="reviews" id="reviews" value="<?php echo $book->reviews;?>">
		</p>
		<p>
			<label>Rating</label>
			<input type="text" name="rating" id="rating" value="<?php echo $book->rating;?>">
		</p>
		<p>
			<label>Facebook URL</label>
			<input type="text" name="facebook_url" id="facebook_url" value="<?php echo $book->facebook_url;?>">
		</p>
		<p>
			<label>Goodreads Page URL</label>
			<input type="text" name="goodreads_url" id="goodreads_url" value="<?php echo $book->goodreads_url;?>">
		</p>
		<p>
			<label>Tags / keywords</label>
			<input type="text" name="tags" id="tags" value="<?php echo $book->tags;?>">
		</p>
		<p>
			<label>Book description</label><br>
			<textarea name="book_description" id="book_description"><?php echo $book->book_description;?></textarea>
		</p>
		<p>
			<label>Author bio</label><br>
			<textarea name="author_bio" id="author_bio"><?php echo $book->author_bio;?></textarea>
		</p>

		<p><input type="submit" value="Save" name="save" class="button action"></p>

	</form>
	
	<div id="book-image">
		<?php
		if(isset($book)){
			echo '<img src="' . $book->cover_img_url . '"/>';
		}
		?>
	</div>
</div>
