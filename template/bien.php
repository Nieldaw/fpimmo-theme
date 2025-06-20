<?php
use site\utils\String_Parser as String_Parser;

// If this file is called directly, abort.
defined('WPINC') || wp_die();

$post_id = $post->ID;
$fields = get_fields($post_id);
$terms = get_terms('bien-type', $post_id);

?>
<div class="single-bien-style">
    <div class="gallery">
        <div class="mainImg">
            <a class="img" href="<?= get_the_post_thumbnail_url($post_id); ?>" style="background-image: url('<?= get_the_post_thumbnail_url($post_id); ?>');"></a>
        </div>
        <div class="imgs">
            <a class="img" href="<?= get_field('image_1', $post_id)['url']; ?>" style="background-image: url('<?= get_field('image_1', $post_id)['url']; ?>');"></a>
            <a class="img" href="<?= get_field('image_2', $post_id)['url']; ?>" style="background-image: url('<?= get_field('image_2', $post_id)['url']; ?>');"></a>

            <?php foreach(get_field('galerie', $post_id) as $image): ?>
                <a class="img" href="<?= $image['url']; ?>" style="background-image: url('<?= $image['url']; ?>');"></a>
            <?php endforeach; ?>
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
                    <div class="prop">
                        <img src="https://wp.fpimmo.ch/wp-content/uploads/2025/02/room.png" alt="" />
                        <div class="value">
                            <?= if(isset($fields['pieces'])): ?>
                                <?= $fields['pieces'] ?> pièces
                            <? endif; ?>
                        </div>
                    </div>
                    <div class="prop">
                        <img src="https://wp.fpimmo.ch/wp-content/uploads/2025/02/bedroom.png" alt="" />
                        <div class="value">
                            <?= if(isset($fields['chambres'])): ?>
                                <?= $fields['chambres'] ?> chambre
                            <? endif; ?>
                        </div>
                    </div>
                    <div class="prop">
                        <img src="https://wp.fpimmo.ch/wp-content/uploads/2025/02/surface.png" alt="" />
                        <div class="value">
                            <?= if(isset($fields['surface_habitable'])): ?>
                                <?= $fields['surface_habitable'] ?> m²
                            <? endif; ?>
                        </div>
                    </div>  
                </div>
                <div class="price">
                    CHF <?= $fields['prix'] ?> .-
                </div>
            </div>
            <div class="features"> 
                <h2>CARACTERISTIQUES</h2>
                <div class="featuresWrapper">
                    <div class="feature">
                        Type :
                            <div class="value">
                                <?= $feature->name ?>
                            </div>
                    </div>
                    <?php if(isset($fields['surface_habitable']) && $fields['surface_habitable'] != "") : ?>
                        <div class="feature">
                            Surface habitable
                            <div class="value">
                                <?= $fields['surface_habitable'] ?> m²
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($fields['pieces']) && $fields['pieces'] != "") : ?>
                        <div class="feature">
                            Pièces(s)
                            <div class="value">
                                <?= $fields['pieces'] ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($fields['annee_de_construction']) && $fields['annee_de_construction'] != "") : ?>
                        <div class="feature">
                            Année de construction
                            <div class="value">
                                <?= $fields['annee_de_construction'] ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($fields['chambres']) && $fields['chambres'] != "") : ?>
                        <div class="feature">
                            Chambre(s)
                            <div class="value">
                                <?= $fields['chambres'] ?>
                            </div>
                        </div>
                    <?php endif; ?>
                 
                    <?php if(isset($fields['salle-de-bain']) && $fields['salle-de-bain'] != "") : ?>
                        <div class="feature">
                            Salle(s) de bain
                            <div class="value">
                                <?= $fields['salle-de-bain'] ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($fields['surface_du_terrain']) && $fields['surface_du_terrain'] != "") : ?>
                        <div class="feature">
                            Surface du terrain
                            <div class="value">
                                <?= $fields['surface_du_terrain'] ?> m²
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($fields['etages']) && $fields['etages'] != "") : ?>
                        <div class="feature">
                            Nombre d'étages
                            <div class="value">
                                <?= $fields['etages'] ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($fields['derniere_renovation']) && $fields['derniere_renovation'] != "") : ?>
                        <div class="feature">
                            Dernière rénovation
                            <div class="value">
                                <?= $fields['derniere_renovation'] ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div>
                <?= do_shortcode('[gallery ]'); ?>
            </div>
        </div>
        <div class="contact">
            <?= do_shortcode('[contact-form-7 id="1a4f0dc" title="Formulaire de contact 1"]'); ?>
        </div>

    </div>
</div>
<style>
.single-bien-style > .gallery > .imgs .img:nth-child(n+3) {
    display: none;
}
/* .mfp-container button {
    display: none!important;
} */
</style>
<script>
   jQuery(document).ready(function ($) {
        $('.gallery').magnificPopup({
            type: 'image',
            delegate: 'a',
            gallery: {
                enabled: true
            },
        });
    });
</script>