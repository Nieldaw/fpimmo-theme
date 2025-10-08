<?php

// If this file is called directly, abort.
defined('WPINC') || wp_die();

// The shortcode
// -----------------------------------------------------------------------------
if (defined('WPB_VC_VERSION') && (is_admin() || filter_input(INPUT_GET, 'vc_editable') == true)) {
    add_action('vc_before_init', function () {
        vc_map([
            'name' => __("Biens Slider", 'vnv'),
            'category' => __('FPIMMO', 'vnv'),
            'base' => basename(__DIR__),
            'params' => [
                [
                    'param_name' => basename(__DIR__) . '_limit',
                    'group' => __('Main informations', 'vnv'),
                    'heading' => __('Max', 'app'),
                    'description' => __('Use -1 for no limitation'),
                    'type' => 'textfield',
                    'value' => -1,
                ],
                [
                    'param_name' => basename(__DIR__) . '_autostart',
                    'group' => __('Main informations', 'vnv'),
                    'heading' => __('Autostart', 'app'),
                    'type' => 'checkbox',
                    'value' => true,
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
