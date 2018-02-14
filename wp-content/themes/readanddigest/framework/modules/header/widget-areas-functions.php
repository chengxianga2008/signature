<?php

if(!function_exists('readanddigest_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function readanddigest_register_top_header_areas() {
        $top_bar_enabled = readanddigest_options()->getOptionValue('top_bar');

        if($top_bar_enabled == 'yes') {
            register_sidebar(array(
                'name'          => esc_html__('Top Bar Left', 'readanddigest'),
                'id'            => 'eltdf-top-bar-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));

            register_sidebar(array(
                'name'          => esc_html__('Top Bar Center', 'readanddigest'),
                'id'            => 'eltdf-top-bar-center',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));

            register_sidebar(array(
                'name'          => esc_html__('Top Bar Right', 'readanddigest'),
                'id'            => 'eltdf-top-bar-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));
        }
    }

    add_action('widgets_init', 'readanddigest_register_top_header_areas');
}

if(!function_exists('readanddigest_register_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function readanddigest_register_header_areas() {

        if(readanddigest_is_responsive_on()) {
            register_sidebar(array(
                'name'          => esc_html__('Right From Main Menu', 'readanddigest'),
                'id'            => 'eltdf-right-from-main-menu',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-right-from-main-menu">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'readanddigest')
            ));
        }

        if(readanddigest_is_responsive_on()) {
            register_sidebar(array(
                'name'          => esc_html__('Right From Logo', 'readanddigest'),
                'id'            => 'eltdf-right-from-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-right-from-logo">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the logo, only if position of logo is "left"', 'readanddigest')
            ));
        }
    }

    add_action('widgets_init', 'readanddigest_register_header_areas');
}

if(!function_exists('readanddigest_register_sticky_header_areas')) {
    /**
     * Registers widget area for sticky header
     */
    function readanddigest_register_sticky_header_areas() {
        if(in_array(readanddigest_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            register_sidebar(array(
                'name'          => esc_html__('Sticky Right', 'readanddigest'),
                'id'            => 'eltdf-sticky-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-sticky-right">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side in sticky menu', 'readanddigest')
            ));
        }
    }

    add_action('widgets_init', 'readanddigest_register_sticky_header_areas');
}

if(!function_exists('readanddigest_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function readanddigest_register_mobile_header_areas() {
        if(readanddigest_is_responsive_on()) {
            register_sidebar(array(
                'name'          => esc_html__('Right From Mobile Logo', 'readanddigest'),
                'id'            => 'eltdf-right-from-mobile-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-right-from-mobile-logo">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'readanddigest')
            ));
        }
    }

    add_action('widgets_init', 'readanddigest_register_mobile_header_areas');
}