<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div id="content">

		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
<!-- Post -->
<!-- Post Header -->
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="post-header">
            	<div class="header-top">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <div class="author">by <?php the_author() ?></div>
            	</div>
            	<div class="header-bottom">
                    <div class="comments">&middot;&nbsp;<?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?></div>
                    <div class="date">Posted: <span><strong><?php the_time('l') ?></strong>, <?php the_time('m') ?>&middot;<?php the_time('d') ?>&middot;<?php the_time('Y') ?></span> </div>
           		</div>
			</div>
<!-- Post Content-->
			<div class="post-content clear">
				<?php the_content('read more...'); ?>
        		<?php edit_post_link('Edit This','<p>','</p>'); ?>
			</div>
<!-- Post Footer-->
			<div class="post-footer">
				<p class="tags"><strong>Tags:</strong> <?php the_tags('', ', ', ''); ?></p>
				<p class="categories"><strong>Section:</strong> <?php the_category(', ') ?></p>
			</div>
		</div>
<!-- Post Navigation-->
		<?php endwhile; /* rewind or continue when all posts are displayed */ ?>
            <div class="navigation">
                <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
                <div class="alignright"><?php previous_posts_link('Newer Posts &raquo;') ?></div>
            </div>
		
		<?php else : ?>
		<?php endif; ?>
        
	</div>
<?php get_footer(); ?>
