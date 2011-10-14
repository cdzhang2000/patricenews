<?php get_header(); ?>

<?php
if ( function_exists('dsq_comment_count') ) {
	remove_action('loop_end', 'dsq_comment_count');
	add_action('arras_above_index_news_post', 'dsq_comment_count');
}
?>

<div id="content" class="section">
<?php arras_above_content() ?>

<?php if ( ( $featured1_cat = arras_get_option('featured_cat1') ) !== '' && $featured1_cat != '-1' ) : ?>
    <!-- Featured Articles #1 -->
    <div class="featured clearfix">
    <?php 
	if ($featured1_cat == '-5') 	$query = array('post__in' => get_option('sticky_posts'), 'showposts' => arras_get_option('featured1_count') );
	elseif ($featured1_cat == '0') 	$query = 'showposts=' . arras_get_option('featured1_count');
	else							$query = 'showposts=' . arras_get_option('featured1_count') . '&cat=' . $featured1_cat;
	
	$q = new WP_Query( apply_filters('arras_featured1_query', $query) );
	?> 
    	<div id="controls" style="display: none;">
			<a href="" class="prev"><?php _e('Prev', 'arras') ?></a>
			<a href="" class="next"><?php _e('Next', 'arras') ?></a>
        </div>
    	<div id="featured-slideshow">
        	<?php $count = 0; ?>
    		<?php if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); ?>
    		<div <?php if ($count != 0) echo 'style="display: none"'; ?>>
    			<?php $w = 630; $h = 250; if ( arras_get_option('layout') == '3c-r-fixed' || arras_get_option('layout') == '3c-fixed' ) { $w = 480; $h = 225; } ?>
            	<a class="featured-article" href="<?php the_permalink(); ?>" rel="bookmark" style="background: url(<?php echo arras_get_thumbnail($w, $h); ?>) no-repeat;">
                <span class="featured-entry">
                    <span class="entry-title"><?php the_title(); ?></span>
                    <span class="entry-summary"><?php echo arras_strip_content(get_the_excerpt(), 20); ?></span>
					<span class="progress"></span>
                </span>
            	</a>
        	</div>
    		<?php $count++; endwhile; endif; ?>
    	</div>
    </div>
<?php endif; ?>

<!-- Featured Articles #2 -->
<?php if (!$paged) : if ( ($featured2_cat = arras_get_option('featured_cat2') ) !== '' && $featured2_cat != '-1' ) : ?>
	<?php 
	if ($featured2_cat == '-5') 	$query2 = array('post__in' => get_option('sticky_posts'), 'showposts' => arras_get_option('featured2_count') );
	elseif ($featured2_cat == '0') 	$query2 = 'showposts=' . arras_get_option('featured2_count');
	else							$query2 = 'showposts=' . arras_get_option('featured2_count') . '&cat=' . $featured2_cat;
	
	$q2 = new WP_Query( apply_filters('arras_featured2_query', $query2) );
	arras_get_posts('featured2', $q2);
	?>
<?php endif; endif; ?>

<?php arras_above_index_news_post() ?>

<!-- News Articles -->
<?php
$news_query = array(
	'cat' => arras_get_option('news_cat'),
	'paged' => $paged,
	'showposts' => ( (arras_get_option('index_count') == 0 ? get_option('posts_per_page') : arras_get_option('index_count')) )
);

// if you are a WP plugin freak you can use 'arras_news_query' filter to override the query
wp_reset_query(); query_posts(apply_filters('arras_news_query', $news_query));

arras_get_posts('index') ?>

<?php if(function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
	<div class="navigation clearfix">
		<div class="floatleft"><?php next_posts_link( __('Older Entries', 'arras') ) ?></div>
		<div class="floatright"><?php previous_posts_link( __('Newer Entries', 'arras') ) ?></div>
	</div>
<?php } ?>

<?php arras_below_index_news_post() ?>

<div id="bottom-content-1">
	<ul class="clearfix xoxo">
    	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Content #1') ) : ?>
        <?php endif; ?>
	</ul>
</div>

<div id="bottom-content-2">
	<ul class="clearfix xoxo">
    	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Content #2') ) : ?>
        <?php endif; ?>
	</ul>
</div>

<?php arras_below_content() ?>
</div><!-- #content -->
    
<?php get_sidebar(); ?>
<?php get_footer(); ?>
