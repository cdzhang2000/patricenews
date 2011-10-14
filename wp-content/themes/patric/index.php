<?php get_header(); ?>

<div id="leftColumn">
	<?php get_sidebar(); ?>
</div>

<div id="rightColumn">
	<?php get_template_part( 'loop', 'index' ); ?>
</div>

<?php get_footer(); ?>