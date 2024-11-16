<?php
 
/**
 * File: /dam-slideshow/uninstall.php
 */
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

delete_option('dam_slideshow_options');