<?php

// Saving options on submit
if(isset($_POST['save'])){
	update_option('bsp_bst_price', $_POST['price']);
	
	if(isset($_POST['free'])){
		update_option('bsp_bst_free', 'yes');
	} else {
		update_option('bsp_bst_free', 'no');
	}
}

?>

<style type="text/css">
	.settings-form label{ display: inline-block; width: 175px !important; font-weight: bold; }
</style>

<h2>Book submission tool settings</h2>

<div>
	<form class="settings-form" id="settings-form" method="POST" action="">
		<p>
			<label>Tool price</label>
			<input type="text" name="price" id="price" value="<?php print(get_option('bsp_bst_price')); ?>">
		</p>
		<p>
			<label>Free</label>
			<input type="checkbox" name="free" id="free" <?php if(get_option('bsp_bst_free') == 'yes'){ print('checked'); } ?>>
		</p>
		<p>
			<input type="submit" value="Save" name="save">
		</p>
	</form>
</div>