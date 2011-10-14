<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php /*
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'patric' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'patric' ) ); ?></div>
	</div><!-- #nav-above -->
<?php endif; ?>
*/ 
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'patric' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'patric' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
	
<?php 

	$feature_ID = "";
	/* Home page -- show posts from the featured section */
	if (is_home()): 
	
	$f = new WP_Query(array('showposts'=>1,'suppress_filters'=>true,'post_type'=>'feature'));
	while ($f->have_posts()): 
		$f->the_post(); 
		$feature_ID = get_the_ID();
		?>
			<div id="post-<?php the_ID(); ?>" <?php post_class('feature'); ?>>
				<?php if (has_post_thumbnail()): ?>
					<div class="post-thumbnail-container"><?php the_post_thumbnail(); ?></div>
				<?php endif; ?>

				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'patric' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
					<?php edit_post_link( __( 'Edit', 'patric' ), '| <span class="edit-link">', '</span>' ); ?>
					</h2>

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->

				<?php 
					$tags = get_the_tags(); 
					if($tags):
				?>
				<div class="entry-tags"><b>Tags:</b> <?php the_tags(''); ?></div>
				<?php
					endif;
				?>
			</div><!-- #post-## -->	
		<?php
		endwhile; 
	endif; 
	
	while ( have_posts() ) : the_post(); if($post->ID == $feature_ID) continue; ?>

<?php /* How to display posts in the Gallery category. */ ?>
	

	<?php if ( in_category( _x('gallery', 'gallery category slug', 'patric') ) ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-meta">
				<?php patric_posted_on(); ?>
			</div><!-- .entry-meta -->
			
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'patric' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="entry-content">
<?php if ( post_password_required() ) : ?>
				<?php the_content(); ?>
<?php else : ?>
				<div class="gallery-thumb">
<?php
	$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
	$total_images = count( $images );
	$image = array_shift( $images );
	$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
?>
					<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
				</div><!-- .gallery-thumb -->
				<p><em><?php printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.', 'patric' ),
						'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'patric' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
						$total_images
					); ?></em></p>

				<?php the_excerpt(); ?>
<?php endif; ?>
			</div><!-- .entry-content -->

			<div class="entry-utility">
				<a href="<?php echo get_term_link( _x('gallery', 'gallery category slug', 'patric'), 'category' ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', 'patric' ); ?>"><?php _e( 'More Galleries', 'patric' ); ?></a>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'patric' ), __( '1 Comment', 'patric' ), __( '% Comments', 'patric' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'patric' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->

<?php /* How to display posts in the asides category */ ?>

	<?php elseif ( in_category( _x('asides', 'asides category slug', 'patric') ) ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'patric' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

			<div class="entry-utility">
				<?php patric_posted_on(); ?>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'patric' ), __( '1 Comment', 'patric' ), __( '% Comments', 'patric' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'patric' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->

<?php /* How to display all other posts. */ ?>

	<?php else : 
		
		?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php if (has_post_thumbnail()): ?>
				<div class="post-thumbnail-container"><?php the_post_thumbnail(); ?></div>
			<?php endif; ?>
			
			<div class="entry-meta">
				
				<?php
					$custom = get_post_custom();
					$eventFields = array();
					if($custom['eventDate'][0] != '') array_push($eventFields,$custom['eventDate'][0]);
					if($custom['eventLocation'][0] != '') array_push($eventFields,$custom['eventLocation'][0]);
					if(count($eventFields) > 0):
				?>
					<?php echo join(', ',$eventFields); ?>
				<?php
					elseif(!is_page()):
				?>
					<?php echo the_date('d M Y') ?>
				<?php
					endif;
				?>
			</div><!-- .entry-meta -->
			
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'patric' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				<?php edit_post_link( __( 'Edit', 'patric' ), '| <span class="edit-link">', '</span>' ); ?>
				</h2>
			


			<?php if ( is_archive() || is_search() || is_front_page()  ) : // Only display excerpts for archives and search. 

			?>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
			<?php else : ?>
					<div class="entry-content">
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'patric' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'patric' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
			
			<?php endif; ?>
			<?php $tags = get_the_tags(); 
				if($tags):
			?>
			<div class="entry-tags"><b>Tags:</b> <?php the_tags(''); ?></div>
			<?php
				endif;
			?>
			
			<?php if(is_page()): ?>
			<div class="entry-meta revised">Revised: <?php echo the_modified_date('d M Y') ?></div>
			<?php endif; ?>
	
			<?php 
				$categories = wp_get_object_terms($post->ID,array('category'));
				if($categories && count($categories) > 0):
			?>
				<ul class="categories-list">
			<?php foreach($categories as $c): ?>
					<li class="categorylist-<?php echo $c->slug ?>"><a href="/<?php echo $c->taxonomy ?>/<?php echo $c->slug ?>"><?php echo $c->name ?></a></li>
			<?php
					endforeach;
			?>
				</ul>
			<?php
				endif;
			?>

		</div><!-- #post-## -->

		<?php comments_template( '', true ); ?>

	<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'patric' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'patric' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
