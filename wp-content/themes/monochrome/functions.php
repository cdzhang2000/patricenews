<?php

// Theme option

class monochrome_options {

	function getOptions() {
		$options = get_option('mc_options');
		if (!is_array($options)) {
			$options['show_information'] = true;
			$options['information_title'] = '';
			$options['information_contents'] = '';
			$options['rss_feed'] = true;
			$options['search_position'] = 'top';
			$options['tag_list'] = false;
			$options['header_menu_type'] = 'pages';
			$options['author'] = false;
			$options['tag'] = true;
			$options['pagetop'] = true;
			$options['exclude_pages'] = '';
			$options['exclude_category'] = '';
			update_option('mc_options', $options);
		}
		return $options;
	}

	function update() {
		if(isset($_POST['pb_save'])) {
			$options = monochrome_options::getOptions();

			// information
			if ($_POST['show_information']) {
				$options['show_information'] = (bool)true;
			} else {
				$options['show_information'] = (bool)false;
			}
			$options['information_title'] = stripslashes($_POST['information_title']);
			$options['information_contents'] = stripslashes($_POST['information_contents']);
			if ($_POST['rss_feed']) {
				$options['rss_feed'] = (bool)true;
			} else {
				$options['rss_feed'] = (bool)false;
			}

			// search
			$options['search_position'] = stripslashes($_POST['search_position']);
			if ($_POST['tag_list']) {
				$options['tag_list'] = (bool)true;
			} else {
				$options['tag_list'] = (bool)false;
			}

			// header menu
			$options['header_menu_type'] = stripslashes($_POST['header_menu_type']);

			// exclude pages
			$options['exclude_pages'] = stripslashes($_POST['exclude_pages']);

			// exclude category
			$options['exclude_category'] = stripslashes($_POST['exclude_category']);

			// show author
			if ($_POST['author']) {
				$options['author'] = (bool)true;
			} else {
				$options['author'] = (bool)false;
			}

			// show tag
			if ($_POST['tag']) {
				$options['tag'] = (bool)true;
			} else {
				$options['tag'] = (bool)false;
			}

			// show pagetop link
			if ($_POST['pagetop']) {
				$options['pagetop'] = (bool)true;
			} else {
				$options['pagetop'] = (bool)false;
			}

			update_option('mc_options', $options);

		} else {
			monochrome_options::getOptions();
		}

		add_theme_page(__('Theme Options', 'monochrome'), __('Theme Options', 'monochrome'), 'edit_themes', basename(__FILE__), array('monochrome_options', 'display'));
	}

	function display() {
		$options = monochrome_options::getOptions();
?>

<div class="wrap">

<h2><?php _e('Monochrome option', 'monochrome'); ?></h2>

<form method="post" action="#" enctype="multipart/form-data">

<p><?php _e('Show Information on sidebar.', 'monochrome'); ?></p>
<p>
<input name="show_information" type="checkbox" value="checkbox" <?php if($options['show_information']) echo "checked='checked'"; ?> /><?php _e('Yes', 'monochrome'); ?><br />
</p>
<br />

<p><?php _e('Information title.', 'monochrome'); ?></p>
<p><input type="text" name="information_title" value="<?php echo($options['information_title']); ?>" /></p>
<br />

<p><?php _e('Information contents. ( HTML tag is available. )', 'monochrome'); ?></p>
<p><textarea name="information_contents" cols="70%" rows="5"><?php echo($options['information_contents']); ?></textarea></p>
<br />

<p><?php _e('Show rss feed on sidebar.', 'monochrome'); ?></p>
<p>
<input name="rss_feed" type="checkbox" value="checkbox" <?php if($options['rss_feed']) echo "checked='checked'"; ?> /><?php _e('Yes', 'monochrome'); ?><br />
</p>
<br />

<p><?php _e('Position of search area on sidebar.', 'monochrome'); ?></p>
<p>
<input name="search_position" type="radio" value="top" <?php if($options['search_position'] != 'bottom') echo "checked='checked'"; ?> /><?php _e('Top', 'monochrome'); ?><br />
<input name="search_position" type="radio" value="bottom" <?php if($options['search_position'] == 'bottom') echo "checked='checked'"; ?> /><?php _e('Bottom', 'monochrome'); ?>
</p>
<br />

<p><?php _e('Show tag list under search area.', 'monochrome'); ?></p>
<p>
<input name="tag_list" type="checkbox" value="checkbox" <?php if($options['tag_list']) echo "checked='checked'"; ?> /><?php _e('Yes', 'monochrome'); ?><br />
</p>
<br />

<p><?php _e('Header menu.', 'monochrome'); ?></p>
<p>
<input name="header_menu_type" type="radio" value="pages" <?php if($options['header_menu_type'] != 'categories') echo "checked='checked'"; ?> /><?php _e('Use pages for header menu.', 'monochrome'); ?><br />
<input name="header_menu_type" type="radio" value="categories" <?php if($options['header_menu_type'] == 'categories') echo "checked='checked'"; ?> /><?php _e('Use categories for header menu.', 'monochrome'); ?>
</p>
<br />

<p><?php _e('Exclude Pages (Page ID\'s you don\'t want displayed in your header navigation. Use a comma-delimited list, eg. 1,2,3)', 'monochrome'); ?></p>
<p><input type="text" name="exclude_pages" value="<?php echo($options['exclude_pages']); ?>" /></p>
<br />

<p><?php _e('Exclude Categories (Category ID\'s you don\'t want displayed in your header navigation. Use a comma-delimited list, eg. 1,2,3)', 'monochrome'); ?></p>
<p><input type="text" name="exclude_category" value="<?php echo($options['exclude_category']); ?>" /></p>
<br />

<p><?php _e('Show author name.', 'monochrome'); ?></p>
<p>
<input name="author" type="checkbox" value="checkbox" <?php if($options['author']) echo "checked='checked'"; ?> /><?php _e('Yes', 'monochrome'); ?><br />
</p>
<br />

<p><?php _e('Show tag.', 'monochrome'); ?></p>
<p>
<input name="tag" type="checkbox" value="checkbox" <?php if($options['tag']) echo "checked='checked'"; ?> /><?php _e('Yes', 'monochrome'); ?><br />
</p>
<br />

<p><?php _e('Check if you want to show Return top link.<br />( NOTICE : Return top link does not work on IE6. )', 'monochrome'); ?></p>
<p><input name="pagetop" type="checkbox" value="checkbox" <?php if($options['pagetop']) echo "checked='checked'"; ?> /><?php _e('Yes', 'monochrome'); ?></p>
<br />
<br />

<p><input class="button-primary" type="submit" name="pb_save" value="<?php _e('Save Changes', 'monochrome'); ?>" /></p>

</form>

</div>

<?php
  }
}

