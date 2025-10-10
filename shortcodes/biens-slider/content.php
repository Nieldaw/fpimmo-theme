<?php
// If this file is called directly, abort.
defined('WPINC') || wp_die();
// var_dump($items);

?>

<div class="biens-slider">
    <div class="biens-flickity-wrapper">
        <?php foreach ($items as $itemId) : 
            $itemTerms = get_the_terms($itemId, 'bien-type');
   
            $itemTermsString = ";";
            foreach ($itemTerms as $term) {
                $itemTermsString .= $term->term_id . ';';
            } ?>
            <a class="item" href="<?= get_the_permalink($itemId); ?>" data-title="<?= strtolower(get_the_title($itemId)) ?>" data-type="<?= $itemTermsString ?>">
                <div class="img" style="background-image: url('<?= get_the_post_thumbnail_url($itemId) ?>')">
                    <div class="vente">
                        <?= get_field('types_de_vente', $itemId); ?>
                        
                    </div>
                </div>
                <div class="content">
                    <div class="types">
                        <?php foreach ($itemTerms as $term): ?>
                            <div class="type">
                                <?= $term->name ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="ville">
                        <?= get_field('city', $itemId); ?>
                    </div>
                    <div class="price">
                        CHF <?= get_field('prix', $itemId); ?> .-
                    </div>
                    <div class="props1">
                        <div class="prop">
                            <img src="https://wp.fpimmo.ch/wp-content/uploads/2025/02/room.png" alt="" />
                            <div class="value">
                                <?= get_field('pieces', $itemId); ?> pièces
                            </div>
                        </div>
                        <div class="prop">
                            <img src="https://wp.fpimmo.ch/wp-content/uploads/2025/02/bedroom.png" alt="" />
                            <div class="value">
                                <?= get_field('chambres', $itemId); ?> chambre(s)
                            </div>
                        </div>
                    </div>
                    <div class="props2">
                        <div class="prop">
                            <img src="https://wp.fpimmo.ch/wp-content/uploads/2025/02/surface.png" alt="" />
                            <div class="value">
                                <?= get_field('surface_habitable', $itemId); ?> m2
                            </div>
                        </div>
                    </div>                    
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>