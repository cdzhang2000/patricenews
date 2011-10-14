	<div id="footer">
			<p class="copyright">
				Copyright <?php echo date('Y') ?> <?php echo $copyright_name; ?>, <a href="http://www.networksolutions.com/custom-website-packages/index.jsp">Web Design</a> by Network Solutions&trade;        
			</p>
			<ul id="footer-nav">
				<li class="page_item <?php if (is_home()) echo('current_page_item');?>"><a href="<?php bloginfo('url'); ?>">Home</a></li>
				<?php $exclude_pages = get_option('NS_pages_to_exclude'); ?>
                <?php wp_list_pages('depth=1&title_li=&exclude=' . $exclude_pages); ?>
			</ul>
	</div>
    <!-- End Footer-->
</div>
<!-- End Wrapper -->

<?php wp_footer(); ?>
	<?php
        $tmp_stats_code = get_option('NS_stats_code');
        if($tmp_stats_code != ''){
            echo stripslashes($tmp_stats_code);
        }
    ?>

<style>
/*-- Footer  --*/
	#footer a:link,
	#footer a:visited {
		color:#CCCCCC;
		text-decoration: underline;
		}
	#footer a:hover {
		color: #FF0000;
		}

	/*-- Footer Copyright --*/
		.copyright {
			color:#CCCCCC;
			float: right;
			width:350px;
			text-align:right;
			line-height:20px;
			margin:15px 20px 5px 0px;
			display:block;
			}

	/*-- Footer Nav --*/
		
		#footer-nav {
			position:absolute;
			left:20px;
			top:17px;
			font-size:14px;
			font-weight:700;
			width:490px;
			list-style: none;
			}
			#footer-nav li {
				display:inline;
				}
				#footer-nav li a {
					display: inline;
					display:block;
					float:left;
					line-height:18px;
					padding:0px 10px 0px 10px;
					color: #CCCCCC;
					text-decoration: none;
					text-transform:uppercase;
					}
					#footer-nav .page_item a:link,
					#footer-nav .page_item a:visited {
					text-decoration: none;
						}
					#footer-nav .page_item a:hover {
						color: #FF0000;
						text-decoration: none;
						text-transform:uppercase;
						}
</style>
</body>
</html>
	