// register functions
add_action('admin_menu', array('monochrome_options', 'update'));


// for localization
load_textdomain('monochrome', dirname(__FILE__).'/languages/' . get_locale() . '.mo');


// Sidebar widget
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div class="side_box" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3>',
        'after_title' => "</h3>\n",
    ));


// Remove [...] from excerpt
function trim_excerpt($text) {
  return rtrim($text,'[...]');
}
add_filter('get_the_excerpt', 'trim_excerpt');


// Original custom comments function is written by mg12 - http://www.neoease.com/

if (function_exists('wp_list_comments')) {
	// comment count
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $commentcount ) {
		global $id;
		$_commnets = get_comments('post_id=' . $id);
		$comments_by_type = &separate_comments($_commnets);
		return count($comments_by_type['comment']);
	}
}


function custom_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	global $commentcount;
	if(!$commentcount) {
		$commentcount = 0;
	}
?>

 <li class="comment <?php if($comment->comment_author_email == get_the_author_email()) {echo 'admin-comment';} else {echo 'guest-comment';} ?>" id="comment-<?php comment_ID() ?>">
  <div class="comment-meta">
   <div class="comment-meta-left">
  <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 35); } ?>
  
    <ul class="comment-name-date">
     <li class="comment-name">
<?php if (get_comment_author_url()) : ?>
<a id="commentauthor-<?php comment_ID() ?>" class="url <?php if($comment->comment_author_email == get_the_author_email()) {echo 'admin-url';} else {echo 'guest-url';} ?>" href="<?php comment_author_url() ?>" rel="external nofollow">
<?php else : ?>
<span id="commentauthor-<?php comment_ID() ?>">
<?php endif; ?>

<?php comment_author(); ?>

<?php if(get_comment_author_url()) : ?>
</a>
<?php else : ?>
</span>
<?php endif; ?>
     </li>
     <li class="comment-date"><?php echo get_comment_time(__('F jS, Y', 'monochrome')); ?></li>
    </ul>
   </div>

   <ul class="comment-act">
<?php if (function_exists('comment_reply_link')) { 
        if ( get_option('thread_comments') == '1' ) { ?>
    <li class="comment-reply"><?php comment_reply_link(array_merge( $args, array('add_below' => 'comment-content', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<span><span>'.__('REPLY','monochrome').'</span></span>'.$my_comment_count))) ?></li>
<?php   } else { ?>
    <li class="comment-reply"><a href="javascript:void(0);" onclick="MGJS_CMT.reply('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment');"><?php _e('REPLY', 'monochrome'); ?></a></li>
<?php   }
      } else { ?>
    <li class="comment-reply"><a href="javascript:void(0);" onclick="MGJS_CMT.reply('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment');"><?php _e('REPLY', 'monochrome'); ?></a></li>
<?php } ?>
    <li class="comment-quote"><a href="javascript:void(0);" onclick="MGJS_CMT.quote('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment-content-<?php comment_ID() ?>', 'comment');"><?php _e('QUOTE', 'monochrome'); ?></a></li>
    <?php edit_comment_link(__('EDIT', 'monochrome'), '<li class="comment-edit">', '</li>'); ?>
   </ul>

  </div>
  <div class="comment-content" id="comment-content-<?php comment_ID() ?>">
  <?php if ($comment->comment_approved == '0') : ?>
   <span class="comment-note"><?php _e('Your comment is awaiting moderation.', 'monochrome'); ?></span>
  <?php endif; ?>
  <?php comment_text(); ?>
  </div>

<?php } ?>
