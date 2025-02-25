<?php

// If this file is called directly, abort.
defined('WPINC') || wp_die();

$block_name = basename(__DIR__);

//get proprieties (props)
$atts = shortcode_atts([
    "{$block_name}_type" => -1,
    "{$block_name}_type_exclude" => -1,
    "{$block_name}_limit" => -1,
    "{$block_name}_item_by_row" => 3,
    "{$block_name}_enable_search" => true,
    "{$block_name}_enable_search_text" => false,
    "{$block_name}_enable_search_type" => false,
], $data);


$query_args = [
    'fields' => 'ids',
    'post_type' => 'bien',
    'post_status' => 'publish',
    'public' => true,
    'numberposts' => -1,
];

//filter by type if need
//TO TEST
if (intval($atts["{$block_name}_type"]) != -1) {
    $query_args['tax_query'] = array(
        array(
            'taxonomy' => 'bien-type',
            'field' => 'term_id',
            'terms' => array(intval($atts["{$block_name}_type"])),
            'operator' => 'IN',
        )
    );
}

//query
$result = get_posts($query_args);

//exclude
$items = [];
foreach ($result as $itemId) {
    if (intval($atts["{$block_name}_type_exclude"]) != -1) {
        $exclude_types = explode(',', $atts["{$block_name}_type_exclude"]);
        $item_types = wp_get_post_terms($itemId, 'bien-type', array('fields' => 'ids'));

        if (array_intersect($exclude_types, $item_types)) {
            continue;
        }
    }
    $items[] = $itemId;
}
//slice
if ($atts["{$block_name}_limit"] > 0) {
    $itemsToShow = array_slice($items, 0, intval($atts["{$block_name}_limit"]));
} else {
    $itemsToShow = $items;
}

$bienTypes = get_terms('bien-type');

//end of data aquisition


set_query_var('atts', $atts);
set_query_var('items', $itemsToShow);
set_query_var('bienTypes', $bienTypes);

get_template_part('/shortcodes/' . basename(__DIR__) . '/content');
