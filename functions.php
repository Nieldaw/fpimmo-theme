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
    wp_enqueue_style('Magnific', 'https://cdn.jsdelivr.net/npm/magnific-popup@1.2.0/dist/magnific-popup.min.css', '1.2.0', );


    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', [], '3.7.1');
    wp_enqueue_script('Magnific', 'https://cdn.jsdelivr.net/npm/magnific-popup@1.2.0/dist/jquery.magnific-popup.min.js', [], '1.2.0');
    wp_enqueue_script('child-js', get_stylesheet_directory_uri() . '/dist/js/main.js', ['jquery'], '1.0.0');
}, 100);

function fpimmo_scripts() {
  // ... vos scripts existants
  
  wp_enqueue_script('mobile-menu', get_template_directory_uri() . '/js/mobile-menu.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'fpimmo_scripts');
