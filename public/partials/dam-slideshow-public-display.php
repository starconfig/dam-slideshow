<?php
 /**
 * File: /dam-slideshow/public/partials/dam-slideshow-public-display.php
 */

<div class="dam-slideshow swiper">
    <div class="swiper-wrapper">
        <?php foreach ($attributes['slides'] as $slide): ?>
            <div class="swiper-slide" style="background-image: url(<?php echo esc_url($slide['backgroundImage']); ?>)">
                <div class="slide-content">
                    <h1><?php echo esc_html($slide['heading']); ?></h1>
                    <p><?php echo esc_html($slide['paragraph']); ?></p>
                    <?php if (!empty($slide['buttonText']) && !empty($slide['buttonUrl'])): ?>
                        <a href="<?php echo esc_url($slide['buttonUrl']); ?>" class="slide-button">
                            <?php echo esc_html($slide['buttonText']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
