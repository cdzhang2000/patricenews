<?php
/*
Plugin Name: Add To Facebook
Version: 1.4.3
Plugin URI: http://nothing.golddave.com/?page_id=108
Description: Adds a footer link to add the current post or page to a Facebook Mini-Feed.
Author: David Goldstein
Author URI: http://nothing.golddave.com/
*/

/*
Change Log

1.4.3
  * Improved option saving mechanism to avoid conflicts with other plugins.
  
1.4.2
  * Added a title specs to the links.

1.4.1
  * Added slashes at end of image tags per XHTML specification.

1.4
  * Added CSS.
  * Fixed bug that prevented the Facebook icon to appear in version 1.3.

1.3
  * Links now open in a new tab/window.

1.2
  * Added option to use a template tag.
  * Fixed bug that prevented the Facebook icon to appear in version 1.1.

1.1
  * Added options page to choose between text/image links.

1.0
  * First public release.
*/ 

function add_to_facebook($data){
	global $post;
	$current_options = get_option('add_to_facebook_options');
	$linktype = $current_options['link_type'];
	switch ($linktype) {
		case "text":
			$data=$data."<p class=\"facebook\"><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\" title=\"Share on Facebook\">Share on Facebook</a></p>";
			break;
		case "image":
			$data=$data."<p class=\"facebook\"><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\"><img src=\"".get_bloginfo(wpurl)."/wp-content/plugins/add-to-facebook-plugin/facebook_share_icon.gif\" alt=\"Share on Facebook\" title=\"Share on Facebook\" /></a></p>";
			break;
		case "both":
			$data=$data."<p class=\"facebook\"><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\"><img src=\"".get_bloginfo(wpurl)."/wp-content/plugins/add-to-facebook-plugin/facebook_share_icon.gif\" alt=\"Share on Facebook\" title=\"Share on Facebook\" /></a><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\" title=\"Share on Facebook\">Share on Facebook</a></p>";
			break;
		}
		return $data;
}

function activate_add_to_facebook(){
	global $post;
	$current_options = get_option('add_to_facebook_options');
	$insertiontype = $current_options['insertion_type'];
	if ($insertiontype != 'template'){
		add_filter('the_content', 'add_to_facebook', 10);
		add_filter('the_excerpt', 'add_to_facebook', 10);
	}
}

activate_add_to_facebook();

function addtofacebook(){
	global $post;
	$current_options = get_option('add_to_facebook_options');
	$insertiontype = $current_options['insertion_type'];
	if ($insertiontype != 'auto'){
		$linktype = $current_options['link_type'];
		switch ($linktype) {
			case "text":
				echo "<p class=\"facebook\"><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\" title=\"Share on Facebook\">Share on Facebook</a></p>";
				break;
			case "image":
				echo "<p class=\"facebook\"><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\"><img src=\"".get_bloginfo(wpurl)."/wp-content/plugins/add-to-facebook-plugin/facebook_share_icon.gif\" alt=\"Share on Facebook\" title=\"Share on Facebook\" /></a></p>";
				break;
			case "both":
				echo "<p class=\"facebook\"><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\"><img src=\"".get_bloginfo(wpurl)."/wp-content/plugins/add-to-facebook-plugin/facebook_share_icon.gif\" alt=\"Share on Facebook\" title=\"Share on Facebook\" /></a><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\" title=\"Share on Facebook\">Share on Facebook</a></p>";
				break;
			}
		}
}

// Create the options page
function add_to_facebook_options_page() { 
	$current_options = get_option('add_to_facebook_options');
	$link = $current_options["link_type"];
	$insert = $current_options["insertion_type"];
	if ($_POST['action']){ ?>
		<div id="message" class="updated fade"><p><strong>Options saved.</strong></p></div>
	<?php } ?>
	<div class="wrap" id="add-to-facebook-options">
		<h2>Add to Facebook Options</h2>
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']; ?>">
			<fieldset>
				<legend>Options:</legend>
				<input type="hidden" name="action" value="save_add_to_facebook_options" />
				<table width="100%" cellspacing="2" cellpadding="5" class="editform">
					<tr>
						<th valign="top" scope="row"><label for="link_type">Link Type:</label></th>
						<td><select name="link_type">
						<option value ="text"<?php if ($link == "text") { print " selected"; } ?>>Text Only</option>
						<option value ="image"<?php if ($link == "image") { print " selected"; } ?>>Image Only</option>
						<option value ="both"<?php if ($link == "both") { print " selected"; } ?>>Image and Text</option>
						</select></td>
					</tr>
					<tr>
						<th valign="top" scope="row"><label for="insertion_type">Insertion Type:</label></th>
						<td><select name="insertion_type">
						<option value ="auto"<?php if ($insert == "auto") { print " selected"; } ?>>Auto</option>
						<option value ="template"<?php if ($insert == "template") { print " selected"; } ?>>Template</option>
						</select></td>
					</tr>
				</table>
			</fieldset>
			<p class="submit">
				<input type="submit" name="Submit" value="Update Options &raquo;" />
			</p>
		</form>
	</div>
<?php 
}

function add_to_facebook_add_options_page() {
	// Add a new menu under Options:
	add_options_page('Add to Facebook', 'Add to Facebook', 10, __FILE__, 'add_to_facebook_options_page');
}

function add_to_facebook_save_options() {
	// create array
	$add_to_facebook_options["link_type"] = $_POST["link_type"];
	$add_to_facebook_options["insertion_type"] = $_POST["insertion_type"];
	
	update_option('add_to_facebook_options', $add_to_facebook_options);
	$options_saved = true;
}

add_action('admin_menu', 'add_to_facebook_add_options_page');

if (!get_option('add_to_facebook_options')){
	// create default options
	$add_to_facebook_options["link_type"] = 'text';
	$add_to_facebook_options["insertion_type"] = 'auto';
	
	update_option('add_to_facebook_options', $add_to_facebook_options);
}

if ($_POST['action'] == 'save_add_to_facebook_options'){
	add_to_facebook_save_options();
}

function facebookcss() {
	?>
	<link rel="stylesheet" href="<?php bloginfo('wpurl'); ?>/wp-content/plugins/add-to-facebook-plugin/facebook.css" type="text/css" media="screen" />
	<?php
}

add_action('wp_head', 'facebookcss');
?>
