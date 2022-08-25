<?php
/**
 ** activation theme
 **/

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
?>

<?php

function jquery_jquery_ui() {
    if (!is_admin()) {
        wp_deregister_script('jquery');

// Google API (CDN)
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', false, '1.10.1', true);
        wp_register_script('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array('jquery'), "1.10.3", true);

        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui');
    }
}
add_action('init', 'jquery_jquery_ui');


function theme_js(){

    wp_register_script('toggle-controls',
        get_stylesheet_directory_uri() . '/js/toggle-controls.js',
        array('jquery'),'1.0',true); // Custom scripts
    wp_enqueue_script('toggle-controls'); // Enqueue it!

    wp_register_script('link-scroll',
        get_stylesheet_directory_uri() . '/js/link-scroll.js',
        array('jquery'),'1.0',true); // Custom scripts
    wp_enqueue_script('link-scroll'); // Enqueue it!

    wp_register_script('slider',
        get_stylesheet_directory_uri() . '/js/slider.js',
        array('jquery'),'1.0',true); // Custom scripts
    wp_enqueue_script('slider'); // Enqueue it!

    wp_register_style('responsive',
        get_stylesheet_directory_uri() . '/css/responsive.css',
        array(), '1.0', 'all');
    wp_enqueue_style('responsive'); // Enqueue it!

    wp_register_script('anime',
        get_template_directory_uri() . '/js/anime.js',
        array('jquery'),'1.0',true); // Custom scripts
    wp_enqueue_script('anime'); // Enqueue it!

    wp_register_script('animate-theme',
        get_template_directory_uri() . '/js/animate-theme.js',
        array('jquery'),'1.0',true); // Custom scripts
    wp_enqueue_script('animate-theme'); // Enqueue it!

    wp_register_style('animate',
        get_template_directory_uri() . '/animate.css',
        array(), '1.0', 'all');
    wp_enqueue_style('animate'); // Enqueue it!

    wp_register_style('animate-theme',
        get_template_directory_uri() . '/animate-theme.css',
        array(), '1.0', 'all');
    wp_enqueue_style('animate-theme'); // Enqueue it!

}

add_action('wp_enqueue_scripts', 'theme_js', 99);


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Settings',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

}

add_action( 'after_setup_theme', 'ac_theme_setup' );
function ac_theme_setup() {
    add_image_size( 'custom_apropos', 461, 575, true );
    add_image_size( 'custom_membre', 276, 332, true );
    add_image_size( 'custom-logo-slider', 466, 304, true );
    add_image_size( 'custom-video', 362, 153, true );
    add_image_size( 'custom-galerie-fat', 358, 583, true );
    add_image_size( 'custom-galerie-small', 358, 220, true );
    add_image_size( 'custom-presta', 363, 232, true );
}

