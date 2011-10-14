
	<!-- Sidebar -->
	<div id="sidebar">
  	<ul class="left-sidebar">
  		<?php if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar('Left Sidebar') ) : ?>
		<li id="recent-posts" class="widget widget_recent_entries">
			<h3 class="widgettitle">Recent Posts</h3>
				<?php query_posts ('showposts=10');?>
				<ul>
				<?php while ( have_posts() ) : the_post(); ?>
				<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
				</ul>
		</li>
		<li id="categories" class="widget widget_categories">
			<h3 class="widgettitle">Categories</h3>
				
				<ul>
				
				<?php wp_list_cats('sort_column=name&optioncount=0&hierarchical=0'); ?>
				
				</ul>
		</li>
  		<?php endif; ?>				
  	</ul>
	</div>
	<!-- End Sidebar -->
