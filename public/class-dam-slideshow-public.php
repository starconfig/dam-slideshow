 
/**
 * File: /dam-slideshow/public/class-dam-slideshow-public.php
 */
<?php
class Dam_Slideshow_Public {
    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles() {
        wp_enqueue_style(
            'swiper',
            'https://unpkg.com/swiper@8/swiper-bundle.min.css',
            array(),
            '8.0.0'
        );

        wp_enqueue_style(
            $this->plugin_name,
            plugin_dir_url(__FILE__) . 'css/dam-slideshow-public.css',
            array('swiper'),
            $this->version
        );
    }

    public function enqueue_scripts() {
        wp_enqueue_script(
            'swiper',
            'https://unpkg.com/swiper@8/swiper-bundle.min.js',
            array(),
            '8.0.0',
            true
        );

        wp_enqueue_script(
            $this->plugin_name,
            plugin_dir_url(__FILE__) . 'js/dam-slideshow-public.js',
            array('jquery', 'swiper'),
            $this->version,
            true
        );
    }
}