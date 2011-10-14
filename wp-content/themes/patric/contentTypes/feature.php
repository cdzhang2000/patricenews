<?php 
// Feature content type

if(!function_exists('build_feature')):
add_action('init','build_feature');
add_action('admin_init','add_feature');
add_action('save_post','update_feature');

function build_feature() {
	$args = array(
		'label' => __('Features'),
		'singlular_label' => __('Feature'),
		'capability_type' => 'post',
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'rewrite' => true,
		'taxonomies' => array (
			'category','post_tag'
		),
		'menu_position' =>5,		
		'supports' => array (
			'title',
			'editor',
			'author',
			'excerpt',
			'revisions',
			'thumbnail',
		));
	register_post_type('feature', $args);
}

function add_feature() {
	add_meta_box("feature_details","Feature Details","feature_options","feature","normal","high");
}

function feature_options() {
	global $post;
	$custom = get_post_custom($post->ID);
	$featureSubtitle = $custom['featureSubtitle'][0];
?>
	<div id="event-options">
		<p>
		<label>Feature Subtitle</label><br />
		<input type="text" name="featureSubtitle" value="<?php echo $featureSubtitle ?>" class="code" style="width:100%" />
		</p>
	</div>
<?php
}

function update_feature() {
	global $post;
	update_post_meta($post->ID,"featureSubtitle",$_POST['featureSubtitle']);
}

endif;
