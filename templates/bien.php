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
            <div class="img" style="background-image: url('<?= get_the_post_thumbnail_url($post_id); ?>');">aa</div>
        </div>
        <div class="imgs">
            <div class="img" style="background-image: url('<?= get_field('image_1', $post_id)['url']; ?>');">a</div>
            <div class="img" style="background-image: url('<?= get_field('image_2', $post_id)['url']; ?>');">a</div>
        </div>
    </div>
    <div class="content">
        <div class="infos">
            <div class="bien-types">
                <?php foreach(get_the_terms($post_id, 'bien-type') as $feature): ?>
                    <div class="feature">
                        <?= $feature->name ?>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="ville">
                <?= $fields['city'] ?>
            </div>
            <div class="title">
                <h3><?= get_the_title($post_id); ?></h3>
                <div class="description">
                    <?= get_the_content($post_id); ?>
                </div>
            </div>
            <div class="composants">
                <div class="propriete">
                    <div class="prop prop1">
                        <img src="https://wp.fpimmo.ch/wp-content/uploads/2025/02/surface.png" alt="" />
                        <div class="value">
                            <?= $fields['pieces'] ?> pièces
                        </div>
                    </div>
                    <div class="prop prop2">
                        <img src="https://wp.fpimmo.ch/wp-content/uploads/2025/02/surface.png" alt="" />
                        <div class="value">
                            <?= $fields['chambres'] ?> chambre
                        </div>
                    </div>
                    <div class="prop prop3">
                        <img src="https://wp.fpimmo.ch/wp-content/uploads/2025/02/surface.png" alt="" />
                        <div class="value">
                            <?= $fields['surface'] ?> m2
                        </div>
                    </div>  
                </div>
                <div class="price">
                    CHF <?= $fields['prix'] ?> .-
                </div>
            </div>
        </div>
        <div class="contact">
            Contact

            <?= do_shortcode('[contact-form-7 id="1a4f0dc" title="Formulaire de contact 1"]'); ?>
        </div>

    </div>
    <div class="features"> 
        <?php foreach(get_the_terms($post_id, 'features') as $feature): ?>
            <div class="feature">
                <?= $feature->name ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>