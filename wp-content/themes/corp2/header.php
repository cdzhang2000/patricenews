<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

<?php
// Get Feature Area
include(TEMPLATEPATH . '/includes/featured.php');
global $feature_text;
global $home_feature_id;
?>
</head>
<body <?php if(is_home()) { echo 'id="front"'; } ?>>
<div id="page">
<div id="header">
        <h1><a href="<?php echo get_option('home'); ?>/"><?php echo bloginfo('name'); ?></a></h1>
        <span class="slogan-cap"></span>
        <div id="slogan">
            <?php echo bloginfo('description'); ?> 
        </div>
        
        <div id="meta_links">
            <a href="<?php echo bloginfo('rss2_url'); ?>" class="rss_link">RSS</a>
            <a href="mailto:<?php echo bloginfo('admin_email'); ?>" class="email_link">Email</a>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
	<div id="body-wrapper">   	
        <div id="nav">
            <a href="<?php echo get_option('home'); ?>" class='homeBtn' ><span>Home</span></a>
            <?php wp_page_menu('exclude='.$home_feature_id.'&sort_column=menu_order&link_before=<span>&link_after=</span>'); ?>
        </div>
        <?php if(is_home()) : 
			 	if($home_feature_id) : ?>
                <br />
                <div id="featured">
                    <?php echo $feature_text; ?>
                </div>
                <?php else: ?>
                <br />
                <div id="featured">
                    <h4>Featured Area</h4>
                    <p>To take advantage of this area. Create a new page with 'home_feature' as the title and name. Put the content you wish to appear in this area as the content of that page.</p>
                </div>
                <?php 
				endif;
			endif; ?>
        <?php include(TEMPLATEPATH . '/searchform.php'); ?>
