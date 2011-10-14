<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
 
 global $home_feature_id;
?>
			<div class="clear"></div>
    	</div>
</div>
<div class="clear"></div>
<div id="footer-wrapper">
    <div id="footer">
    	<div id="footer_nav">
        	<a href="<?php echo get_option('home'); ?>" class="footerHome" ><span>Home</span></a>
            <?php wp_page_menu('exclude='.$home_feature_id.'&sort_column=menu_order&link_before=<span>&link_after=</span>'); ?>
        </div>
    <!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
    	<p class="auto alignright">Copyright &copy; <?php echo date('Y'); ?>, <?php echo bloginfo('name'); ?></p>
        <div class="clear"></div>
        <p class="auto alignleft"><a href="http://www.networksolutions.com/web-hosting/index.jsp" target="_blank">Web Hosting</a> by Network Solutions</p>
        <p class="auto alignright">
            <?php bloginfo('name'); ?> is proudly powered by
            <a href="http://wordpress.org/">WordPress</a>
            <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
        </p>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>
<br />

<!-- Gorgeous design by Michael Heilemann - http://binarybonsai.com/kubrick/ -->
<?php /* "Just what do you think you're doing Dave?" */ ?>

		<?php wp_footer(); ?>
</body>
</html>
