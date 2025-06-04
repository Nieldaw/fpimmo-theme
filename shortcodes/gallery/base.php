<?php

// If this file is called directly, abort.
defined('WPINC') || wp_die();

$block_name = basename(__DIR__);


//query
$result = get_field('galerie', get_the_id());
// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// exit;


set_query_var('items', $result);
get_template_part('/shortcodes/' . basename(__DIR__) . '/content');
