<?php
// this is for the plugins comes with the themes

// to enqueue stylesheet
function load_css()
{
    // 1) register    
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [/* list of dependencies ( another stylesheets ) */],/*the version */ false,/*media */ 'all');
    // 2) enqueue
    wp_enqueue_style('bootstrap');

    // magnific popup
    // 1) register    
    wp_register_style('magnificpopup', get_template_directory_uri() . '/css/magnific-popup.css', [/* list of dependencies ( another stylesheets ) */],/*the version */ false,/*media */ 'all');
    // 2) enqueue
    wp_enqueue_style('magnificpopup');

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
    wp_register_script('magnificjs', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', 'jquery', false, /* if in footer: true then false for the header*/ true);
    wp_enqueue_script('magnificjs');
    wp_register_script('customjs', get_template_directory_uri() . '/js/custom.js', 'jquery', false, /* if in footer: true then false for the header*/ true);
    wp_enqueue_script('customjs');
}

add_action('wp_enqueue_scripts', 'load_js');

// tell wordpress to tell i would use the menus

// Theme options
add_theme_support('menus');
// allow thumbnails
add_theme_support('post-thumbnails');
// allow widgets
add_theme_support('widgets');
// Menus
register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
        'footer-menu' => 'Footer Menu Location'
    )
);
// custom images sizes
add_image_size('blog-large', 800, 400, true);
add_image_size('blog-small', 300, 200, true);


// register sidebars
function my_sidebars()
{
    register_sidebar(
        array(
            'name' => 'Page Sidebar',
            'id' => 'page-sidebar',
            'before_title' => '<h4 class="widget-title"> ',
            'after_title' => '</h4>'
        )
    );

    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'blog-sidebar',
            'before_title' => '<h4 class="widget-title"> ',
            'after_title' => '</h4>'
        )
    );
}

add_action('widgets_init', 'my_sidebars');

function my_first_post_type()
{
    $args = array(
        'labels' => array(
            'name' => 'Cars',
            'singular_name' => 'Car'
        ),
        'hierarchical' => true, // same with posts
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        //'rewrite'=>array('slug'=>'cars'),
    );
    register_post_type('cars', $args);
}
add_action('init', 'my_first_post_type');



function my_first_taxonomy()
{
    $args = array(
        'labels' => array(
            'name' => 'Brands',
            'singular_name' => 'Brand'
        ),
        'public' => true,
        'hierarchical' => false, // true => like categories
    );
    register_taxonomy('brands', array('cars'), $args);
}

add_action('init', 'my_first_taxonomy');


// for handling ajax post
add_action('wp_ajax_enquiry', 'enquiry_form');
add_action('wp_ajax_nopriv_enquiry', 'enquiry_form');
function enquiry_form()
{

    if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
        wp_send_json_error('Nonce is incorrect ', 401);
        die();
    }
    $form_data = [];

    //convert the serialise to array php
    wp_parse_str($_POST['enquiry'], $form_data);
    // grub the hosting data
    //$data = json_encode($_POST);
    $admin_email = get_option('admin_email');

    // Email headers
    $headers[] = 'Content-Type: text/html;charset=UTF-8';
    $headers[] = 'From: My WebSite <' . $admin_email . '>';
    $headers[] = 'Reply-to: ' . $form_data['email'];
    //$headers[] = 'BCC: ' . $form_data['email'];
    // who are we sending the email to?
    $send_to = $admin_email;

    // subjet
    $subject = "Enquiry Form " . $form_data['fname'] . ' ' . $form_data['lname'];
    // Message
    $message = '';
    foreach ($form_data as $index => $field) {
        $message .= '<strong>' . $index . '</strong>: ' . $field . '<br/>';
    }

    try {
        if (wp_mail($send_to, $subject, $message, $headers)) {
            wp_send_json_success('Email sent !');
        } else {
            wp_send_json_error('Email Error !');
        }
    } catch (Exception $e) {
        wp_send_json_error($e->getMessage());
    }

    wp_send_json_success($form_data['fname']);
}

//

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');
