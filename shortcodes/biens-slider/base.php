<?php

// If this file is called directly, abort.
defined('WPINC') || wp_die();

$block_name = basename(__DIR__);

$query_args = [
    // 'fields' => 'ids',
    'post_type' => 'bien',
    'post_status' => 'publish',
    'public' => true,
    'numberposts' => -1,
];
$result = get_posts($query_args);
set_query_var('items', $result);
get_template_part('/shortcodes/' . basename(__DIR__) . '/content');
