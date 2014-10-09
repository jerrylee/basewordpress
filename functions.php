<?php
//Enqueue Styles
function enqueue_styles() {
    wp_enqueue_style('bootstrap_styles', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('google_fonts', 'http://fonts.googleapis.com/css?family=Raleway:400,100,300,500,700|Open+Sans:400,300,600,800');
    wp_enqueue_style('custom_styles', get_template_directory_uri() . '/css/styles.css');
}

add_action('wp_enqueue_scripts','enqueue_styles');


// Enqueue Scripts
function enqueue_scripts() {

	wp_enqueue_script( 'bootstrap_scripts', get_template_directory_uri() . '/js/bootstrap.js', '1.0', true );
	wp_enqueue_script( 'custom_scripts', get_template_directory_uri() . '/js/scripts.js', '1.0', true );

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );


// Register Theme Features
function custom_theme_features()  {
	global $wp_version;

	// Add theme support for Post Formats
	$formats = array( 'gallery', 'image', 'video', 'audio', );
	add_theme_support( 'post-formats', $formats );	

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );	

	// Add theme support for Semantic Markup
	$markup = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', );
	add_theme_support( 'html5', $markup );	
}

// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'custom_theme_features' );