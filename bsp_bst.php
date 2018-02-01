<?php

    /*
    Plugin Name: Book Submission Tool plugin
    Author: Boris
    Version: Alpha
    */
 
/*/////////
// TODO //

- required fields
- functions and methods to object (??)

/////////*/

 
// Stripe api data
define('STRIPE_PRIVATE_KEY', 'sk_test_o0RZYwrnKY4aT4C6oEtjL22W ');
define('STRIPE_PUBLIC_KEY', 'pk_test_lBbuAiNppAxXJ1cxxlqg5Wyi');
define('STRIPE_CURRENCY', 'usd');

define("BSP_BST_TABLE",  "bsp_bst_submissions" );
define("BSP_BST_BOOK_URL", "bsp_bst_book_url");
define("BSP_BST_USER_PAYMENTS", "bsp_bst_user_payments");

$GLOBALS['bsp_bst_arrMysqlFields'] = array(
    'asin' => 'varchar(255) not null',
    'email' => 'varchar(255) not null',
    'author_name' => 'varchar(100)',
    'book_title' => 'varchar(255)',
    'amazon_url' => 'varchar(255)',
    'cover_img_url' => 'varchar(255)',
    'start_date' => 'datetime',
    'end_date' => 'datetime',
    'days_free' => 'int',
    'genre' => 'varchar(100)',
    'sub_genre' => 'varchar(100)',
    'regular_price' => 'double(10,2)',
    'reviews' => 'int',
    'rating' => 'varchar(50)',
    'facebook_url' => 'varchar(150)',
    'goodreads_url' => 'varchar(150)',
    'tags' => 'varchar(255)',
    'book_description' => 'text',
    'author_bio' => 'text',
    'user_id' => 'int',
);  


//    
/////// LIST OF ACTIONS ///////
//
add_action('admin_menu', 'bsp_bst_create_admin_menu');

// This will use implemented AJAX functionality (http://codex.wordpress.org/AJAX_in_Plugins )
add_action( 'wp_ajax_bsp_bst_ajax', 'bsp_bst_ajax_router' );

register_activation_hook( __FILE__, 'bsp_bst_install' );
register_deactivation_hook( __FILE__, 'bsp_bst_uninstall' );

add_shortcode( 'bst_register_form', 'bsp_bst_signup_shorttag' );
add_filter( 'login_redirect', 'bsp_bst_login_redirect',10,3);

add_action('admin_menu', 'remove_the_dashboard_for_non_admins');

add_action( 'user_register', 'bsp_bst_user_register', 10, 1 );

add_filter('admin_head', 'bsp_bst_make_menu_unfolded');

//
// END OF ACTIONS
//


//
// [START] Show register on frontend and redirect to BST URL after login:
//
function bsp_bst_signup_shorttag( $atts )
{
    $a = shortcode_atts( array(
        'foo' => 'something',
        'bar' => 'something else',
    ), $atts );

    ob_start();
    include 'pages/register.php';
    return ob_get_clean();
}

function bsp_bst_login_redirect($redirect_to, $request, $user)
{
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		if ( ! in_array( 'administrator', $user->roles ) ) {
      global $wpdb;

      // return admin_url('admin.php?page=bsp-bst-home');
   //    $current_user = wp_get_current_user();
   //    $id=get_the_ID ();
      $main=get_permalink(5);
			return $main;
		}
	}
 
      // return admin_url('admin.php?page=bsp-bst-home');
	return admin_url();
 
}

/**
 * Disable admin bar on the frontend of your website
 * for subscribers.
 */
function themeblvd_disable_admin_bar() { 
	if ( ! current_user_can('edit_posts') ) {
		add_filter('show_admin_bar', '__return_false');	
	}
}
add_action( 'after_setup_theme', 'themeblvd_disable_admin_bar' );
 
/**
 * Redirect back to homepage and not allow access to 
 * WP admin for Subscribers.
 */
// function themeblvd_redirect_admin(){
// 	if ( ! defined('DOING_AJAX') && ! current_user_can('edit_posts') ) {
// 		wp_redirect( site_url() );
// 		exit;		
// 	}
// }
// add_action( 'admin_init', 'themeblvd_redirect_admin' );


