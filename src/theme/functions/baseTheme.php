<?php

// Disable Emoji
function disableWpEmojicons() {
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    add_filter('tiny_mce_plugins', 'disableEmojiconsTynymce');
}

function disableEmojiconsTynymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

add_action('init', 'disableWpEmojicons');

// Hide admin bar
show_admin_bar(false);

// Option page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Options',
        'menu_title'    => 'Options',
        'menu_slug'     => 'options-generales',
        'capability'    => 'edit_posts',
        'redirect'      => true
    ));
}

// projects post type archive
function projects_post_type() {
    register_post_type('projects',
            array(
                'labels' => array(
                    'name' => __('Projects'),
                    'singular_name' => __('Project')
                ),
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'projects'),
                'capability_type' => 'post',
                'has_archive' => false,
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
            )
    );
}

add_action('init', 'projects_post_type');

// objects post type archive
function objects_post_type() {
    register_post_type('objects',
            array(
                'labels' => array(
                    'name' => __('Objects'),
                    'singular_name' => __('Object')
                ),
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'objects'),
                'capability_type' => 'post',
                'has_archive' => false,
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
            )
    );
}

add_action('init', 'objects_post_type');


function add_class_to_span($title, $class = '') {
    if (!is_admin()) {
        if($title){
            $html = str_get_html($title);
            for($i = 0; $i < count($html->find('span')); $i ++){
                $html->find('span', $i)->setAttribute('class', $class);
            }
            return $html;
        }
    }
    return $title;
}


function add_css_to_span($title, $style = "") {
    if (!is_admin()) {
        if($title){
            $html = str_get_html($title);
            for($i = 0; $i < count($html->find('span')); $i ++){
                $html->find('span', $i)->setAttribute('style', $style);
            }
            return $html;
        }
    }
    return $title;
}


// Remove thumbnail dimensions
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

// Add SVH exthention
/* Autoriser les fichiers SVG */
function wpc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');

// Projects archive Class
function projects_class( $classes ) {
    if ( is_post_type_archive( 'projects' ) ) {
        $classes[] = 'projects';
    }
    return $classes;
}
add_filter( 'body_class', 'projects_class' );

// Objects archive Class
function objects_class( $classes ) {
    if ( is_post_type_archive( 'objects' ) ) {
        $classes[] = 'objects';
    }
    return $classes;
}
add_filter( 'body_class', 'objects_class' );

