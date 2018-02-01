<?php

global $wpdb;

$payment_table = $wpdb->prefix . BSP_BST_USER_PAYMENTS;

// Get all users
$users = get_users(array('orderby' => 'ID', 'order' => 'ASC'));

// Users that paid for tool
$payments = $wpdb->get_results("SELECT * FROM $payment_table");

$status = "";
$table = "<table class='widefat fixed'>
			<thead>
			  	<tr>
			  		<th>Username</th>
			  		<th>Name</th>
			  		<th>Paid</th>
			  	</tr>
			<thead>";

foreach($users as $object){
	$table .= "<tr>
					<td>" . $object->nickname . "</td>
					<td>" . $object->first_name . " " . $object->last_name . "</td>";

	// Default status (paid) cell. This will be shown for non-paid users.
	$status_cell = "<td id='payment-" . $object->id . "'>
	 				<button class='button button-primary' onClick='enable_tool_usage(" . $object->ID . ")'>
	 					Enable access
 					</button>
			   </td>";

	// Print paid date if user is premium (paid).
	foreach($payments as $payment){
		if($payment->user_id == $object->ID){
			$status_cell = "<td id='payment-" . $object->id . "'>" 
				. date("m-d-Y g:i A", strtotime($payment->created)) 
				. "| <a href='#' onClick='enable_tool_usage(" . $object->ID . ",true)'>
	 					Disable access
 					</button>"
				. "</td>";
			break;
		} 
	}
	$table .= $status_cell . "</tr>";
}

$table .= "</table>"
?>

<script type="text/javascript">
	
	function enable_tool_usage(id, disable){
		jQuery.ajax({
			url: '<?= plugins_url('../ajax/enable-tool-usage.php', __FILE__) ?>' + (disable==true ? '?disable=1' : ''),
			type: 'POST',
			data: { 'id': id },
			success:function(res){
				document.getElementById('payment-' + id).innerHTML = res;
				return false;
			}
		})
		return false;
	}

	
</script>

<h2>Users payment list</h2>

<div>
	<?php print($table); ?>	
</div>

