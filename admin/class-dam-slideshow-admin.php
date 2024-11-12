 
/**
 * File: /dam-slideshow/admin/class-dam-slideshow-admin.php
 */
<?php
class Dam_Slideshow_Admin {
    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles() {
        wp_enqueue_style(
            $this->plugin_name,
            plugin_dir_url(__FILE__) . 'css/dam-slideshow-admin.css',
            array(),
            $this->version
        );
    }

    public function enqueue_scripts() {
        wp_enqueue_script(
            $this->plugin_name,
            plugin_dir_url(__FILE__) . 'js/dam-slideshow-admin.js',
            array('jquery'),
            $this->version,
            true
        );
    }

    public function register_gutenberg_block() {
        wp_register_script(
            'dam-slideshow-block',
            plugin_dir_url(__FILE__) . 'js/dam-slideshow-block.js',
            array('wp-blocks', 'wp-element', 'wp-editor')
        );

        register_block_type('dam-slideshow/slide', array(
            'editor_script' => 'dam-slideshow-block',
            'render_callback' => array($this, 'render_slideshow')
        ));
    }

    public function render_slideshow($attributes) {
        ob_start();
        include plugin_dir_path(__FILE__) . '../public/partials/dam-slideshow-public-display.php';
        return ob_get_clean();
    }
}

/**
 * File: /dam-slideshow/admin/js/dam-slideshow-admin.js
 */
(function($) {
    'use strict';

    const { registerBlockType } = wp.blocks;
    const { InspectorControls, MediaUpload } = wp.blockEditor;
    const { PanelBody, TextControl, Button } = wp.components;

    registerBlockType('dam-slideshow/slide', {
        title: 'Dam Slideshow',
        icon: 'images-alt2',
        category: 'common',
        attributes: {
            slides: {
                type: 'array',
                default: []
            }
        },

        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { slides } = attributes;

            function addSlide() {
                const newSlides = [...slides, {
                    heading: '',
                    paragraph: '',
                    buttonText: '',
                    buttonUrl: '',
                    backgroundImage: ''
                }];
                setAttributes({ slides: newSlides });
            }

            return (
                <div className="dam-slideshow-editor">
                    {/* Slideshow editor UI */}
                </div>
            );
        },

        save: function() {
            return null; // Use PHP render callback
        }
    });
})(jQuery);

/**
 * File: /dam-slideshow/admin/css/dam-slideshow-admin.css
 */
.dam-slideshow-editor {
    padding: 20px;
    background: #fff;
    border: 1px solid #ddd;
}

.slide-editor {
    margin-bottom: 20px;
    padding: 15px;
    border: 1px solid #e2e4e7;
}

.components-button {
    margin: 5px;
}