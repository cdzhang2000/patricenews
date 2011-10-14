<?php
/*
 * Template Name: Patric FAQ Template
 */

get_header(); 

?>

<div id="leftColumn">
	<?php get_sidebar(); ?>
</div>

<div id="rightColumn">
	<?php get_template_part( 'loop', 'faq' ); ?>
</div>

<?php get_footer(); ?>