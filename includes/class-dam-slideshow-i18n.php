 <?php
/**
 * File: /dam-slideshow/includes/class-dam-slideshow-i18n.php
 * 
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://example.com
 * @since      1.0.0
 * @package    Dam_Slideshow
 * @subpackage Dam_Slideshow/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Dam_Slideshow
 * @subpackage Dam_Slideshow/includes
 * @author     Your Name
 */
class Dam_Slideshow_i18n {

    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     * @return   void
     */
    public function load_plugin_textdomain() {
        load_plugin_textdomain(
            'dam-slideshow',                      // Text domain
            false,                                // Deprecated parameter, set to false
            dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'  // Relative path to the languages directory
        );
    }

    /**
     * Get translated string.
     *
     * Helper function to get translated strings throughout the plugin.
     *
     * @since    1.0.0
     * @param    string    $text       The text to translate
     * @param    string    $context    The context for the text (optional)
     * @return   string    Translated text
     */
    public static function get_string( $text, $context = '' ) {
        if ( empty( $context ) ) {
            return __( $text, 'dam-slideshow' );
        } else {
            return _x( $text, $context, 'dam-slideshow' );
        }
    }

    /**
     * Echo translated string.
     *
     * Helper function to echo translated strings throughout the plugin.
     *
     * @since    1.0.0
     * @param    string    $text       The text to translate
     * @param    string    $context    The context for the text (optional)
     * @return   void
     */
    public static function e_string( $text, $context = '' ) {
        if ( empty( $context ) ) {
            _e( $text, 'dam-slideshow' );
        } else {
            _ex( $text, $context, 'dam-slideshow' );
        }
    }

    /**
     * Register strings for translation.
     *
     * Register common strings used in the plugin for translation.
     *
     * @since    1.0.0
     * @return   void
     */
    public static function register_strings() {
        // Slideshow Settings
        __( 'Dam Slideshow Settings', 'dam-slideshow' );
        __( 'General Settings', 'dam-slideshow' );
        __( 'Slideshow Height', 'dam-slideshow' );
        __( 'Autoplay', 'dam-slideshow' );
        __( 'Autoplay Delay', 'dam-slideshow' );
        __( 'Navigation Arrows', 'dam-slideshow' );
        __( 'Pagination Dots', 'dam-slideshow' );

        // Slide Editor
        __( 'Add New Slide', 'dam-slideshow' );
        __( 'Edit Slide', 'dam-slideshow' );
        __( 'Remove Slide', 'dam-slideshow' );
        __( 'Slide Settings', 'dam-slideshow' );
        __( 'Heading', 'dam-slideshow' );
        __( 'Paragraph', 'dam-slideshow' );
        __( 'Button Text', 'dam-slideshow' );
        __( 'Button URL', 'dam-slideshow' );
        __( 'Background Image', 'dam-slideshow' );
        __( 'Select Background Image', 'dam-slideshow' );
        __( 'Change Background Image', 'dam-slideshow' );

        // Messages
        __( 'Slideshow updated successfully.', 'dam-slideshow' );
        __( 'Slideshow settings saved.', 'dam-slideshow' );
        __( 'Please select a background image.', 'dam-slideshow' );
        __( 'Please enter a heading for the slide.', 'dam-slideshow' );
    }

    /**
     * Get all registered strings.
     *
     * Helper function to get all registered strings for translation tools.
     *
     * @since    1.0.0
     * @return   array    Array of registered strings
     */
    public static function get_registered_strings() {
        return array(
            'settings' => array(
                'title' => self::get_string( 'Dam Slideshow Settings' ),
                'general' => self::get_string( 'General Settings' ),
                'height' => self::get_string( 'Slideshow Height' ),
                'autoplay' => self::get_string( 'Autoplay' ),
                'delay' => self::get_string( 'Autoplay Delay' ),
                'navigation' => self::get_string( 'Navigation Arrows' ),
                'pagination' => self::get_string( 'Pagination Dots' ),
            ),
            'editor' => array(
                'add_slide' => self::get_string( 'Add New Slide' ),
                'edit_slide' => self::get_string( 'Edit Slide' ),
                'remove_slide' => self::get_string( 'Remove Slide' ),
                'slide_settings' => self::get_string( 'Slide Settings' ),
                'heading' => self::get_string( 'Heading' ),
                'paragraph' => self::get_string( 'Paragraph' ),
                'button_text' => self::get_string( 'Button Text' ),
                'button_url' => self::get_string( 'Button URL' ),
                'bg_image' => self::get_string( 'Background Image' ),
                'select_image' => self::get_string( 'Select Background Image' ),
                'change_image' => self::get_string( 'Change Background Image' ),
            ),
            'messages' => array(
                'update_success' => self::get_string( 'Slideshow updated successfully.' ),
                'settings_saved' => self::get_string( 'Slideshow settings saved.' ),
                'select_image' => self::get_string( 'Please select a background image.' ),
                'enter_heading' => self::get_string( 'Please enter a heading for the slide.' ),
            ),
        );
    }
}
