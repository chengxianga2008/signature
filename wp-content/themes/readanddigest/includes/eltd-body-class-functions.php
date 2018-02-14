<?php

if(!function_exists('readanddigest_boxed_class')) {
    /**
     * Function that adds classes on body for boxed layout
     */
    function readanddigest_boxed_class($classes) {
        $id = readanddigest_get_page_id();
        //is boxed layout turned on?
        if(readanddigest_get_meta_field_intersect('boxed',$id) == 'yes') {
            $classes[] = 'eltdf-boxed';
        }

        return $classes;
    }

    add_filter('body_class', 'readanddigest_boxed_class');
}

if(!function_exists('readanddigest_theme_version_class')) {
    /**
     * Function that adds classes on body for version of theme
     */
    function readanddigest_theme_version_class($classes) {
        $current_theme = wp_get_theme();

        //is child theme activated?
        if($current_theme->parent()) {
            //add child theme version
            $classes[] = strtolower($current_theme->get('Name')).'-child-ver-'.$current_theme->get('Version');

            //get parent theme
            $current_theme = $current_theme->parent();
        }

        if($current_theme->exists() && $current_theme->get('Version') != '') {
            $classes[] = strtolower($current_theme->get('Name')).'-ver-'.$current_theme->get('Version');
        }

        return $classes;
    }

    add_filter('body_class', 'readanddigest_theme_version_class');
}

if(!function_exists('readanddigest_smooth_scroll_class')) {
    /**
     * Function that adds classes on body for smooth scroll
     */
    function readanddigest_smooth_scroll_class($classes) {

        //is smooth scroll enabled enabled and not Mac device?
        if(readanddigest_options()->getOptionValue('smooth_scroll') == 'yes') {
            $classes[] = 'eltdf-smooth-scroll';
        } else {
            $classes[] = '';
        }

        return $classes;
    }

    add_filter('body_class', 'readanddigest_smooth_scroll_class');
}

if(!function_exists('readanddigest_content_initial_width_body_class')) {
    /**
     * Function that adds transparent content class to body.
     *
     * @param $classes array of body classes
     *
     * @return array with transparent content body class added
     */
    function readanddigest_content_initial_width_body_class($classes) {

        if(readanddigest_get_meta_field_intersect('initial_content_width') !== '') {
            $classes[] = 'eltdf-'.readanddigest_get_meta_field_intersect('initial_content_width');
        }else{
            $classes[] = 'eltdf-grid-1200';
        }

        return $classes;
    }

    add_filter('body_class', 'readanddigest_content_initial_width_body_class');
}

if(!function_exists('readanddigest_set_blog_body_class')) {
    /**
     * Function that adds blog class to body if blog template, shortcodes or widgets are used on site.
     *
     * @param $classes array of body classes
     *
     * @return array with blog body class added
     */
    function readanddigest_set_blog_body_class($classes) {

        if(readanddigest_load_blog_assets()) {
            $classes[] = 'eltdf-blog-installed';
        }

        return $classes;
    }

    add_filter('body_class', 'readanddigest_set_blog_body_class');
}

if(!function_exists('readanddigest_set_category_template_body_class')) {
    /**
     * Function that adds class to body if unique category template layout is used on site.
     *
     * @param $classes array of body classes
     *
     * @return array with blog body class added
     */
    function readanddigest_set_category_template_body_class($classes) {

        if(readanddigest_options()->getOptionValue('unigue_category_layout') === 'yes'){
            $classes[] = 'eltdf-unique-category-layout';
        }

        return $classes;
    }

    add_filter('body_class', 'readanddigest_set_category_template_body_class');
}

if(!function_exists('readanddigest_set_title_body_class')) {
    /**
     * Function that adds class to body if unique category template layout is used on site.
     *
     * @param $classes array of body classes
     *
     * @return array with blog body class added
     */
    function readanddigest_set_title_body_class($classes) {
        $id = readanddigest_get_page_id();

        if(readanddigest_get_meta_field_intersect('show_title_area',$id) == 'no'){
            $classes[] = 'eltdf-no-title-area';
        }

        return $classes;
    }

    add_filter('body_class', 'readanddigest_set_title_body_class');
}