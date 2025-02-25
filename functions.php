<?php

// If this file is called directly, abort.
defined('WPINC') || wp_die();


// Shortcodes
foreach (glob(get_stylesheet_directory() . '/shortcodes/*/structure.php') as $filename) {
    require_once $filename;
}

// Salient styles
// -----------------------------------------------------------------------------
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('fpimmo-style', get_stylesheet_directory_uri() . '/dist/css/main.css', '', );


    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', [], '3.7.1');
    wp_enqueue_script('child-js', get_stylesheet_directory_uri() . '/dist/js/main.js', ['jquery'], '1.0.0');
}, 100);


