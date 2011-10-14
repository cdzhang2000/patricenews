<?php

//error_reporting(0);

// load custom content types and associated categories
include('contentTypes/event.php');
include('contentTypes/feature.php');

// turn on post thumbnails
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 239, 164, true ); // Normal post thumbnails
add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size
add_filter('rss_item', 'ThumbRSS');

function ThumbRSS() {
	global $post;
	if ( has_post_thumbnail( $post->ID ) ) {
		$thumbpic = get_the_post_thumbnail( $post->ID, 'thumbnail' );
	} 
   	echo '<thumb>'.$thumbpic.'</thumb>';
}

add_filter( 'pre_get_posts' , 'patric_get_posts' );
function patric_get_posts( $query ) {
	if ( (is_home() || is_archive()) && false == $query->query_vars['suppress_filters'] )
		$query->set( 'post_type', array( 'post','event', 'attachment','feature' ) );
	return $query;
}

if ( ! function_exists( 'patric_posted_in' ) ) :
function patric_posted_in() {
	// This function really shouldn't be called since we're handling this directly.
	// Output a warning to let us know when theming.
	echo("Replace Patric_Posted_In");
}
endif;

if ( ! function_exists( 'patric_posted_on' ) ) :
function patric_posted_on() {
	// This function really shouldn't be called since we're handling this directly.
	// Output a warning to let us know when theming.
	echo("Replace Patric_Posted_On");
}
endif;

/*
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');
function improved_trim_excerpt($text) {
        global $post;
        if ( '' == $text ) {
                $text = get_the_content('');
                $text = apply_filters('the_content', $text);
                $text = str_replace('\]\]\>', ']]&gt;', $text);
                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
                //$text = strip_tags($text, '<p><em><i><strong><b>');
                $excerpt_length = 80;
                $words = explode(' ', $text, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                        array_pop($words);
                        array_push($words, '[...]');
                        $text = implode(' ', $words);
                }
        }
        return $text;
}
*/