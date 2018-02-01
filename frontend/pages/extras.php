<style>
	<?php include( dirname(__FILE__) . '/../../css/style.css');?>
</style>
<?php 
$id=get_the_ID ();
$main=get_permalink( $id);
 ?>
<div class="extras_booktool">
	<?php
	global $wpdb;
	global $post;
$my_id = 21;
$post_id_5369 = get_post($my_id);
$content = $post_id_5369->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
echo $content;
?>
</div>