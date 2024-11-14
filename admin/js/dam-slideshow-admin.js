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
