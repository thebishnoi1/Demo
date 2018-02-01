<?php

if(!isset($_POST['id'])){
	return;
}

include '../../../../wp-load.php';

global $wpdb;

$table_name = $wpdb->prefix . BSP_BST_BOOK_URL;

$urls = $wpdb->get_results("SELECT * FROM $table_name WHERE book_id = " . $_POST['id'], OBJECT);

$table = "<table class='widefat fixed' cellspacing='0'>
		 <thead>
		 	<tr>
		 		<th style='width: 80%'>Url</th>
		 		<th>Submitted</th>
		 	</tr>
		 </thead>";

foreach ($urls as $object) {
	$table .= "<tr>
			  	 <td>" . $object->url . "</td>
			  	 <td>" . date("m/d/Y g:i A", strtotime($object->created)) . "</td>
			  </tr>";
}

$table .= "<tr>
		  		<td></td>
		  		<td>
		  			<button class='button button-primary' onClick='hide_url_table(" . $_POST['id'] . ")'>Hide</button>
		  		</td>
		   </tr>";
$table .= "</table>";

echo $table;

?>