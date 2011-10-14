<?php
// Do not delete
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view and make comments.</p>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	
    <div class="comment-no">
		<span><?php comments_number('No Responses', 'One Response', '% Responses' );?></span>
		<a id="leavecomment" href="#respond" title="<?php _e("Leave One"); ?>"> Leave Your Own &raquo;</a>
	</div>
    
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=custom_comment'); ?>
	</ol>
    
	<div style="clear:both;"></div>
    
    <div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
    
	<div style="clear:both;"></div>
	
	<?php if ( ! empty($comments_by_type['pings']) ) : ?>
	
    	<h3 class="pinghead">Trackbacks &amp; Pingbacks</h3>
		<ol class="pinglist">
			<?php wp_list_comments('type=pings&callback=list_pings'); ?>
		</ol>
    
	<div style="clear:both;"></div>
	
	<?php endif; ?>
	<?php else : // displayed if there are no comments ?>
  
	<?php if ('open' == $post->comment_status) : ?>
    
		<!-- Open, but none posted. -->
		<div class="comment-no">
			<span>No comments yet</span>
		</div>
    
	<?php else : // closed comments ?>
    
		<!-- Closed. -->
		<p class="note">Comments are closed for this entry.</p>
        
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<!-- Comments Form -->  
  <div id="respond">
  
    <div class="cancel-comment-reply">
      <span><?php cancel_comment_reply_link(); ?></span>
    </div>
    
    <h4 id="postcomment"><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h4>
    
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
      <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
      </div>
    <?php else : ?>
    
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    	<?php if ( $user_ID ) : ?>
            <p>
                Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
                <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a>
            </p>
    	<?php else : ?>
            <p>
                <label for="author" class="comment-field">
                    Name <?php if ($req) _e('(required)'); ?>:
                </label>
                <input class="text-input" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
            </p>
            <p>
                <label for="email" class="comment-field">
                    Email <?php if ($req) _e('(required)'); ?>:
                </label>
                <input class="text-input" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
            </p>
            <p>
                <label for="url" class="comment-field">
                    Website
                </label>
                <input class="text-input" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
            </p>
    	<?php endif; ?>
            <p>
                <label for="comment" class="comment-field">
                   Comment:
                </label>
                <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea>
            </p>
            <p class="privacy">
                <strong>Note:</strong> Your email address will <strong>never</strong> be published.
            </p>
    	<?php do_action('comment_form', $post->ID); ?>
            <p>
                <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
            </p>
    	<?php comment_id_fields(); ?>
	</form>
    <!--Comments Form-->
</div>

<?php endif; // ?>

<?php endif; // ?>