add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );
function add_loginout_link( $items, $args ) {
	// echo "string";
	// print_r($args);
    if (is_user_logged_in() && $args->theme_location == 'main-navigation') {
        $items .= '<li><a href="'. wp_logout_url(home_url()) .'">Log Out</a></li>';
    }
    elseif (!is_user_logged_in() && $args->theme_location == 'main-navigation') {
        // $items .= '<li><a href="'. site_url('wp-login.php') .'">Log In</a></li>';
    }
    return $items;
}


//
// [END] Show register on frontend and redirect to BST URL after login:
//

function bsp_bst_make_menu_unfolded() {
    print "<script>
    	jQuery(document).ready(function(){
    		jQuery('a.wp-menu-open').click();
    	});
	</script>";
}

// Display the Book Submission Tool sub-menu
function bsp_bst_expand_menu()
{
	print "<script>
    	jQuery(document).ready(function(){
    		jQuery('#toplevel_page_bsp-bst-home > .wp-submenu').css('display','block');
    	});
	</script>";
}

// http://bavotasan.com/2008/hiding-the-wordpress-dashboard-for-non-admin-users/
function remove_the_dashboard_for_non_admins () {
	if (current_user_can('level_10')) {
		return;
	} else {
 		global $menu, $submenu, $user_ID;
	    $the_user = new WP_User($user_ID);
	    reset($menu); $page = key($menu);
	    while ((__('Dashboard') != $menu[$page][0]) && next($menu))
	            $page = key($menu);
	    if (__('Dashboard') == $menu[$page][0]) unset($menu[$page]);
	    reset($menu); $page = key($menu);
	    while (!$the_user->has_cap($menu[$page][1]) && next($menu))
	            $page = key($menu);
	    if (preg_match('#wp-admin/?(index.php)?$#',$_SERVER['REQUEST_URI']) && ('index.php' != $menu[$page][2])){
	            wp_redirect(get_option('siteurl') . '/wp-admin/profile.php');
	    }
	}
}

function bsp_bst_user_register($user_id)
{
	session_start();
	if(isset($_SESSION['user_coupon']) && $_SESSION['user_coupon'] == 'fr33t00l'){
		global $wpdb;	
		$fields = array(
			'user_id' => $user_id,
		);
		$table_name = $wpdb->prefix . BSP_BST_USER_PAYMENTS;
		$wpdb->insert($table_name, $fields);
	}
}

function bsp_bst_create_admin_menu()
{
	$icon = plugin_dir_url( __FILE__ ) . 'menu-icon.png';

	$user_access_level = array(
		'administrator' => 10,
		'editor' => 7,
		'author' => 2,
		'contributor' => 1,
		'subscriber' => 0,
		'all' => 0
	); // Required access level.

    add_menu_page("Book Submission Tool", "Book Submission Tool", $user_access_level['all'], "bsp-bst-home", "bsp_bst_router", $icon, 3);
    add_submenu_page("bsp-bst-home", "New submission", "Add a new book", $user_access_level['all'], "add-edit-book", "bsp_bst_router");

	add_submenu_page("bsp-bst-home", "Manage books", "Manage books", $user_access_level['all'], "list-submissions", "bsp_bst_router");
	// parrent slug = "" so this will hide menu item
	add_submenu_page("", "Submit book", "Submit book", $user_access_level['all'], "submit-book", "bsp_bst_router");
	add_submenu_page("", "Book Submission Tool Payment", "Book Submission Tool Payment", $user_access_level['all'], "bst-payment", "bsp_bst_router");
	add_submenu_page("", "Checkout", "Checkout", $user_access_level['all'], "stripe-checkout", "bsp_bst_router");
	add_submenu_page("bsp-bst-home", "Plugin settings", "Plugin settings", $user_access_level['administrator'], "plugin-settings", "bsp_bst_router");
	add_submenu_page("bsp-bst-home", "Payment list", "Payment list", $user_access_level['administrator'], "payment-list", "bsp_bst_router");
	add_submenu_page("bsp-bst-home", "Additional Sites", "Additional Sites", $user_access_level['administrator'], "additional-sites", "bsp_bst_additionalsites");

}
/********************* for additional site page***************/

