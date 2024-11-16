<?php
/**
 * File: /dam-slideshow/includes/class-dam-slideshow.php
 */
if (!defined('ABSPATH')) {
    exit;
}

class Dam_Slideshow {
    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        $this->version = DAM_SLIDESHOW_VERSION;
        $this->plugin_name = 'dam-slideshow';
        
        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        // Include the loader class first
        require_once DAM_SLIDESHOW_PLUGIN_DIR . 'includes/class-dam-slideshow-loader.php';
        require_once DAM_SLIDESHOW_PLUGIN_DIR . 'includes/class-dam-slideshow-i18n.php';
        require_once DAM_SLIDESHOW_PLUGIN_DIR . 'admin/class-dam-slideshow-admin.php';
        require_once DAM_SLIDESHOW_PLUGIN_DIR . 'public/class-dam-slideshow-public.php';

        // Create new instance of loader
        $this->loader = new Dam_Slideshow_Loader();
    }

    private function set_locale() {
        $plugin_i18n = new Dam_Slideshow_i18n();
        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
    }

    private function define_admin_hooks() {
        $plugin_admin = new Dam_Slideshow_Admin($this->get_plugin_name(), $this->get_version());
        
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
    }

    private function define_public_hooks() {
        $plugin_public = new Dam_Slideshow_Public($this->get_plugin_name(), $this->get_version());
        
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_version() {
        return $this->version;
    }
}
