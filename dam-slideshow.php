<?php
/**
 * Plugin Name: Dam Slideshow
 * Plugin URI: https://github.com/starconfig/dam-slideshow
 * Description: A simple slideshow plugin with heading, paragraph, button and background image
 * Version: 1.0.0
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * Author: Star Config
 * Author URI: https://github.com/starconfig
 * Text Domain: dam-slideshow
 * Domain Path: /languages
 * License: GPL v2 or later
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('DAM_SLIDESHOW_VERSION', '1.0.0');
define('DAM_SLIDESHOW_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('DAM_SLIDESHOW_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * The code that runs during plugin activation.
 */
function activate_dam_slideshow() {
    require_once DAM_SLIDESHOW_PLUGIN_DIR . 'includes/class-dam-slideshow-activator.php';
    Dam_Slideshow_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_dam_slideshow() {
    require_once DAM_SLIDESHOW_PLUGIN_DIR . 'includes/class-dam-slideshow-deactivator.php';
    Dam_Slideshow_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_dam_slideshow');
register_deactivation_hook(__FILE__, 'deactivate_dam_slideshow');

/**
 * The core plugin class
 */
require DAM_SLIDESHOW_PLUGIN_DIR . 'includes/class-dam-slideshow.php';

/**
 * Begins execution of the plugin.
 */
function run_dam_slideshow() {
    $plugin = new Dam_Slideshow();
    $plugin->run();
}
run_dam_slideshow();
