 /**
 * File: /dam-slideshow/public/js/dam-slideshow-public.js
 */
(function($) {
    'use strict';

    $(document).ready(function() {
        const slideshows = document.querySelectorAll('.dam-slideshow');
        
        slideshows.forEach(slideshow => {
            new Swiper(slideshow, {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                }
            });
        });
    });
})(jQuery);
