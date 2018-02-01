<?php
session_start();
$_SESSION['user_coupon'] = isset($_GET['coupon']) ? $_GET['coupon'] : null;

?>

<form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
    
	<p>
	    <label>Username *</label><br>
	    <input type="text" name="user_login" value="" id="user_login" class="input" />
    </p>

    <p>
	    <label>E-mail *</label><br>
	    <input type="text" name="user_email" id="user_email" class="input"  />
	</p>
	
	<p>
	    <?php do_action('register_form'); ?>
	    <input type="submit" value="Register" id="register" />
	</p>
</form>