<style type="text/css">
	.payment-form { display: inline-block; float: left }
	.payment-form label{ display: inline-block; width: 175px !important; font-weight: bold; }
	#card-expiry-month { width: 50px; }
	#card-expiry-year{ width: 100px; }
</style>
<?php 
$id=get_the_ID ();
$main=get_permalink( $id);
 ?>
<!--<script src='<?=plugins_url("../js/stripe.js", __FILE__) ?> type="text/javascript"></script>-->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
	
	Stripe.setPublishableKey('<?= STRIPE_PUBLIC_KEY ?>');
	
	function reportError(msg) {
		jQuery('#payment-errors').text(msg).addClass('alert alert-error');
		// re-enable the submit button:
		jQuery('#submitBtn').prop('disabled', false);
		return false;
	}
	
	jQuery(document).ready(function(){

		jQuery("#payment-form").submit(function(event) {

			var error = false;

			// disable the submit button to prevent repeated clicks
			jQuery('#submitBtn').attr("disabled", "disabled");

			// Get the values:
			var ccNum = jQuery('#card-number').val();
			var cvcNum = jQuery('#card-cvc').val();
			var expMonth = jQuery('#card-expiry-month').val();
			var expYear = jQuery('#card-expiry-year').val();

			// Validate the number
			if (!Stripe.validateCardNumber(ccNum)) {
				error = true;
				reportError('The credit card number appears to be invalid.');
			}
			
			// Validate the CVC
			if (!Stripe.validateCVC(cvcNum)) {
				error = true;
				reportError('The CVC number appears to be invalid.');
			}

			// Validate the expiration
			if (!Stripe.validateExpiry(expMonth, expYear)) {
				error = true;
				reportError('The expiration date appears to be invalid.');
			}

			// Check for errors
			if (!error) {

				// Get the Stripe token
				Stripe.createToken({
					number: ccNum,
					cvc: cvcNum,
					exp_month: expMonth,
					exp_year: expYear
				}, stripeResponseHandler);

			}

			// Prevent the form from submitting
			return false;

		});
	});
	
	function stripeResponseHandler(status, response) {

		// Check for an error:
		if (response.error) {

			reportError(response.error.message);

		} else {
			// No errors, submit the form:
			var f = jQuery("#payment-form");

			var token = response['id'];

			f.append("<input type='hidden' name='stripe_token' value='" + token + "' />");

			f.get(0).submit();
		}

	}
</script>

<h2>Payment</h2>

<h4><i>To use this tool you have to pay for Premium account</i></h4>

<div>
	<form class="payment-form" id="payment-form" method="POST" action="<?php echo $main."?page=stripe-checkout&checkout=true";?>">
		<p>
			<label>Card Number</label>
			<input type="text" placeholder="" name="card-number" id="card-number" required="">
		</p>
		<p>
			<label>CVC</label>
			<input  type="text" placeholder="" name="card-cvc" id="card-cvc" required="">
		</p>
		<p>
			<label>Expiration</label>
			<input type="text" placeholder="MM" name="card-expiry-month" id="card-expiry-month" required="" placeholder="MM">
			<input type="text" placeholder="YYYY" name="card-expiry-year" id="card-expiry-year" required="">
		</p>
		<p>
			<label>Price</label>
			<span style="font-size: 18px; font-weight: bold;">
				$<?=get_option('bsp_bst_free') != 'yes' ? get_option('bsp_bst_price') : "0"?>
			</span>
		</p>
		<p>
			<input type="submit" value="Pay!" name="Payment" id="submitBtn" class="button button-primary">
		</p>
	</form>
</div>
<div id="payment-errors" style="color: red; padding: 0"></div>