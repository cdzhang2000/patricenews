<?php get_header(); ?>
<?php get_sidebar(); ?>
	
	<div id="content">
	
		<?php if (have_posts()) : ?>
    
<!-- Post Formatting -->
			<h1 class="pagetitle">Search Results for "<?php the_search_query(); ?>"</h1>
			<img class="archive-comment"src="<?php bloginfo('template_url'); ?>/images/comments-bubble.gif" width="17" height="14" alt="Comments"/>
		<?php while (have_posts()) : the_post(); ?>
	<div class="entries">
		<ul>
			<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><span class="comments_number"><?php comments_number('0', '1', '%', ''); ?></span><span class="archdate"><?php the_time('n.j.y'); ?></span><?php the_title(); ?></a></li>
		</ul>
	</div>

<!-- Post Navigation-->
		<?php endwhile; /* rewind or continue when all posts are displayed */ ?>
            <div class="navigation">
                <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
                <div class="alignright"><?php previous_posts_link('Newer Posts &raquo;') ?></div>
            </div>
		
		<?php else : ?>
        
<!-- No Results -->
            <h1 class="pagetitle">Search Results for "<?php the_search_query(); ?>"</h1>
                <div class="page">
                    <p>Sorry your search for "<?php the_search_query(); ?>" did not turn up any results. Please try again.</p>
                </div>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>
