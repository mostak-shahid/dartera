<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'mos_theme_options');
function mos_theme_options() {
    $basic_options_container = Container::make('theme_options', __('Theme Options'))
    ->set_icon('dashicons-admin-customizer')
    ->add_fields(array(
        Field::make('image', 'mos-logo', __('Logo')),
        Field::make('header_scripts', 'mos_header_script', __('Header Script')),
        Field::make('footer_scripts', 'mos_footer_script', __('Footer Script')),
    ));

    Container::make('theme_options', __('Color scheme'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make( 'color', 'mos_body_bg', 'Body Background' )
        //->set_palette( array( '#FF0000', '#00FF00', '#0000FF' ))
        ->set_alpha_enabled( true )
        ->set_help_text( 'Pick the color for body background, by default it is set to #ffffff. You can use this color in your css with var(--mos-body-bg)' )
        ->set_default_value( '#ffffff' ),
        
        Field::make( 'color', 'mos_primary_color', 'Primary Color' )
        ->set_help_text( 'Pick the primary color, by default it is set to #00f5eb. You can use this color in your css with var(--mos-primary-color)' )
        ->set_default_value( '#00f5eb' ),
        
        Field::make( 'color', 'mos_secondary_color', 'Secondary Color' )
        ->set_help_text( 'Pick the secondary color, by default it is set to #21fff6. You can use this color in your css with var(--mos-secondary-color)' )
        ->set_default_value( '#21fff6' ),
        
        Field::make( 'color', 'mos_content_color', 'Content Color' )
        ->set_help_text( 'Pick the content color, by default it is set to #212529. You can use this color in your css with var(--mos-content-color)' )
        ->set_default_value( '#212529' ),
        Field::make( 'color', 'mos_link_color', 'Link Color' )
        ->set_help_text( 'Pick the link color, by default it is set to #015ea5.' )
        ->set_default_value( '#015ea5' ),
        Field::make( 'color', 'mos_link_hover_color', 'Link Hover Color' )
        ->set_help_text( 'Pick the link hover color, by default it is set to #0a58ca.' )
        ->set_default_value( '#0a58ca' ),
    ));
    Container::make('theme_options', __('Theme Resourcess'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(            

        Field::make('radio', 'mos_plugin_bootstrap', __('Bootsrap'))
        ->set_options(array(
            'bootstrap-reboot' => 'Reboot CSS',
            'bootstrap-grid' => 'Grid CSS',
            'bootstrap-utilities' => 'Utilities CSS',
            'bootstrap-reboot-utilities' => 'Reboot and Utilities CSS',
            'bootstrap-bundle' => 'Bundle CSS',
            'off' => 'Disabled',
        ))
        ->set_default_value('bootstrap-bundle'),

        Field::make('radio', 'mos_plugin_jquery', __('Jquery'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('on'),

        Field::make('radio', 'mos_plugin_fontawesome', __('Font Awesome'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('on'),

        Field::make('radio', 'mos_plugin_fancybox', __('Fancybox'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('off'),

        Field::make('radio', 'mos_plugin_isotop', __('Isotop'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('off'),

        Field::make('radio', 'mos_plugin_card_slider', __('Card Slider'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('off'),
        Field::make('radio', 'mos_plugin_jpages', __('jPages'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('off'),
        Field::make('radio', 'mos_plugin_lazyload', __('Lazy Load'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('off'),
        Field::make('radio', 'mos_plugin_table_shrinker', __('Table Shrinker'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('off'),
        Field::make('radio', 'mos_plugin_owlcarousel', __('Owl Carousel'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('off'),
        Field::make('radio', 'mos_plugin_slick', __('Slick Slider'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('off'),
        Field::make('radio', 'mos_plugin_wow', __('Wow'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('off'),
        Field::make('radio', 'mos_plugin_animate', __('Animate CSS'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('off'),
        Field::make('radio', 'mos_plugin_jflip', __('Jquery Flip'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('off'),  
        Field::make( 'complex', 'mos_plugin_additional', __( 'Additional Assets' ) )
        ->add_fields( array(
            Field::make( 'select', 'type', __( 'Asset Type' ))
            ->set_options( array(
                'style' => 'CSS',
                'script' => 'Script',
            )),
            Field::make( 'select', 'from', __( 'From' ))
            ->set_options( array(
                'parent' => 'Parent Theme',
                'child' => 'Child Theme',
                'outside' => 'CDN/Outside',
            )),
            Field::make( 'text', 'source', __( 'Source' )),
        )),
    
    ));
    Container::make('theme_options', __('Contact Info'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('complex', 'mos-contact-phone', __('Phone'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'number', __('Phone Number')),
        )),
        Field::make('complex', 'mos-contact-email', __('Email'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'email', __('Email Address')),
        )),
        Field::make('complex', 'mos-contact-business-hours', __('Business Hours'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'hours', __('Business Hours')),
        )),
        Field::make('complex', 'mos-contact-contact-address', __('Contact Address'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'address', __('Address')),
            Field::make('text', 'link', __('Map Link')),
        )),
        Field::make('complex', 'mos-contact-social-media', __('Social Media'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'link', __('Link')),
            Field::make('checkbox', 'new-tab', __('Open in new tab'))
            ->set_option_value('no'),
        )),
        
        Field::make('text', 'mos-contact-calendly', __('Calendly URL')),
    ));
    Container::make('theme_options', __('Back to Top'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('radio', 'mos-back-to-top', __('Back to top option'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['on']),
        Field::make('image', 'mos-back-to-top-image', __('Back to top image')),
        Field::make('text', 'mos-back-to-top-class', __('Back to top class')),
    ));
    Container::make('theme_options', __('Page Loader'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('radio', 'mos-page-loader', __('Page loader option'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['on']),
        Field::make('image', 'mos-page-loader-image', __('Page loader image')),
        Field::make('color', 'mos-page-loader-background', 'Page loader background')
        ->set_alpha_enabled(true),
        Field::make('text', 'mos-page-loader-class', __('Page loader class')),
    ));

    Container::make('theme_options', __('Header Section'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('text', 'mos-header-padding', __('Padding')),
        Field::make('text', 'mos-header-margin', __('Margin')),
        Field::make('text', 'mos-header-border', __('Border')),
        Field::make('text', 'mos-header-class', __('Class')),
        Field::make('color', 'mos-header-content-color', __('Content Color')),
        Field::make('color', 'mos-header-link-color', __('Links Color')),
        Field::make('color', 'mos-header-link-color-hover', __('Hover Color')),
        Field::make('complex', 'mos-header-background', __('Background'))
        ->set_max(1)
        ->set_collapsed(true)
        ->add_fields(array(
            Field::make('color', 'background-color', __('Background Color')),
            Field::make('image', 'background-image', __('Background Image')),
            Field::make('select', 'background-position', __('Background Position'))
            ->set_options(array(
                'top left' => 'Top Left',
                'top center' => 'Top Center',
                'top right' => 'Top Right',
                'center left' => 'Center Left',
                'center center' => 'Center Center',
                'center right' => 'Center Right',
                'bottom left' => 'Bottom left',
                'bottom center' => 'Bottom Center',
                'bottom right' => 'Bottom Right',
            ))
            ->set_default_value(['top left']),
            Field::make('select', 'background-size', __('Background Size'))
            ->set_options(array(
                'cover' => 'cover',
                'contain' => 'contain',
                'auto' => 'auto',
                'inherit' => 'inherit',
                'initial' => 'initial',
                'revert' => 'revert',
                'revert-layer' => 'revert-layer',
                'unset' => 'unset',
            ))
            ->set_default_value(['cover']),
            //background-repeat: repeat|repeat-x|repeat-y|no-repeat|initial|inherit;
            Field::make('select', 'background-repeat', __('Background Repeat'))
            ->set_options(array(
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y',
                'no-repeat' => 'no-repeat',
                'initial' => 'initial',
                'inherit' => 'inherit',
            ))
            ->set_default_value(['scroll']),
            Field::make('select', 'background-attachment', __('Background Attachment'))
            ->set_options(array(
                'scroll' => 'Scroll',
                'fixed' => 'Fixed',
            ))
            ->set_default_value(['scroll']),
        )),
    ));

    Container::make('theme_options', __('404 Page'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('text', 'mos-404-title', __('Page title'))
        ->set_default_value( 'Hoppla! Seite nicht gefunden' )
        ->set_required( true ),
        Field::make('rich_text', 'mos-404-intro', __('Page intro'))
        ->set_default_value( 'Die Seite, nach der Sie suchen, wurde möglicherweise umbenannt, geändert oder ist <br class="d-none d-xl-inline"> vorübergehend nicht verfügbar.' ),
        Field::make('text', 'mos-404-contact', __('Contact page URL')),
    ));

    Container::make('theme_options', __('Single Post Page'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('text', 'mos-single-post-category-widget-title', __('Category widget title'))
        ->set_default_value( 'Kategorien' )
        ->set_required( true ),
        Field::make('text', 'mos-single-post-trending-widget-title', __('Trending post widget title'))
        ->set_default_value( 'Trending' ),
        Field::make('text', 'mos-single-post-known-widget-title', __('Known post widget title'))
        ->set_default_value( 'Bekannter Beitrag' ),
        Field::make('text', 'mos-single-post-newsletter-widget-title', __('Newsletter widget title'))
        ->set_default_value( 'Setup Guide: How to create a shared inbox in Gmail' ),
        Field::make('text', 'mos-single-post-newsletter-shortcode', __('Newsletter shortcode')),
        Field::make('image', 'mos-single-post-newsletter-image', __('Newsletter Image')),
        Field::make('text', 'mos-single-post-tag-widget-title', __('Popular tags'))
        ->set_default_value( 'Beliebte Schlagwörter' ),
    ));

    Container::make('theme_options', __('Sidebar Section'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make( 'separator', 'mos-sidebar-1-hr', __('Sidebar 1')),
        Field::make('text', 'mos-sidebar-title', __('Title')),
        Field::make('text', 'mos-sidebar-subtitle', __('Subtitle')),        
        Field::make('text', 'mos-sidebar-button-1-title', __('Button 1 Title')),
        Field::make('text', 'mos-sidebar-button-1-url', __('Button 1 URL')),    
        Field::make('text', 'mos-sidebar-button-2-title', __('Button 2 Title')),   
        Field::make('text', 'mos-sidebar-button-3-title', __('Button 3 Title')),    
        Field::make('text', 'mos-sidebar-button-4-title', __('Button 4 Title')),
        Field::make('text', 'mos-sidebar-button-4-url', __('Button 4 URL')),
        
        Field::make( 'separator', 'mos-sidebar-2-hr', __('Sidebar 2')),   
        Field::make('text', 'mos-sidebar-2-title', __('Title')),
        Field::make('text', 'mos-sidebar-2-subtitle', __('Subtitle')),     
        Field::make('text', 'mos-sidebar-2-shortcode', __('Form Shortcode')), 
        
        Field::make( 'separator', 'mos-sidebar-3-hr', __('Sidebar 3')),   
        Field::make('text', 'mos-sidebar-3-title', __('Title')),
        Field::make('text', 'mos-sidebar-3-subtitle', __('Subtitle')),     
        Field::make('text', 'mos-sidebar-3-shortcode', __('Form Shortcode')),     
    ));
    Container::make('theme_options', __('Widgets Section'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('text', 'mos-widgets-newsletter-title', __('Newsletter Title'))
        ->set_default_value( "Newsletter" ),
        Field::make('rich_text', 'mos-widgets-newsletter-intro', __('Newsletter Intro'))
        ->set_default_value( "Abonnieren Sie unseren Newsletter, um die neuesten Nachrichten und Updates zu erhalten." ),
        Field::make('text', 'mos-widgets-newsletter-shortcode', __('Newsletter Shortcode')),
        
        Field::make('text', 'mos-widgets-newsletter-col-2-title', __('Widgets 2 Title'))
        ->set_default_value( "Unterhalten wir uns" ),
        Field::make('text', 'mos-widgets-newsletter-col-3-title', __('Widgets 3 Title'))
        ->set_default_value( "Anschrift" ),
        Field::make('text', 'mos-widgets-newsletter-col-4-title', __('Widgets 4 Title'))
        ->set_default_value( "Rechtliches" ),
    ));
    Container::make('theme_options', __('Footer Section'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('text', 'mos-footer-padding', __('Padding')),
        Field::make('text', 'mos-footer-margin', __('Margin')),
        Field::make('text', 'mos-footer-border', __('Border')),
        Field::make('text', 'mos-footer-class', __('Class')),
        Field::make('color', 'mos-footer-content-color', __('Content Color')),
        Field::make('color', 'mos-footer-link-color', __('Links Color')),
        Field::make('color', 'mos-footer-link-color-hover', __('Hover Color')),
        Field::make('rich_text', 'mos-footer-content', __('Copyright')),
        Field::make('complex', 'mos-footer-buttons', __('Footer Buttons'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'link', __('Link')),
            Field::make('checkbox', 'new-tab', __('Open in new tab'))
            ->set_option_value('no'),
        )),
        Field::make('complex', 'mos-footer-background', __('Background'))
        ->set_max(1)
        ->set_collapsed(true)
        ->add_fields(array(
            Field::make('color', 'background-color', __('Background Color')),
            Field::make('image', 'background-image', __('Background Image')),
            Field::make('select', 'background-position', __('Background Position'))
            ->set_options(array(
                'top left' => 'Top Left',
                'top center' => 'Top Center',
                'top right' => 'Top Right',
                'center left' => 'Center Left',
                'center center' => 'Center Center',
                'center right' => 'Center Right',
                'bottom left' => 'Bottom left',
                'bottom center' => 'Bottom Center',
                'bottom right' => 'Bottom Right',
            ))
            ->set_default_value(['top left']),
            Field::make('select', 'background-size', __('Background Size'))
            ->set_options(array(
                'cover' => 'cover',
                'contain' => 'contain',
                'auto' => 'auto',
                'inherit' => 'inherit',
                'initial' => 'initial',
                'revert' => 'revert',
                'revert-layer' => 'revert-layer',
                'unset' => 'unset',
            ))
            ->set_default_value(['cover']),
            //background-repeat: repeat|repeat-x|repeat-y|no-repeat|initial|inherit;
            Field::make('select', 'background-repeat', __('Background Repeat'))
            ->set_options(array(
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y',
                'no-repeat' => 'no-repeat',
                'initial' => 'initial',
                'inherit' => 'inherit',
            ))
            ->set_default_value(['scroll']),
            Field::make('select', 'background-attachment', __('Background Attachment'))
            ->set_options(array(
                'scroll' => 'Scroll',
                'fixed' => 'Fixed',
            ))
            ->set_default_value(['scroll']),
        )),
    ));
}