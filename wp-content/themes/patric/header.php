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
		
		<ul id="mainnav">
	<li class="tab"><a href="http://www.patricbrc.org/portal/portal/patric/Home" class="tabtext"><span>Home</span></a></li>
	<li class="tab drop" onclick="onDropdownRequested(event)"><a href="#" class="tabtext"><span>Organisms</span></a>

		<div class="submenu wide">
			<a href="#" class="menu-close" style="display: none;"><img src="http://www.patricbrc.org/patric/images/menu-close.gif" alt="close menu"></a>
			<p>Genera Containing NIAID Category A-C / Emerging / Re-emerging Bacteria Pathogens</p>
			<div class="twocol block">
				<ul class="left">
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=1386">Bacillus</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=773">Bartonella</a></li>

					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=138">Borrelia</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=234">Brucella</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=32008">Burkholderia</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=194">Campylobacter</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=83553">Chlamydophila</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=1485">Clostridium</a></li>

					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=776">Coxiella</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=943">Ehrlichia</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=561">Escherichia</a></li>
				</ul>
				<ul class="right">
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=262">Francisella</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=209">Helicobacter</a></li>

					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=1637">Listeria</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=1763">Mycobacterium</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=780">Rickettsia</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=590">Salmonella</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=620">Shigella</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=1279">Staphylococcus</a></li>

					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=1301">Streptococcus</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=662">Vibrio</a></li>
					<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=629">Yersinia</a></li>
					
				</ul>
			</div>
			<p>Complete Lists of Bacteria</p>
			<ul>

				<li><a href="http://www.patricbrc.org/portal/portal/patric/Taxon?cType=taxon&amp;cId=2">All Bacteria</a></li>
			</ul>
		</div>
	</li>
	<li class="tab drop" onclick="onDropdownRequested(event)"><a href="#" class="tabtext"><span>Searches &amp; Tools</span></a>
		<div class="submenu">
			<a href="#" class="menu-close" style="display: none;"><img src="http://www.patricbrc.org/patric/images/menu-close.gif" alt="close menu"></a>

			<p>Searches</p>
			<ul>
				<li><a href="http://www.patricbrc.org/portal/portal/patric/GenomeFinder?cType=taxon&amp;cId=&amp;dm=" title="Genome Finder allows you to locate specific genome(s) based on taxonomy, keyword, replicon size, sequence status, and/or sequence type.">Genome Finder</a></li>
				<li><a href="http://www.patricbrc.org/portal/portal/patric/GenomicFeature?cType=taxon&amp;cId=&amp;dm=" title="Feature Finder allows you to locate specific features(s) based on taxonomy, feature type, keyword, sequence status, and/or annotation type.">Feature Finder</a></li>	   
				<li><a href="http://www.patricbrc.org/portal/portal/patric/GOSearch?cType=taxon&amp;cId=&amp;dm=" title="">GO Search</a></li>
				<li><a href="http://www.patricbrc.org/portal/portal/patric/ECSearch?cType=taxon&amp;cId=&amp;dm=" title="">EC Search</a></li>
				<li><a href="http://www.patricbrc.org/portal/portal/patric/HPIFinder?cType=taxon&amp;cId=&amp;dm=" title="">Host Pathogen Interactions</a></li>

			</ul>
			<p>Comparative Analysis Tools</p>
			<ul>
				<li><a href="http://www.patricbrc.org/portal/portal/patric/PathwayFinder?cType=taxon&amp;cId=&amp;dm=" title="Comparative Pathway Tool allows you to identify a set of pathways based on taxonomy, EC number, pathway name, and/or annotation type.">Comparative Pathway Tool</a></li>
				<li><a href="http://www.patricbrc.org/portal/portal/patric/FIGfamSorter?cType=taxon&amp;cId=&amp;dm=" title="Protein Family Sorter allows you to identify and filter sets of protein families associated with specified Phylum, Classes, Orders, Families, Genus, Species or Genomes.">Protein Family Sorter</a></li>
			</ul>
			<p>Tools</p>

			<ul>
				<li><a href="http://www.patricbrc.org/portal/portal/patric/Blast">BLAST</a></li>
				<li><a href="http://www.patricbrc.org/portal/portal/patric/RAST">RAST</a></li>
				<li><a href="http://www.patricbrc.org/portal/portal/patric/MGRAST">MG-RAST</a></li>
				<li><a href="http://www.patricbrc.org/portal/portal/patric/IDMapping?cType=taxon&amp;cId=&amp;dm=" title="">ID Mapping</a></li>
				
			</ul>
		</div>

	</li>
	<li class="tab drop" onclick="onDropdownRequested(event)"><a href="#" class="tabtext"><span>Downloads</span></a>
		<div class="submenu">
			<a href="#" class="menu-close standalone" style="display: none;"><img src="http://www.patricbrc.org/patric/images/menu-close.gif" alt="close menu"></a>
			<ul>
				<li><a href="http://brcdownloads.vbi.vt.edu/patric2" target="_blank">FTP Server</a></li>
				<li><a href="http://www.patricbrc.org/portal/portal/patric/Downloads?cType=taxon&amp;cId=">Download Tool</a></li>

			</ul>
		</div>
	</li>
	<li class="tab drop" onclick="onDropdownRequested(event)"><a href="#" class="tabtext"><span>About</span></a>
		<div class="submenu">
			
			<a href="#" class="menu-close standalone" style="display: none;"><img src="http://www.patricbrc.org/patric/images/menu-close.gif" alt="close menu"></a>
			<ul>
				<li><a href="http://enews.patricbrc.org/what-is-patric/">What is PATRIC?</a></li>

				<li><a href="http://enews.patricbrc.org/faqs/">FAQs</a></li>
				<li><a href="http://enews.patricbrc.org/citing-patric/">Citing PATRIC</a></li>	
				<li><a href="http://enews.patricbrc.org/scientific-working-group/">Scientific Working Group</a></li>
				<li><a href="http://enews.patricbrc.org/personnel/">Personnel</a></li>
				<li><a href="http://enews.patricbrc.org/collaborators/">Collaborators</a></li>
				<li><a href="http://enews.patricbrc.org/related-sites/">Related Sites</a></li>
				<li><a href="http://enews.patricbrc.org/contact-us/">Contact Us</a></li>

			</ul>
			<p>eNews</p>
			<ul>
				<li><a href="http://enews.patricbrc.org/category/data-release">Data Releases &amp; Updates</a></li>
				<li><a href="http://enews.patricbrc.org/category/patric-in-the-news">News &amp; Events</a></li>

				<li><a href="http://enews.patricbrc.org/category/presentations">Presentations</a></li>
				<li><a href="http://enews.patricbrc.org/patric-publications">Publications</a></li>
				<li><a href="http://enews.patricbrc.org/tutorials-and-use-cases/">Tutorials and Use Cases</a></li>
				<li><a href="http://enews.patricbrc.org/category/webupdate">Website Updates</a></li>
			</ul>
		</div>
	</li>

	<li class="tab"><a href="http://enews.patricbrc.org/contact-us/" class="tabtext"><span>Contact Us</span></a></li>
</ul>

		
		<ul id="secondarynav">
			<li><a href="http://www.patricbrc.org">PATRIC website</a></li>
			<li><a href="http://www.patricbrc.org/portal/portal/patric/About?page=cite" id="citeMenu">Cite</a></li>
			<li><a href="http://enews.patricbrc.org/subscribe" id="subscribeMenu">Subscribe</a></li>		
			<li><a href="/frontrss" id="RSS">RSS</a></li>
			
			<li><a href="http://www.facebook.com/pages/Pathosystems-Resource-Integration-Center-PATRIC/117100971687823" id="facebook"></a></li>
			<li><a href="http://twitter.com/PATRICBRC" id="twitter"></a></li>
			<li><a href="http://www.youtube.com/user/PATRICBRC" id="youtube"></a></li>
	
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


							
