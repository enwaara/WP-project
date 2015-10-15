<?php
/* Functions for our theme
 *
 *
 * @theme Lecture
 */

//$main_js_part = '/js/main.js';
//$main_style_part = '/css/main.css';

$version = '1.1';



function my_excerpt_length( $length ) {
	return 2;
}

add_filter('excerpt_length', 'my_excerpt_length');

function wp_add_styles_scripts( ) {

	if( WP_DEBUG == true ) {
		wp_enqueue_script( 'debug-js', get_template_directory_uri().'/js/debug.js');
	} else {
		wp_enqueue_script( 'main-js', get_template_directory_uri().'/js/main.js');
	}
	
	wp_enqueue_style( 'whatever_style', get_template_directory_uri().'/css/main.css', array() );
}

add_action('wp_enqueue_scripts', 'wp_add_styles_scripts');

add_action('init', 'wp_add_theme_support');

function wp_add_theme_support() {
	add_theme_support('custom-background');
	add_theme_support('custom-header');
	add_theme_support('post-thumbnails');
	add_theme_support('post-formats', array('aside', 'video'));
	add_theme_support( 'menus' );
}

?>
