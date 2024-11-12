 
/**
 * File: /dam-slideshow/dam-slideshow.php
 */
<?php
/**
 * Plugin Name: Dam Slideshow
 * Description: A simple slideshow plugin with heading, paragraph, button, and background image
 * Version: 1.0.0
 * Author: Your Name
 * Text Domain: dam-slideshow
 * Domain Path: /languages
 * License: GPL v2 or later
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Currently plugin version.
 */
define('DAM_SLIDESHOW_VERSION', '1.0.0');
define('DAM_SLIDESHOW_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('DAM_SLIDESHOW_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Include required files
 */
require_once DAM_SLIDESHOW_PLUGIN_PATH . 'includes/class-dam-slideshow.php';
require_once DAM_SLIDESHOW_PLUGIN_PATH . 'includes/class-dam-slideshow-loader.php';
require_once DAM_SLIDESHOW_PLUGIN_PATH . 'includes/class-dam-slideshow-i18n.php';

/**
 * Begin execution of the plugin
 */
function run_dam_slideshow() {
    $plugin = new Dam_Slideshow();
    $plugin->run();
}
run_dam_slideshow();

/**
 * File: /dam-slideshow/uninstall.php
 */
<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

delete_option('dam_slideshow_options');

/**
 * File: /dam-slideshow/includes/class-dam-slideshow.php
 */
<?php
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
        $this->loader->add_action('init', $plugin_admin, 'register_gutenberg_block');
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

/**
 * File: /dam-slideshow/includes/class-dam-slideshow-loader.php
 */
<?php
class Dam_Slideshow_Loader {
    protected $actions;
    protected $filters;

    public function __construct() {
        $this->actions = array();
        $this->filters = array();
    }

    public function add_action($hook, $component, $callback, $priority = 10, $accepted_args = 1) {
        $this->actions = $this->add($this->actions, $hook, $component, $callback, $priority, $accepted_args);
    }

    public function add_filter($hook, $component, $callback, $priority = 10, $accepted_args = 1) {
        $this->filters = $this->add($this->filters, $hook, $component, $callback, $priority, $accepted_args);
    }

    private function add($hooks, $hook, $component, $callback, $priority, $accepted_args) {
        $hooks[] = array(
            'hook' => $hook,
            'component' => $component,
            'callback' => $callback,
            'priority' => $priority,
            'accepted_args' => $accepted_args
        );
        return $hooks;
    }

    public function run() {
        foreach ($this->filters as $hook) {
            add_filter($hook['hook'], array($hook['component'], $hook['callback']), $hook['priority'], $hook['accepted_args']);
        }
        foreach ($this->actions as $hook) {
            add_action($hook['hook'], array($hook['component'], $hook['callback']), $hook['priority'], $hook['accepted_args']);
        }
    }
}

/**
 * File: /dam-slideshow/includes/class-dam-slideshow-i18n.php
 */
<?php
class Dam_Slideshow_i18n {
    public function load_plugin_textdomain() {
        load_plugin_textdomain(
            'dam-slideshow',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }
}