function bsp_bst_additionalsites()
{
	?>
	<style type="text/css" media="screen">
		/*

RESPONSTABLE 2.0 by jordyvanraaij
  Designed mobile first!

If you like this solution, you might also want to check out the 1.0 version:
  https://gist.github.com/jordyvanraaij/9069194

*/
.responstable {
  margin: 1em 0;
  width: 100%;
  overflow: hidden;
  background: #FFF;
  color: #024457;
  border-radius: 10px;
  border: 1px solid #167F92;
}
.responstable tr {
  border: 1px solid #D9E4E6;
}
.responstable tr:nth-child(odd) {
  background-color: #EAF3F3;
}
.responstable th {
  display: none;
  border: 1px solid #FFF;
  background-color: #167F92;
  color: #FFF;
  padding: 1em;
}
.responstable th:first-child {
  display: table-cell;
  text-align: center;
}
.responstable th:nth-child(2) {
  display: table-cell;
}
.responstable th:nth-child(2) span {
  display: none;
}
.responstable th:nth-child(2):after {
  content: attr(data-th);
}
@media (min-width: 480px) {
  .responstable th:nth-child(2) span {
    display: block;
  }
  .responstable th:nth-child(2):after {
    display: none;
  }
}
.responstable td {
  display: block;
  word-wrap: break-word;
  max-width: 7em;
}
.responstable td:first-child {
  display: table-cell;
  text-align: center;
  border-right: 1px solid #D9E4E6;
}
@media (min-width: 480px) {
  .responstable td {
    border: 1px solid #D9E4E6;
  }
}
.responstable th, .responstable td {
  text-align: left;
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .responstable th, .responstable td {
    display: table-cell;
    padding: 1em;
  }
}

body {
  padding: 0 2em;
  font-family: Arial, sans-serif;
  color: #024457;
  background: #f2f2f2;
}

h1 {
  font-family: Verdana;
  font-weight: normal;
  color: #024457;
}
h1 span {
  color: #167F92;
}
/*input {
	width: 100%;
}*/
input[type="submit"] {
    width: 123px;
    text-align: center;
    margin: 0 auto;
    background: green;
    color: #fff;
    border: none;
    padding: 12px;
}
.total_add_mk{
  width: 150px;
  margin-bottom:10px;
  height: 43px; 
}
	</style>
	<?php 
  if(isset($_POST['additional_set_count']))
  {
    // for ($i=0; $i < 30 ; $i++) { 
      update_option( "additional_set_count_name",$_POST['additional_set_count_name'] );
    // }
  }
    if(isset($_POST['paid_additional_set_count']))
  {
    // for ($i=0; $i < 30 ; $i++) { 
      update_option( "paid_additional_set_count_name",$_POST['paid_additional_set_count_name'] );
    // }
  }


	if(isset($_POST['additional_set']))
	{
		for ($i=0; $i < get_option('additional_set_count_name') ; $i++) { 
			update_option( "mk_notes_url_".$i, $_POST['mk_notes_url_'.$i] );
      update_option( "notes_mk_".$i, $_POST['notes_mk_'.$i] );
			update_option( "title_mk_".$i, $_POST['title_mk_'.$i] );
		}
	}

		if(isset($_POST['paid_additional_set']))
	{
		for ($i=0; $i < get_option('paid_additional_set_count_name') ; $i++) { 
			update_option( "paid_mk_notes_url_".$i, $_POST['paid_mk_notes_url_'.$i] );
      update_option( "paid_notes_mk_".$i, $_POST['paid_notes_mk_'.$i] );
			update_option( "paid_title_mk_".$i, $_POST['paid_title_mk_'.$i] );
		}
	}

	 ?>
<h2><span>Additional total rows</span></h2>    
<form action="" method="post" accept-charset="utf-8">
  <input type="text" name="additional_set_count_name" value="<?php echo get_option('additional_set_count_name') ?>" class="total_add_mk"> 
  <input type="submit" name="additional_set_count" value="Save">
</form>
<h1> <span>Additional Free Book Submission Websites</span> </h1>

<form action="" method="post" >
	
	<!-- get -->

<table class="responstable">
  
  <tr>
    <!-- <th>Main driver</th> -->
    <th data-th="Driver details"><span>URL</span></th>
    <th>Title</th>

    <th>Notes</th>
<!--     <th>Date of birth</th>
    <th>Relationship</th> -->
  </tr>
  <?php for ($i=0; $i < get_option('additional_set_count_name'); $i++) { 
	$mk_notes_url=get_option('mk_notes_url_'.$i);
  $notes_mk=get_option('notes_mk_'.$i); 
	$title_mk=get_option('title_mk_'.$i); ?>
  	
  <tr>
    <td>	<input type="text" name="mk_notes_url_<?php echo $i; ?>" value="<?php echo $mk_notes_url;  ?>"></td>
    <td>	<input type="text" name="title_mk_<?php echo $i; ?>" value="<?php echo $title_mk; ?>"></td>
    <td>  <input type="text" name="notes_mk_<?php echo $i; ?>" value="<?php echo $notes_mk; ?>"></td>
    <!-- <td>Foo</td> -->
  </tr>
 <?php } ?>
 
  
</table>
	<input type="submit" value="Save" name="additional_set">	
</form>


<h2><span>Paid total rows</span></h2>    
<form action="" method="post" accept-charset="utf-8">
  <input type="text" name="paid_additional_set_count_name" value="<?php echo get_option('paid_additional_set_count_name') ?>" class="total_add_mk"> 
  <input type="submit" name="paid_additional_set_count" value="Save">
</form>
<h1> <span>Paid Submission Options</span> </h1>
<form action="" method="post" >
	
	<!-- get -->

<table class="responstable">
  
  <tr>
    <!-- <th>Main driver</th> -->
    <th data-th="Driver details"><span>URL</span></th>
    <th>Title</th>
    <th>Notes</th>
<!--     <th>Date of birth</th>
    <th>Relationship</th> -->
  </tr>
  <?php for ($i=0; $i < get_option('paid_additional_set_count_name'); $i++) { 
	$paid_mk_notes_url=get_option('paid_mk_notes_url_'.$i);
  $paid_notes_mk=get_option('paid_notes_mk_'.$i); 
	$paid_title_mk=get_option('paid_title_mk_'.$i); 

  ?>
  	
  <tr>
    <td>  <input type="text" name="paid_mk_notes_url_<?php echo $i; ?>" value="<?php echo $paid_mk_notes_url;  ?>"></td>
    <td>	<input type="text" name="paid_title_mk_<?php echo $i; ?>" value="<?php echo $paid_title_mk;  ?>"></td>
    <td>	<input type="text" name="paid_notes_mk_<?php echo $i; ?>" value="<?php echo $paid_notes_mk; ?>"></td>
    <!-- <td>Foo</td> -->
  </tr>
 <?php } ?>
 
  
</table>
	<input type="submit" value="Save" name="paid_additional_set">	
</form>
	<?php
}


