<?php
use site\utils\String_Parser as String_Parser;

// If this file is called directly, abort.
defined('WPINC') || wp_die();

?>
<div class="bien-gallery">
    <div class="wrapper galleryWrapper" style="grid-template-columns: 3, 1fr);">
        <?php foreach ($items as $item):?>
            <div class="item">
                <div class="img" style="background-image: url('<?= $item['url'] ?>')">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    jQuery(function ($) {
       
    });
</script>