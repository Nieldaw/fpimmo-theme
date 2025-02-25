<?php

// If this file is called directly, abort.
defined('WPINC') || wp_die();

// The shortcode
// -----------------------------------------------------------------------------
if (defined('WPB_VC_VERSION') && (is_admin() || filter_input(INPUT_GET, 'vc_editable') == true)) {



    add_action('vc_before_init', function () {
        $bienTypes = get_terms(
            array(
                'taxonomy'   => 'bien-type',
                'hide_empty' => false,
            )
        );
        $bienTypesValue = [__('Toutes', 'app') => "-1"];
        foreach ($bienTypes as $cat) {
            $bienTypesValue[$cat->name] = $cat->term_id;
        }

        $eventExcludeCategoriesValue = [__('Aucune', 'app') => "-1"];
        foreach ($bienTypes as $cat) {
            $eventExcludeCategoriesValue[$cat->name] = $cat->term_id;
        }

        vc_map([
            'name' => __("Event grid", 'vnv'),
            'category' => __('FPIMMO', 'vnv'),
            'base' => basename(__DIR__),
            'params' => [
                [
                    'param_name' => basename(__DIR__) . '_type',
                    'group' => __('Main informations', 'vnv'),
                    'heading' => __('Types', 'app'),
                    'type' => 'dropdown_multi',
                    'value' => $bienTypesValue,
                ],
                [
                    'param_name' => basename(__DIR__) . '_type_exclude',
                    'group' => __('Main informations', 'vnv'),
                    'heading' => __('Exclude type', 'app'),
                    'type' => 'dropdown_multi',
                    'value' => $eventExcludeCategoriesValue,
                ],
                [
                    'param_name' => basename(__DIR__) . '_limit',
                    'group' => __('Main informations', 'vnv'),
                    'heading' => __('Max', 'app'),
                    'description' => __('Use -1 for no limitation'),
                    'type' => 'textfield',
                    'value' => -1,
                ],
                [
                    'param_name' => basename(__DIR__) . '_item_by_row',
                    'group' => __('Main informations', 'vnv'),
                    'heading' => __('Item by row', 'app'),
                    'type' => 'textfield',
                    'value' => 3,
                ],
                [
                    'param_name' => basename(__DIR__) . '_enable_search',
                    'group' => __('Search', 'vnv'),
                    'heading' => __('Enable search ?', 'app'),
                    'type' => 'checkbox',
                    'value' => true,
                ],
                [
                    'param_name' => basename(__DIR__) . '_enable_search_text',
                    'group' => __('Search', 'vnv'),
                    'heading' => __('By text', 'app'),
                    'type' => 'checkbox',
                    'value' => false,
                    "dependency" => array(
                        "element" => basename(__DIR__) . '_enable_search',
                        "value" => "true"
                    )
                ],
                [
                    'param_name' => basename(__DIR__) . '_enable_search_type',
                    'group' => __('Search', 'vnv'),
                    'heading' => __('By type', 'app'),
                    'type' => 'checkbox',
                    'value' => false,
                    "dependency" => array(
                        "element" => basename(__DIR__) . '_enable_search',
                        "value" => "true"
                    )
                ]
            ]
        ]);
    });
}

// Shortcode display
// -----------------------------------------------------------------------------
add_shortcode(basename(__DIR__), function ($atts) {
    set_query_var('data', $atts);

    ob_start();
    get_template_part('shortcodes/' . basename(__DIR__) . '/base');
    return ob_get_clean();
});
