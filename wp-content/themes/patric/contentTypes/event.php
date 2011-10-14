<?php

// Event content type

if(!function_exists('build_events')):
add_action('init','build_events');
add_action('admin_init','add_events');
add_action('save_post','update_events');

function build_events() {
	$args = array(
		'label' => __('Events'),
		'singlular_label' => __('Event'),
		'capability_type' => 'post',
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'rewrite' => array('slug'=>'event'),
		'menu_position' => 5,
		'menu_icon' => get_bloginfo('template_url') .'/images/icon-events.png',
		'taxonomies' => array (
			'post_tag','category'
		),
		'supports' => array (
			'title',
			'editor',
			'author',
			'comments',
			'excerpt',
			'revisions',
			'thumbnail',
			'trackbacks'
		));
	register_post_type('event', $args);
}

function add_events() {
	add_meta_box("event_details","Event Details","event_options","event","normal","high");
}

function event_options() {
	global $post;
	$custom = get_post_custom($post->ID);
	$eventDate = $custom['eventDate'][0];
	$eventLocation = $custom['eventLocation'][0];
?>
	<div id="event-options">
		<p>
		<label>Event Date(s):</label><br />
		<input type="text" name="eventDate" value="<?php echo $eventDate ?>" class="code" style="width:100%" />
		</p>
		<p>
		<label>Event Location:</label><br />
		<input type="text" name="eventLocation" value="<?php echo $eventLocation ?>" class="code" style="width:100%" />
	</div>
<?php
}

function update_events() {
	global $post;
	update_post_meta($post->ID,"eventDate",$_POST['eventDate']);
	update_post_meta($post->ID,"eventLocation",$_POST['eventLocation']);
}

endif;


