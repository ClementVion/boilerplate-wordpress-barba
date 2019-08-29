<?php

// Include resources
function resources() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'header_js', get_template_directory_uri() . '/js/header-bundle.js', null, 1.0, true );
	wp_enqueue_script( 'footer_js', get_template_directory_uri() . '/js/app.js', null, 1.0, true );
}

add_action( 'wp_enqueue_scripts', 'resources' );

// Theme setup
function setup() {
	// Handle Titles
	add_theme_support( 'title-tag' );

	// Add featured image support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'small-thumbnail', 720, 720, true );
	add_image_size( 'square-thumbnail', 80, 80, true );
	add_image_size( 'banner-image', 1024, 1024, true );
}

add_action( 'after_setup_theme', 'setup' );