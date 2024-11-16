 <?php
/**
 * Plugin Name: Dam Slideshow
 * Description: A simple slideshow plugin with heading, paragraph, button, and background image
 * Version: 1.0.0
 * Author: Your Name
 * Text Domain: dam-slideshow
 * Domain Path: /languages
 * License: GPL v2 or later
 /**
 * File: /dam-slideshow/dam-slideshow.php
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
