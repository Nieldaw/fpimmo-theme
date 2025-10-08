<?php
// If this file is called directly, abort.
defined('WPINC') || wp_die();
?>
<div class="testimonials-slider">
    <div class="testimonials-flickity-wrapper">
        <?php foreach ($items as $item) : ?>
            <div class="testimonial-item">
                <div class="testimonial-wrapper">
                    <div class="title"><?= get_field('username', $item->ID) ?></div>
                    <div class="content">
                        <?= get_field('comment', $item->ID) ?>
                    </div>
                    <div class="score">
                        <?php
                        $score = (float) get_field('score', $item->ID); // ex: 3.5
                        $fullStars = floor($score);
                        $halfStar  = ($score - $fullStars >= 0.5) ? 1 : 0;
                        $emptyStars = 5 - $fullStars - $halfStar;

                        // étoiles pleines
                        for ($i = 0; $i < $fullStars; $i++) {
                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                        }

                        // demi étoile
                        if ($halfStar) {
                            echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
                        }

                        // étoiles vides
                        for ($i = 0; $i < $emptyStars; $i++) {
                            echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    jQuery(function ($) {
       
    });
</script>