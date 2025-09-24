<?php
use site\utils\String_Parser as String_Parser;

// If this file is called directly, abort.
defined('WPINC') || wp_die();

?>
<div class="bien-grid">

    
    <?php if ($atts["bien-grid_enable_search"] == 'true'): ?>
        <!--
        <div class="search">
            <?php if ($atts["bien-grid_enable_search_text"] == 'true'): ?>
                <input id="searchText" placeholder="<?= __('Recherche', 'app') ?>" />
            <?php endif; ?>
            <?php if ($atts["bien-grid_enable_search_type"] == 'true'): ?>
                <select id="searchType">
                    <option value="all"><?= __('Toutes les types', 'app'); ?></option>
                    <option value="bien"><?= __('Evénement', 'app'); ?></option>
                    <option value="training"><?= __('Formation', 'app'); ?></option>

                </select>
            <?php endif; ?>
        </div>
            -->
    <?php endif; ?>




    <div class="wrapper" style="grid-template-columns: repeat(<?= $atts["bien-grid_item_by_row"] ?>, 1fr);">
        <?php foreach ($items as $itemId):
            $itemTerms = get_the_terms($itemId, 'bien-type');
   
            $itemTermsString = ";";
            foreach ($itemTerms as $term) {
                $itemTermsString .= $term->term_id . ';';
            }
            ?>
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
                    <div class="props">
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



    <div class="empty" style="<?= count($items) > 0 ? 'display:none' : '' ?>">
        <?= count($items) > 0 ? __('Aucun résultat', 'app') : __('Aucun object pour le moment', 'app') ?>
    </div>
</div>

<script>
    jQuery(function ($) {
        const handleSearchChange = () => {
            const text = $('.bien-grid #searchText').val().toLowerCase();
            const type = $('.bien-grid #searchType').val();

            let empty = true;

            $('.bien-grid .wrapper .item').each(function () {
                const itemTitle = $(this).data('title');
                const itemType = $(this).data('type');
                // Match conditions
                const matchesText = (text === undefined) || itemTitle.includes(text.toLowerCase());
                const matchesType = (type === undefined) || (type === 'all') || (itemType === type);

                if (matchesText && matchesType) {
                    empty = false;
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            if (empty) {
                $('.bien-grid .empty').show();
            }
            else {
                $('.bien-grid .empty').hide();
            }
        };

        // Bind the change bien for all the inputs
        $('.bien-grid #searchText').on('input', handleSearchChange);
        $('.bien-grid #searchType').change(handleSearchChange);
    });
</script>