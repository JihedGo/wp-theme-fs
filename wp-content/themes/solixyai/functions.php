<?php
// this is for the plugins comes with the themes

// to enqueue stylesheet
function load_css()
{
    // 1) register    
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [/* list of dependencies ( another stylesheets ) */],/*the version */ false,/*media */ 'all');
    // 2) enqueue
    wp_enqueue_style('bootstrap');

    // to main.css

    // 1) register    
    wp_register_style('custom', get_template_directory_uri() . '/css/main.css', [/* list of dependencies ( another stylesheets ) */],/*the version */ false,/*media */ 'all');
    // 2) enqueue
    wp_enqueue_style('custom');
}

// hooking to header
add_action('wp_enqueue_scripts', 'load_css');

// to enqueue javascript
function load_js()
{

    // to include jquery
    wp_enqueue_script('jquery');
    wp_register_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, /* if in footer: true then false for the header*/ true);
    wp_enqueue_script('bootstrapjs');
}

add_action('wp_enqueue_scripts', 'load_js');

// tell wordpress to tell i would use the menus

// Theme options
add_theme_support('menus');
// Menus
register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location'
    )
);
