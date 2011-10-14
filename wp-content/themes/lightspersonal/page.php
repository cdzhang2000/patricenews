<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div id="content">

		<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<h1 class="pagetitle"><?php the_title(); ?></h1>
			<div class="page">
				<?php the_content(); ?>
        		<?php edit_post_link('Edit This','<p>','</p>'); ?>
			</div>
            
		<?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
		<?php else : ?>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>
