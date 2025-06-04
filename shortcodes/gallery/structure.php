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
            'name' => __("Gallery", 'vnv'),
            'category' => __('FPIMMO', 'vnv'),
            'base' => basename(__DIR__),
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
