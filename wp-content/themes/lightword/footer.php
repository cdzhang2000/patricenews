<div class="clear"></div>
</div>
<div id="footer">
<span class="text">
<?php
$blog_name = '<a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a>';
printf(__('Copyright %s %s %s &middot; Powered by %s <br/> %s developed by %s for you.', 'lightword'),'&copy;',date('Y'),$blog_name,'<a href="http://www.wordpress.org" title="Wordpress" target="_blank">Wordpress</a>','<a title="LightWord Theme for Wordpress" target="_blank" href="http://www.andrei-webdesign.com/lightword-theme/lightword-1-8-7">LightWord Theme</a>','<a title="Andrei Luca" href="http://www.andrei-webdesign.com/" target="_blank">Andrei Luca</a>');
?>


<a title="<?php _e('Go to top','lightword'); ?>" class="top" href="#top"><?php _e('Go to top','lightword'); ?> &uarr;</a>

</span>
</div>

<?php wp_footer(); ?>
</body>
</html>