/********************end of additional page*******************/ 

add_shortcode( 'mk_book_router', 'bsp_bst_router2' );

function bsp_bst_router2()
{
	?>
	<style type="text/css" media="screen">
	.login_booktoo{
    width: 45%;
    float: left;
    margin-right: 5%;
	}
	.reg_booktoo{
		width: 50%;
float: left
	}

		.mk_front .mk_nav a {
    margin-right: 18px;
    text-decoration: none;
    float: left;
    display: block;
    color: red;
    border: none;
        box-shadow: none!important;

    margin-bottom: 20px;
    font-size: 19px;
}
.mk_front .button-secondary, .mk_front .button {
    background: #0D5DA1 !important;
    color: #FFFFFF !important;
    font-size: 10px;
    padding: 10px !important;
    margin: 0;

}
.mk_front select {
    padding: 2px;
    line-height: 28px;
    height: 28px;
    vertical-align: middle;
    border:;
}
select, textarea {
    padding: 2px !important;
    width: 300px;
    font-size: 20px !important;
    min-height: 40px;
}
.sites-remaining,.sites-completed{
	height: auto!important;
}
label{
  max-width: 88%!important;
}
.popup_btn{
	    text-rendering: auto;
    color: initial;
    letter-spacing: normal;
    word-spacing: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    text-align: start;
    margin: 0em 0em 0em 0em;
    text-align: center;
    font: 13.3333px Arial;
}
.wp-core-ui .button-primary, .wp-core-ui .button-primary, .wp-core-ui .button-primary, .wp-core-ui .button-primary{
    background: #1e8cbe;
    border-color: #0074a2;
    -webkit-box-shadow: inset 0 1px 0 rgba(120,200,230,.6);
    box-shadow: inset 0 1px 0 rgba(120,200,230,.6);
    color: #fff;
}
.look-up {
    display: inline-block;
   float: left !important;
    margin-top: 0px!important;
    /*position: absolute;*/
}

.mk_front{
	width: 100%;
	/*margin: 0 auto;*/
}
.mk_front table {
    table-layout: auto!important;
}
.mk_front li{
	    list-style: none;
}

.mk_front h2,.mk_front h3 {
    font-size: 1em;
}
.mk_front h1, .mk_front h2,.mk_front h3, .mk_front h4,.mk_front h5,.mk_front h6 {
    display: block;
    font-weight: 600;
}
thead {
    border-top: 2px solid #dfdfdf;
}
thead tr th {
    color: #333;
}
.widefat td, .widefat th {
    overflow: hidden;
    color: #555;
}
.mk_nav .fa{
	font-size: 30px;
	border:3px solid;
	border-radius: 50%;
	padding:20px;
}

/* 31-03-2016 */

.mk_front .mk_nav.nav1 a {
  background: #efefef none repeat scroll 0 0;
  display: inline-block;
  float: none;
  margin: 0 0 0 1%;
  min-height: 249px;
  padding: 4% 2%;
  text-align: center;
  vertical-align: top;
  width: 24%;
}
.mk_front .mk_nav.nav1 a:first-child {
  margin-left: 0;
}
.mk_nav.nav1 {
  margin: 0 0 30px;
  text-align: center;
}
.mk_front h1::before {
  border-bottom: 5px solid #f7c51d;
  content: "";
  height: 100%;
  left: 0;
  margin: 0 auto;
  position: absolute;
  right: 0;
  top: 3px;
  width: 30%;
}
.mk_front h1 {
  border-bottom: 1px solid #dadada;
  margin: 0 0 30px;
  padding: 0 0 11px;
  position: relative;
  text-align: center;
}
.mk_nav.nav1 .fa {
  color: #f7c51d;
}
.mk_front .mk_nav.nav1 a:hover h2 {
  color: #fff;
}
.mk_front .mk_nav.nav1 a:hover {
  background: #404040 none repeat scroll 0 0;
}
.mk_front table td {
  padding: 2% 2% 1%;
}
.mk_front table .submission-box {
  background: #e7e7e7 none repeat scroll 0 0;
  border-color: #adadad;
  width: 100%;
}
.mk_front table .submission-box iframe {
  border: 1px solid #b1b1b1;
  width: 100%;
}
.page-title::before {
  background: rgba(255, 255, 255, 0.7) none repeat scroll 0 0;
  content: "";
  display: block;
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  width: 100%;
}
.mk_front table td h2 {
  border-bottom: 1px solid #bebebe;
  font-size: 21px;
  margin: 0 0 12px;
  padding: 0 0 6px;
}
.mk_front table td:first-child {
  background: #ebebeb none repeat scroll 0 0;
}
.fixed-responsive-nav #navigation .nav.navbar-nav > li > a {
  color: #202020;
  padding: 34px 20px 15% 10%;
}
.page-title .container {
  position: relative;
}
.mk_front table.widefat td {
  padding: 5px;
}
.fixed-responsive-nav .logo {
  margin-top: 30px !important;
}
.new_submission .styled-select {
  display: inline-block;
  width: 300px;
}
.new_submission label {
  width: 225px !important;
}
.new_submission textarea {
  border: 1px solid #eee;
  border-radius: 3px;
  width: 350px;
  height: 150px;
}
.new_submission {
  display: inline-block;
  float: left;
  width: 50%;
}
.new_submission p br {
  display: none;
}
.new_submission .button.action, .look-up .button.button-primary {
  background: #f7c51d none repeat scroll 0 0 !important;
  border: medium none;
  border-radius: 4px;
  font-size: 19px;
  width: 100px !important;
}
.nwmk2 h2::before {
  border-bottom: 5px solid #f7c51d;
  content: "";
  display: block;
  height: 100%;
  left: 0;
  position: absolute;
  top: 3px;
  width: 21%;
}
.nwmk2 h2 {
  border-bottom: 1px solid #c8c8c8;
  font-size: 29px !important;
  margin: 0 0 21px;
  padding: 0 0 10px;
  position: relative;
}
.mk_videfront {

	text-align: center;
	margin-top: 20px;
	margin-bottom: 30px;
}

