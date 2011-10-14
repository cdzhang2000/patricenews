<?php get_header(); ?>
<?php

	$thisCategory = get_term_by('name',single_cat_title('',false),'category');

?>

<div id="leftColumn">
	<?php get_sidebar(); ?>
</div>

<div id="rightColumn">
	<?php if($thisCategory): ?>
	<h1 class="<?php echo $thisCategory->slug ?>"><?php echo $thisCategory->name ?></h1> 
	<?php else:?>
	<h1><?php single_cat_title() ?></h1>
	<?php endif;?>
	<?php get_template_part( 'loop', 'index' ); ?>
</div>



<?php get_footer(); ?>