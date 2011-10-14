<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small> &nbsp;:: Posted by <?php the_author() ?> on <?php the_time('m-d-Y') ?><!-- by  --></small>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

				<div class="postmetadata">
					<p class="tags"><?php the_tags('<strong>tags:</strong> ', ', ', '<br />'); ?></p>
					<div class="postTools">
						<div class="postTools_left"></div>
                        <span>
						<?php edit_post_link('Edit', '', ' | '); ?> <img src="<?php bloginfo('template_url');?>/images/commentIco.jpg" alt="" hspace="4"/> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> | <?php the_category(', ') ?>
                        </span>
                    	<div class="postTools_right"></div>
                    </div>
                	<div class="clear"></div>
                </div>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>
