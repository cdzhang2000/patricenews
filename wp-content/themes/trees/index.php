<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            	<div class="postHeader_left"></div>
            	<div class="postHeader">
                    
                    <span class="byLine"></span>
                    <span class="postDate">Posted on: <?php the_time('m.d.Y') ?></span>
                    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                </div>
                <div class="postmetadata">
                	<p>by <?php the_author() ?><br />
						<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?><br /><br />
                        <?php the_tags('Tags: ', ', ', '<br />'); ?><br /><br />
                        Posted in <?php the_category(', ') ?><br />
                        <?php edit_post_link('Edit', '', ''); ?>
                </div>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>
                <div class="clear"></div>
			</div>

		<?php endwhile; ?>

		<ul id="postNavigation">
			<li id="olderPosts"><?php next_posts_link('&laquo; Older Entries') ?></li>
			<li id="newerPosts"><?php previous_posts_link('Newer Entries &raquo;') ?></li>
		</ul>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>
    
    <?php get_sidebar(); ?>

<?php get_footer(); ?>
