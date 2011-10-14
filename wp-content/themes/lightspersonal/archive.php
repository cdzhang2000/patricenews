<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div id="content">
		<?php if (have_posts()) : ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="pagetitle">Posts from the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1 class="pagetitle">Posts tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h1>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h1>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="pagetitle">Archive for <?php the_time('Y'); ?></h1>
		<?php /* If this is an author archive */ } elseif (is_author()) { if (isset($_GET['author_name'])) $current_author = get_userdatabylogin($author_name); else $current_author = get_userdata(intval($author));?>
		<h1 class="pagetitle">Posts by <?php echo $current_author->nickname; ?></h1>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="pagetitle">Blog Archives</h1>
		<?php } ?>
    <div id="archive-info">Date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Title</div>
    <div id="archive-comments">Comments</div>
		<?php while (have_posts()) : the_post(); ?>
        
    <div class="entries">
      <ul>
        <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><span class="comments_number"><?php comments_number('0', '1', '%', ''); ?></span><span class="archdate"><?php the_time('n.j.y'); ?></span><?php the_title(); ?></a></li>
      </ul>
    </div>
    
    <!-- Post Navigation -->
		<?php endwhile; /* rewind or continue if all posts are shown */ ?>
            <div class="navigation">
                <div class="old"><?php next_posts_link('&laquo; Older Entries') ?></div>
                <div class="new"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
            </div>
            
		<?php else : ?>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>
