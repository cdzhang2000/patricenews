<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('url'); ?>/frontrss" title="PATRIC eNews Feed" />
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/ie-css3.js" type="text/javascript"></script>
	<!-- 
	  ** IE "fix" stylesheets
	  -->
	<!--[if IE]>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/cssie/ie-global.css" type="text/css" />
	<![endif]-->
	<!-- [if IE 8]>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/cssie/ie-8.css" type="text/css" />
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/cssie/ie-7.css" type="text/css" />
	<![endif]-->
	<!--[if lte IE 6]>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/cssie/ie-6.css" type="text/css" />
	<![endif]-->
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
</head>
<body>
<!--
	#header contains the logo, main, and secondary navigation
-->
<div id="header">
	<div class="constrain">
		<div><a href="http://www.patricbrc.org" id="masthead">PATRIC <span class="sub">Pathosystems Resouce Integration Center</span></a></div>
		<div><a href="/" id="enewsFlag">eNews</a></div>
		<?php /* this should be generated automatically, but we'll make this static because we're rushed. */?>
		<ul id="secondarynav">
			<li><a href="http://www.patricbrc.org">PATRIC website</a></li>
			<li><a href="http://www.patricbrc.org/portal/portal/patric/About?page=cite" id="citeMenu">Cite PATRIC</a></li>
			<li><a href="mailto:patric@vbi.vt.edu?subject=PATRIC Feedback" id="feedbackMenu">Feedback</a></li>
			<li><a href="http://enews.patricbrc.org/subscribe" id="subscribeMenu">Subscribe</a></li>
			<li><a href="/frontrss" id="RSS">RSS</a></li>
			<li class="noborder">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4c40660c515875dc" class="addthis_button_compact">Share</a>
				</div>
				<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4c40660c515875dc"></script>
				<!-- AddThis Button END -->
			</li>
		</ul>
	</div><!-- .constrain -->
</div><!-- #header -->

<!-- 
	#toppage contains Watchlist Genera, search tools, and the
	most-viewed bacteria cloud.
-->
<div id="toppage">
	<div class="constrain block">


							