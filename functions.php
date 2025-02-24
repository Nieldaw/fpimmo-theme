<?php

// If this file is called directly, abort.
defined('WPINC') || wp_die();


// Salient styles
// -----------------------------------------------------------------------------
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('fpimmo-style', get_stylesheet_directory_uri() . '/css/main.css', '', );


    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', [], '3.7.1');
}, 100);
