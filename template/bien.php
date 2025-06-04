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
            <div class="img" style="background-image: url('<?= get_the_post_thumbnail_url($post_id); ?>');"></div>
        </div>
        <div class="imgs">
            <div class="img" style="background-image: url('<?= get_field('image_1', $post_id)['url']; ?>');"></div>
            <div class="img" style="background-image: url('<?= get_field('image_2', $post_id)['url']; ?>');"></div>
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
                            <?= $fields['pieces'] ?> pièces
                        </div>
                    </div>
                    <div class="prop">
                        <img src="https://wp.fpimmo.ch/wp-content/uploads/2025/02/bedroom.png" alt="" />
                        <div class="value">
                            <?= $fields['chambres'] ?> chambre
                        </div>
                    </div>
                    <div class="prop">
                        <img src="https://wp.fpimmo.ch/wp-content/uploads/2025/02/surface.png" alt="" />
                        <div class="value">
                            <?= $fields['surface_habitable'] ?> m2
                        </div>
                    </div>  
                </div>
                <div class="price">
                    CHF <?= $fields['prix'] ?> .-
                </div>
            </div>
            <div class="features"> 
                <h2>CARACTERISTIQUES PRINCIPALES</h2>
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
                                <?= $fields['surface_habitable'] ?>m2
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
    
                    <div class="feature">a</div>
                    <div class="feature">a</div>
                </div>
                <!-- CARACTERISTIQUES PRINCIPALES
                <div class="colonnes">
                    <div class="colonne">
                        <div class="infos">
                            Type :
                            <div class="info">
                                <?= $feature->name ?>
                            </div>
                        </div>
                        <div class="infos">
                            Chambre(s)
                            <div class="info">
                                <?= $fields['chambres'] ?>
                            </div>
                        </div>
                        <div class="infos">
                            Terrasse (s)
                            <div class="info">
                                <?= $feature->name ?>
                            </div>
                        </div>
                        <div class="infos">
                            Surface pondérée
                            <div class="info">
                                <?= $feature->name ?>
                            </div>
                        </div>
                    </div>
                    <div class="colonne">
                        <div class="infos">
                            Prix de vente :
                            <div class="info">
                                CHF <?= $fields['prix'] ?> .-
                            </div>
                        </div>
                        <div class="infos">
                            Salle de bain(s):
                            <div class="info">
                                <?= $feature->name ?>
                            </div>
                        </div>
                        <div class="infos">
                            Surface habitable :
                            <div class="info">
                                <?= $feature->name ?>
                            </div>
                        </div>
                        <div class="infos">
                            Disponibilité :
                            <div class="info">
                                <?= $fields['prix'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="colonne">
                        <?php if($feature->name): ?>
                            <div class="infos">
                            Type :
                            <div class="info">
                                <?= $feature->name ?>
                            </div>
                            </div>
                        <?php endif; ?>
                        <div class="infos">
                            Chambre(s)
                            <div class="info">
                                <?= $fields['chambres'] ?>
                            </div>
                        </div>
                        <div class="infos">
                            Terrasse (s)
                            <div class="info">
                                <?= $feature->name ?>
                            </div>
                        </div>
                        <div class="infos">
                            Surface pondérée
                            <div class="info">
                                <?= $feature->name ?>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="caracteristiques"> 
                CARACTERISTIQUES
                <div class="caracteristique">
                    <?php foreach(get_the_terms($post_id, 'features') as $feature): ?>
                        <div class="feature">
                            <?= $feature->name ?>
                        </div>
                    <?php endforeach; ?>
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
