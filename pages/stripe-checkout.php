<?php

global $wpdb;

$result = "";
$button_text = "Try again";
$class = "message_box_failure";

$token = $_POST['stripe_token'];

$amount = get_option('bsp_bst_price') * 100;

try{
	require_once(plugin_dir_path( __FILE__ ).'../third_party/stripe/lib/Stripe.php');

	Stripe::setApiKey(STRIPE_PRIVATE_KEY);

	// Charge the order:
	$charge = Stripe_Charge::create(array(
		"amount" => $amount, // amount in cents
		"currency" => STRIPE_CURRENCY,
		"card" => $token
		)
	);

	if ($charge->paid == true) {
		
		$table_name = $wpdb->prefix . BSP_BST_USER_PAYMENTS;
		$user = wp_get_current_user();
		
		$fields = array(
			'user_id' => $user->ID
		);
		
		$wpdb->insert($table_name, $fields);
	} else {
		$result = 'Your payment could NOT be processed (i.e., you have not been charged) because the payment system rejected the transaction. You can try again or use another card.';
	}
	
}catch(Stripe_CardError $e){
	// Card was declined.
	$e_json = $e->getJsonBody();
	$err = $e_json['error'];
	$result =  $err['message'];
} catch (Stripe_ApiConnectionError $e) {
	$result = 'Network error, please try again';
} catch (Stripe_InvalidRequestError $e) {
	$result = 'Error occured, please try again';
} catch (Stripe_ApiError $e) {
	// Stripe's servers are down
	$result = 'Network error, please try again';
} catch (Stripe_CardError $e) {
	// Something else that's not the customer's fault
	$result = 'Error occured, please try again';
}

if($result == ""){
	$result = "Payment successful";
	$button_text = "Start submiting";
	$class = "message_box_success";
}

?>

<style type="text/css">
	<?php include( dirname(__FILE__) . '/../css/style.css');?>
</style>

<h2>Checkout</h2>
<div class="<?= $class; ?>">
	<?= $result; ?>
</div>
<button class="button button-primary" onclick="window.location.href='<?php print(admin_url('admin.php?page=list-submissions')); ?>'">
	<?= $button_text; ?>
</button>
