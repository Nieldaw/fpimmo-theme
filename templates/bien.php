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
                    
                    <div class="prop1">
                        <?= $fields['pieces'] ?> pièces
                    </div>
                    <div class="prop2">
                        <?= $fields['chambres'] ?> chambre
                    </div>
                    <div class="prop3">
                        <?= $fields['surface'] ?> m2
                    </div>  
                </div>
                <div class="price">
                    CHF <?= $fields['prix'] ?> .-
                </div>
            </div>
            
        </div>
        <div class="contact">
            Contact
             
    
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

<div class="taxo">
            <?php var_dump(get_the_terms($post_id, 'features')); ?>
        </div>
        <h1>dssss</h1>
        <div class="taxo">
            <?php var_dump(get_the_terms($post_id, 'bien-type')); ?>
            monicon <?php var_dump($fields['image_1']); ?>
        </div>