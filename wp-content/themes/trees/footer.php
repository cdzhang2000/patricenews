<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
 
?>
			<div class="clear"></div>
        </div>
	<div class="clear"></div>
</div>
</div>
<div id="footer-wrapper">
    <div id="footer">
    	<?php wp_page_menu('show_home=1&sort_column=menu_order'); ?>
    <!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
    	<p class='auto right'>Copyright &copy; <?php echo date('Y'); ?>, <?php echo bloginfo('name'); ?></p>
        <div class="clear"></div>
        <p class="auto left">&nbsp;&nbsp;&nbsp;Network Solutions for <a href="http://www.networksolutions.com" target="_blank">Domain Names</a>.</p>
        <p class="auto right">
            <?php bloginfo('name'); ?> is proudly powered by
            <a href="http://wordpress.org/">WordPress</a>
            <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
        </p>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>
<div>
<br />

<!-- Gorgeous design by Michael Heilemann - http://binarybonsai.com/kubrick/ -->
<?php /* "Just what do you think you're doing Dave?" */ ?>

		<?php wp_footer(); ?>
</body>
</html>
