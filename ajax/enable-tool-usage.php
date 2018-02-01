<?php

include '../../../../wp-load.php';

if (!is_user_logged_in()) {
	die("You are not loged in into the Wordpress!");
}

if(isset($_POST['id'])){
	
	$current_user = wp_get_current_user();

	if( ! can_edit_book($_POST['id'],$current_user) ){
		echo 'You do not have permissions to edit this book!';
		return 1;
	}

	global $wpdb;

	$table_name = $wpdb->prefix . BSP_BST_USER_PAYMENTS;

	// If user clicked on "Disable", delete the row:
	if( isset($_GET['disable']) && $_GET['disable'] > 0){
		$wpdb->delete( $table_name, array( 'user_id' => $_POST['id'] ) );
		echo '<button class="button button-primary" onClick="enable_tool_usage(' . $_POST['id'] . ');">
				   Enable access
			   </button>';
		return 1;
	}

	// If user clicked on "Enable", add new row:
	$fields = array(
		'user_id' => $_POST['id']
	);
	$wpdb->insert($table_name, $fields);
	
	echo date('m-d-Y g:i A') 
		. "| <a href='#' onClick='enable_tool_usage(" . $_POST['id'] . ",true)'>
				Disable access
			</a>";
}

?>