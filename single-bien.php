<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

get_header();



// Main content loop.
if (have_posts()):
    while (have_posts()):

        the_post();
        get_template_part('/template/bien');

    endwhile;
endif;


get_footer(); ?>