<?php
$ua = $_SERVER['HTTP_USER_AGENT'];

if (!(ereg("Windows",$ua) && ereg("MSIE",$ua)) || ereg("MSIE 7",$ua)) {
     echo '<?xml version="1.0" encoding="' . get_settings('blog_charset') .'"?>' . "\n";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php wp_title(''); if (function_exists('is_tag') and is_tag()) { ?><?php } if (is_archive()) { ?><?php } elseif (is_search()) { ?><?php echo $s; } if ( !(is_404()) and (is_search()) or (is_single()) or (is_page()) or (function_exists('is_tag') and is_tag()) or (is_archive()) ) { ?><?php _e(' | '); ?><?php } ?><?php bloginfo('name'); ?></title>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" /> 
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/comment-style.css" type="text/css" media="screen" />
<?php if (strtoupper(get_locale()) == 'JA') ://to fix the font-size for japanese font ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/japanese.css" type="text/css" media="screen" />
<?php endif; ?>
<!--[if lt IE 7]>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie6.css" type="text/css" media="screen" />
<![endif]--> 

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> 
<?php wp_head(); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.easing.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.page-scroller.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jscript.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/comment.js"></script>

</head>

<body>
<div id="wrapper">

 <div id="header">

  <div id="header_top"> 
   <div id="logo">
    <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
    <h1><?php bloginfo('description'); ?></h1>
   </div>
   <div id="header_menu">
    <ul class="menu" id="menu">
     <li class="<?php if (!is_paged() && is_home()) { ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a href="<?php echo get_settings('home'); ?>/"><?php _e('HOME','monochrome'); ?></a></li>
     <?php
         $options = get_option('mc_options');
         if($options['header_menu_type'] == 'pages') {
         wp_list_pages('sort_column=menu_order&depth=0&title_li=&exclude=' . $options['exclude_pages']);
         } else {
         wp_list_categories('depth=0&title_li=&exclude=' . $options['exclude_category']);
         }
     ?>
    </ul>
   </div>
  </div>

  </div><!-- #header end -->
