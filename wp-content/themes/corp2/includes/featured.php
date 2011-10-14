<?php
	$q = new WP_Query('pagename=home_feature');
	while ($q->have_posts()) : $q->the_post(); $do_not_duplicate = $post->ID;
	global $home_feature_id;
	$home_feature_id = $post->ID;
?>

<?php 
global $feature_text;
$feature_text = strip_tags(get_the_content('Read More...'), '<h4><p><a><strong>');
$feature_text = apply_filters('the_content', $feature_text);
$feature_text = str_replace(']]>', ']]&gt;', $feature_text);
 ?>

<?php endwhile; ?>