@media (min-width: 1000px) and (max-width: 1199px){
	.mk_nav.nav1 h2 {
	  font-size: 21px;
	}
	.mk_front .mk_nav.nav1 a {
	  min-height: 249px;
	  padding: 5.5% 2% 1%;
	}
	.nav-copy .navbar ul li a {
	  padding: 15px 14px !important;
	}
	.fixed-responsive-nav #navigation .nav.navbar-nav > li > a {
	  color: #202020;
	  font-size: 12px;
	  padding: 34px 17px 15% 0;
	}
}

@media (min-width: 770px) and (max-width: 999px){
	header .header-boxes li {
	  padding: 0 2%;
	  width: 33%;
	}
	.hide-small {
	  width: 100%;
	}
	header .header-boxes i{
		font-size: 26px;
	}
	header .container {
	  padding: 0;
	  width: 100%;
	}
	.header-top .pull-right {
	  margin: 0 2% 0 0;
	  width: 69%;
	}
	.header-top .pull-left {
	  margin: 0 0 0 2%;
	}
	.nav-copy ul li a {
	  font-size: 13px;
	  padding: 11px 4% 11px 13% !important;
	}
	.fixed-responsive-nav .pull-left {
	  float: none !important;
	  margin: 0 auto 12px;
	  width: 200px;
	}
	.fixed-responsive-nav .pull-right.nav-paste {
	  margin: 0 0 20px;
	  text-align: center;
	}
	.fixed-responsive-nav .navbar ul li {
	  display: inline-block;
	  float: none;
	}
	.fixed-responsive-nav #navigation .nav.navbar-nav > li > a {
	  color: #202020;
	  padding: 3px 10%;
	}
}
@media (max-width: 999px){
	.mk_nav.nav1 h2 {
	  font-size: 16px;
	}
	.mk_front .mk_nav.nav1 a {
	  min-height: 200px;
	  padding: 5% 2% 3%;
	}
	.mk_front table.widefat td:first-child {
	  padding: 5px;
	  width: 45px;
	}
	.mk_front table td h2 {
	  font-size: 16px;
	}
	.mk_front li {
	  font-size: 12px;
	  line-height: 18px;
	  list-style: outside none none;
	}
}
@media (max-width: 767px){
	.mk_front .mk_nav.nav1 a {
	  margin: 0 1% 2% !important;
	  min-height: auto;
	  padding: 4%;
	  width: 48%;
	}
	header ul.header-boxes.no-margin li {
	  border-right: medium none;
	  display: inline-block;
	  float: none;
	  padding: 0 0 10px;
	  width: 32%;
	}
	.show-small ul.header-boxes {
	  text-align: center;
	}
	.mk_front table.newmk1 td {
	  display: block;
	  width: 100% !important;
	}
	.new_submission label {
	  width: 211px !important;
	}
	.new_submission textarea {
	  border: 1px solid #eee;
	  border-radius: 3px;
	  width: 62%;
	}
}
@media (max-width: 600px){
	.mk_front .mk_nav.nav1 a {
	  width: 98%;
	}
	header ul.header-boxes.no-margin li {
	  padding: 0 0 22px;
	  width: 162px;
	}
	.mk_front h1 {
	  font-size: 24px;
	}
	.page-title h1 {
	  font-size: 25px;
	}
	.new_submission input[type="text"], .new_submission .styled-select, .new_submission textarea {
	  width: 100% !important;
	}
}

	</style>
	<?php
	 $id=get_the_ID ();
	 $main=get_permalink($id);

	


    echo "<div class='mk_front'>";
    echo '<h1>Book Submission Tool</h1>';
     if ( is_user_logged_in() ) {
	echo "<div class='mk_nav nav1'><a href='".$main."'><i class='fa fa-book'></i><h2>Tool Introduction</h2></a>";
	echo "<a href='".$main."?page=add-edit-book'><i class='fa fa-line-chart'></i><h2>Add A Book</h2></a>";
	echo "<a href='".$main."?page=list-submissions'><i class='fa fa-database'></i><h2>Manage/Edit Books</h2></a>";
		echo "<a href='".$main."?page=extras'><i class='fa fa-database'></i><h2>Extras</h2></a></div>";
	//	echo "<a href='".$main."?page=additional-sites'><i class='fa fa-database'></i><h2>Additional-sites</h2></a>";

		} else {

    	echo "<div class='mk_videfront'><iframe width='800' height='400' src='https://www.youtube.com/embed/pGH-1Vnx2zw' frameborder='0' allowfullscreen></iframe></div>";

    }
	// This will rewrite $page value if user has not paid.
 	$page = bsp_bst_block_not_premium_users2($_GET['page']);

    switch($page)
    {
        case "add-edit-book":
			$_SESSION['book-id'] = $_GET['book-id'];
            include 	'frontend/pages/add-edit-book.php';
        break;

        case "view-submission":
            // TODO...
        break;
		
		case "bst-payment":
			include 'frontend/pages/bst-payment.php';
		break;
		
		case "stripe-checkout":
			include 'frontend/pages/stripe-checkout.php';
		break;

	    case "submit-book":
			// put book id in session so we can get id in submit-book.php file
		    $_SESSION['book_id'] = $_GET['id'];
		    include 'frontend/pages/submit-book.php';
        break;
		
		case "plugin-settings":
			include 'frontend/pages/plugin-settings.php';
		break;
		
		case "payment-list":
			include 'frontend/pages/payment-list.php';
		break;

        case 'list-submissions':
            include 'frontend/pages/list-submissions.php';
        break;

        case 'extras':
            include 'frontend/pages/extras.php';
        break;

        // case 'additional-sites':
        //     include 'frontend/pages/additional-sites.php';
        // break;

        case 'loginpage':
            include 'frontend/pages/loginpage.php';
        break;

        default:
        	include 'frontend/pages/home.php';
    }
    echo "</div>";


}
function bsp_bst_router()
{


    echo '<h1>Book Submission Tool</h1>';
	
	// This will rewrite $page value if user has not paid.
	$page = bsp_bst_block_not_premium_users($_GET['page']);

    switch($page)
    {
        case "add-edit-book":
			$_SESSION['book-id'] = $_GET['book-id'];
            include 'pages/add-edit-book.php';
        break;

        case "view-submission":
            // TODO...
        break;
		
		case "bst-payment":
			include 'pages/bst-payment.php';
		break;
		
		case "stripe-checkout":
			include 'pages/stripe-checkout.php';
		break;

	    case "submit-book":
			// put book id in session so we can get id in submit-book.php file
		    $_SESSION['book_id'] = $_GET['id'];
		    include 'pages/submit-book.php';
        break;
		
		case "plugin-settings":
			include 'pages/plugin-settings.php';
		break;
		
		case "payment-list":
			include 'pages/payment-list.php';
		break;

        case 'list-submissions':
            include 'pages/list-submissions.php';
        break;

        default:
        	include 'pages/home.php';
    }
}

