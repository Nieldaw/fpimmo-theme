<?php
use site\utils\String_Parser as String_Parser;

// If this file is called directly, abort.
defined('WPINC') || wp_die();

$post_id = $post->ID;
$fields = get_fields($post_id);
$terms = get_terms('bien-type', $post_id);

?>
<div class="single-bien">
    <div class="gallery">
        <div class="mainImg">
            <div class="img">b</div>
        </div>
        <div class="imgs">
            <div class="img">a</div>
            <div class="img">a</div>
        </div>
    </div>
</div>
