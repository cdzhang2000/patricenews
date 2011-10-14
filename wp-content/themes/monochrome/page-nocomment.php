<?php
/*
Template Name:No comment
*/
?>
<?php get_header(); ?>
  <div id="contents" class="clearfix">

   <div id="left_col">
<?php $options = get_option('mc_options'); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="post clearfix" id="single_post">
     <div class="post_content_wrapper">
      <h2><span><?php the_title(); ?></span></h2>
      <div class="post_content">
       <?php the_content(__('Read more', 'monochrome')); ?>
      </div>
     </div>
     <dl class="post_meta">
       <dt class="meta_date"><?php the_time('Y') ?></dt>
        <dd class="post_date"><?php the_time('m') ?><span>/<?php the_time('d') ?></span></dd>
       <?php if ($options['author']) : ?>
       <dt><?php _e('POSTED BY','monochrome'); ?></dt>
        <dd><?php the_author_posts_link(); ?></dd>
       <?php endif; ?>
        <?php edit_post_link(__('[ EDIT ]', 'monochrome'), '<dd>', '</dd>' ); ?>
     </dl>
    </div>

<?php endwhile; else: ?>
    <div class="post_odd">
     <div class="post clearfix">
      <div class="post_content_wrapper">
       <?php _e("Sorry, but you are looking for something that isn't here.","monochrome"); ?>
      </div>
      <div class="post_meta">
      </div>
     </div>
    </div>
<?php endif; ?>

    <div class="content_noside">
     <?php include('navigation.php'); ?>
    </div>

   </div><!-- #left_col end -->

   <?php get_sidebar(); ?>

  </div><!-- #contents end -->

  <div id="footer">
<?php get_footer(); ?>