function bsp_bst_block_not_premium_users($page)
{
	global $wpdb;
	
	$current_user = wp_get_current_user();
	
	if(in_array('administrator', $current_user->roles)){
		return $page;
	} else {
		if(get_option('bsp_bst_free') == 'yes'){
			if($page == 'plugin-settings' || $page == 'payment-list'){
				return 'list-submissions';
			}
			return $page;
		} else {
			$user_payed = $wpdb->get_var("SELECT COUNT(*) 
				FROM " . $wpdb->prefix . BSP_BST_USER_PAYMENTS . " 
				WHERE user_id = '" . $current_user->ID . "'");
			if($user_payed == 0){
				if(isset($_GET['checkout'])){
					return 'stripe-checkout';
				} else {
					return 'bst-payment';
				}
			} else {
				if($page == 'plugin-settings' || $page == 'payment-list'){
					return 'list-submissions';
				}
				return $page;
			}
		}
	}
}
function bsp_bst_block_not_premium_users2($page)
{
	global $wpdb;
	
	$current_user = wp_get_current_user();
	
	if(in_array('administrator', $current_user->roles)){
		return $page;
	} else {
		if(get_option('bsp_bst_free') == 'yes'){
			if($page == 'plugin-settings' || $page == 'payment-list'){
				return 'list-submissions';
			}
			return $page;
		} else {
			$user_payed = $wpdb->get_var("SELECT COUNT(*) 
				FROM " . $wpdb->prefix . BSP_BST_USER_PAYMENTS . " 
				WHERE user_id = '" . $current_user->ID . "'");
			// if($user_payed == 0){
			// 	if(isset($_GET['checkout'])){
			// 		return 'stripe-checkout';
			// 	} else {
			// 		return 'bst-payment';
			// 	}
			// } 
			if(!is_user_logged_in())
			{
					return 'loginpage';

			}
			else {
				if($page == 'plugin-settings' || $page == 'payment-list'){
					return 'list-submissions';
				}
				return $page;
			}
		}
	}
}
function bsp_bst_ajax_router()
{
    
    switch($_GET['bsp_bst_action'])
    {
        // TODO...
    }
}

// Function for loging errors
function bsp_bst_logv2($file, $msg)
{
	$log_row = "[ " . date('Y-m-d H:i:s') . "] $msg \n";
	$log_file = plugin_dir_path(__FILE__) . "logsv2/$file" . '.log';
	file_put_contents($log_file, $log_row, FILE_APPEND);
	return true;
}

function can_edit_book($book,$current_user)
{
	// Admin can look and edit all books
	if(in_array('administrator', $current_user->roles)){
		return true;
	}

	// User can only edit books that he added
	if($current_user->ID != $book->user_id){
		echo '<div class="message_box_failure">
			<p><h3>ACCESS DENIED</h3></p>
			<p><h4>You can not edit books you did not added!<h4></p>
			</div>';
		return false;
	} else {
		return true;
	}
}


/* Install triggers */


function bsp_bst_install()
{
    global $wpdb, $bsp_bst_arrMysqlFields;
	
	add_option('bsp_bst_price', '0', '', 'no');
	add_option('bsp_bst_free', 'no', '', 'no');

    $table_name = $wpdb->prefix . BSP_BST_TABLE;
    
    $arrSqlFields = array();
    foreach($bsp_bst_arrMysqlFields as $fld => $sql)
    {
        $arrSqlFields[] = " `$fld` $sql ";
    }

    $sqlFields = implode(",", $arrSqlFields);

    $sql = "CREATE TABLE $table_name (
        id int NOT NULL AUTO_INCREMENT primary key,
        `created` timestamp default CURRENT_TIMESTAMP not null,
        $sqlFields
    )";
	
    //bsp_bst_logv2('sql_debug',$sql);
	
    $wpdb->query($sql);
	
	$table_name = $wpdb->prefix . BSP_BST_BOOK_URL;
	
	$sql = "CREATE TABLE $table_name (
		id int NOT NULL AUTO_INCREMENT primary key,
		`created` timestamp default CURRENT_TIMESTAMP NOT NULL,
		url varchar(150) NOT NULL,
		book_id int NOT NULL
	)";
	
	$wpdb->query($sql);
	
	$table_name = $wpdb->prefix . BSP_BST_USER_PAYMENTS;
	
	$sql = "CREATE TABLE $table_name(
		id int NOT NULL AUTO_INCREMENT primary key,
		user_id int NOT NULL,
		`created` timestamp default CURRENT_TIMESTAMP NOT NULL
	)";
	
	$wpdb->query($sql);
}

function bsp_bst_uninstall()
{
	global $wpdb;
	
	delete_option('bsp_bst_price');
	delete_option('bsp_bst_free');
	
    $sql = "DROP TABLE " . $wpdb->prefix . BSP_BST_TABLE;
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " . $wpdb->prefix . BSP_BST_BOOK_URL;
	$wpdb->query($sql);
	
	$sql = "DROP TABLE " . $wpdb->prefix . BSP_BST_USER_PAYMENTS;
	$wpdb->query($sql);
}

