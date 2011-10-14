<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name'=>'Left Sidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));


  function custom_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>" >
    
		<div class="con-gravitar"><?php echo get_avatar( get_comment_author_email(), '80' )?></div>
		<div class="con-body">
			<div class="con-date">
				<span><?php comment_date('Y'); ?></span> <?php comment_date('F j'); ?>
			</div>
            
			<div class="con-head">
				<?php comment_author_link() ?> <span class="con-permalink"><a href="<?php echo get_permalink(); ?>#comment-<?php comment_ID(); ?>">permalink</a></span>   
			</div>
			
			<?php if ($comment->comment_approved == '0') : ?>
				<p><em><strong>Please Note:</strong> Your comment is awaiting moderation.</em></p>
			<?php endif; ?>
			<?php comment_text() ?>
			<?php comment_type((''),('Trackback'),('Pingback')); ?>
			<div class="reply">
				<?php echo comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth']));  ?>
			</div>
                    <?php edit_comment_link('edit','<p>','</p>'); ?>
		</div>

	<?php } ?>
<?php
// Pingbacks
function list_pings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
?>
        <li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
       <?php
}
?>
