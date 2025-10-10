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
            
        $bienTypesValue = [__('Toutes', 'fpimmo') => '-1'];
        foreach ($bienTypes as $cat) {
            $bienTypesValue[$cat->name] = $cat->term_id;
        }

        $eventExcludeCategoriesValue = [__('Aucune', 'fpimmo') => '-1'];
        foreach ($bienTypes as $cat) {
            $eventExcludeCategoriesValue[$cat->name] = $cat->term_id;
        }

        vc_map([
            'name' => __("Bien grid", 'fpimmo'),
            'category' => __('FPIMMO', 'fpimmo'),
            'base' => basename(__DIR__),
            'params' => [
                [
                    'param_name' => basename(__DIR__) . '_type',
                    'group' => __('Main informations', 'fpimmo'),
                    'heading' => __('Types', 'fpimmo'),
                    'type' => 'dropdown_multi',
                    'value' => $bienTypesValue,
                ],
                [
                    'param_name' => basename(__DIR__) . '_type_exclude',
                    'group' => __('Main informations', 'fpimmo'),
                    'heading' => __('Exclude type', 'fpimmo'),
                    'type' => 'dropdown_multi',
                    'value' => $eventExcludeCategoriesValue,
                ],
                [
                    'param_name' => basename(__DIR__) . '_limit',
                    'group' => __('Main informations', 'fpimmo'),
                    'heading' => __('Max', 'fpimmo'),
                    'description' => __('Use -1 for no limitation'),
                    'type' => 'textfield',
                    'value' => -1,
                ],
                [
                    'param_name' => basename(__DIR__) . '_item_by_row',
                    'group' => __('Main informations', 'fpimmo'),
                    'heading' => __('Item by row', 'fpimmo'),
                    'type' => 'textfield',
                    'value' => 3,
                ],
                [
                    'param_name' => basename(__DIR__) . '_enable_search',
                    'group' => __('Search', 'fpimmo'),
                    'heading' => __('Enable search ?', 'fpimmo'),
                    'type' => 'checkbox',
                    'value' => true,
                ],
                [
                    'param_name' => basename(__DIR__) . '_enable_search_text',
                    'group' => __('Search', 'fpimmo'),
                    'heading' => __('By text', 'fpimmo'),
                    'type' => 'checkbox',
                    'value' => false,
                    "dependency" => array(
                        "element" => basename(__DIR__) . '_enable_search',
                        "value" => "true"
                    )
                ],
                [
                    'param_name' => basename(__DIR__) . '_enable_search_type',
                    'group' => __('Search', 'fpimmo'),
                    'heading' => __('By type', 'fpimmo'),
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
