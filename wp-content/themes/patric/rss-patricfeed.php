<?php
/*
 * Template Name: Patric Front Page Feed 
 */

$numposts = 5;

/* chain the queries we need to do. */
$featureArgs = array('post_type'=>array('feature'),'showposts'=>1,'suppress_filters'=>true);


$postArgs = array('post_type' =>'post, event', 'post__not_in' => get_option( 'sticky_posts'), 'category_name' =>'data-release, patric-in-the-news, presentations, publications, webupdate', 'showposts'=>5);

//$postArgs = $my_query->have_posts();

$stickyArgs = array('posts_per_page' =>2, 'post__in'  => get_option( 'sticky_posts' ),	'ignore_sticky_posts' => 2);


$queries = array($stickyArgs, $postArgs, $featureArgs);
//$posts = query_posts($postArgs);

header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);
echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>

<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	<?php do_action('rss2_ns'); ?>
>

<channel>
	<title><?php bloginfo_rss('name');?></title>
	<atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
	<link><?php bloginfo_rss('url') ?></link>
	<description><?php bloginfo_rss("description") ?></description>
	<lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
	<?php the_generator( 'rss2' ); ?>
	<language><?php echo get_option('rss_language'); ?></language>
	<sy:updatePeriod><?php echo apply_filters( 'rss_update_period', 'hourly' ); ?></sy:updatePeriod>
	<sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', '1' ); ?></sy:updateFrequency>
	<?php do_action('rss2_head'); ?>
	<?php 
foreach($queries as $query):
	// execute the query in the array
	$posts = query_posts($query);
	
	// output loop
	while( have_posts()) : the_post(); 
		// Structured content is still stored in Wordpress's 
		// "custom fields" structure (!!!) so we need to load 
		// those. Then we'll get the values and store them in 
		// more concise variable names. 
		//
		// Not every post type will have every one of these 
		// items, so we could test based on post type and
		// process those accordingly, but for this small
		// set that overcomplicates things. So we'll just
		// get them all at once.
		$custom = get_post_custom($post->ID);	
		$date = $custom["eventDate"][0];
		$location = $custom['eventLocation'][0];
		$subtitle = $custom['featureSubtitle'][0];
		$posttype = get_post_type( $post );
		$taxonomyName = $posttype.'_type';
?>	
	<item>
		<title><![CDATA[<?php the_title() ?>]]></title>
		<link><?php the_permalink_rss() ?></link>
		<posttype><?php echo $posttype ?></posttype>
		<?php
			if($date != ''):
		?>
		<eventDate><?php echo htmlentities(strip_tags($date)); ?></eventDate>
		<?php
			endif;
			if($location != ''):
		?>
		<eventLocation><?php echo htmlentities(strip_tags($location)); ?></eventLocation>
		<?php
			endif;
			if($subtitle != ''):
		?>
		<subtitle><?php echo  $subtitle ?></subtitle>
		<?php endif; ?>
		<pubDate><?php echo mysql2date('d M Y', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
		<dc:creator><?php the_author() ?></dc:creator>
		<?php 
			// this is really handy for standard post types...
			the_category_rss();
		?>
		<guid isPermaLink="false"><?php the_guid(); ?></guid>
<?php if (get_option('rss_use_excerpt')) : ?>
		<description><![CDATA[<?php the_excerpt() ?>]]></description>
<?php else : ?>
		<description><![CDATA[<?php echo the_excerpt() ?>]]></description>
	<?php if ( strlen( $post->post_content ) > 0 ) : ?>
		<content:encoded><![CDATA[<?php the_content_feed('rss2') ?>]]></content:encoded>
	<?php else : ?>
		<content:encoded><![CDATA[<?php the_excerpt() ?>]]></content:encoded>
	<?php endif; ?>
<?php endif; ?>
<?php  
	if ( has_post_thumbnail( $post->ID ) ):
		$thumbpic = get_the_post_thumbnail( $post->ID, array(239,164) );
?>
	<thumb><?php echo $thumbpic ?></thumb>
<?php endif; ?>
<?php rss_enclosure(); ?>
	<?php do_action('rss2_item'); ?>
	</item>
	<?php endwhile; endforeach;?>
</channel>

</rss>

