<?php

global $wpdb;

$current_user = wp_get_current_user();

// Prepare where part of SQL depending on curent user
if(in_array('administrator', $current_user->roles)){
	$condition = "";
} else {
	$condition = " where user_id = '" . $current_user->ID . "'";
}

// SQL query geting books for curent user
$submissions = $wpdb->get_results("SELECT * 
	FROM " . $wpdb->prefix . BSP_BST_TABLE .
	$condition . 
	" order by id desc", OBJECT );
    
?>
<style>
	<?php include( dirname(__FILE__) . '/../css/style.css');?>
</style>
<script type="text/javascript">
	
	// Geting all submission urls for book
	function get_book_submission_urls(id){
		jQuery.ajax({
			url: '<?= plugins_url('../ajax/get-book-submission-urls.php', __FILE__) ?>',
			type: 'POST',
			data: { 'id' : id },
			success:function(res){
				if(res){
					jQuery('#submitted-sites-' + id).html(res);
					jQuery('#submitted-sites-' + id).css({ "display" : "block"})
				}
				return false;
			}
		})
		return false;
	}
	
	function hide_url_table(id){
		jQuery('#submitted-sites-' + id).css({ "display" : "none"});
	}
	
</script>

<h2>
	List of submissions
	<a href="<?=admin_url('admin.php?page=add-edit-book');?>" class="button button-primary" style="margin-top:-5px; margin-left: 15px;">
		Add New
	</a>
</h2>
<div class="getstarted-box">

	<span style="color: #325c21"><b>Getting Started:</b> If you are a new user of the tool, click the <b>ADD NEW</b> button above to enter your book's informations.  Once your book as been added to our system you will see it listed on the table below.  To the RIGHT of the title of the book you will see 3 buttons.  Click on the <b>SUBMIT BOOK</b> button to begin the process of submitting your book to 30 book promotion websites.  You can always go back and edit the details of your book by clicking the <b>EDIT BOOK</b> button.</span> 

</div>

<table class="widefat fixed" cellspacing="0" style="width: 100%">
	<thead>
		<tr>
			<th style="width: 30px;">ID</th>
			<th style="">Book Title</th>
			<th style="width: 350px;"></th>
		</tr>
	</thead>
<?php foreach($submissions as $row){ ?>
	<tr>
		<td># <?=$row->id?></td>
		<td><?=$row->book_title?></td>
		<td>
			<button class="button button-primary" onclick="window.location.href='<?php print(admin_url('admin.php?page=submit-book&id=') . $row->id); ?>'">Submit book</button>
			&nbsp;
			<button class="button button-primary" onclick="window.location.href='<?php print(admin_url('admin.php?page=add-edit-book&book-id=') . $row->id); ?>'">Edit book</button>
			&nbsp;
			<button class="button button-primary" onclick="get_book_submission_urls(<?php print($row->id); ?>)">Submited sites</button>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<div id="submitted-sites-<?php print($row->id); ?>" style="margin-left: 50px; display: none"></div>
		</td>
	</tr>
<?php } ?>
</table>