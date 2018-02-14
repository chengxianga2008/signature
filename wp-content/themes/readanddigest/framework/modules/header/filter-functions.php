<?php

if(!function_exists('readanddigest_header_class')) {
    /**
     * Function that adds class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added header class
     */
    function readanddigest_header_class($classes) {
        $header_type = 'header-type3';

        $classes[] = 'eltdf-'.$header_type;

        return $classes;
    }

    add_filter('body_class', 'readanddigest_header_class');
}

if(!function_exists('readanddigest_header_behaviour_class')) {
    /**
     * Function that adds behaviour class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added behaviour class
     */
    function readanddigest_header_behaviour_class($classes) {

        $classes[] = 'eltdf-'.readanddigest_options()->getOptionValue('header_behaviour');

        return $classes;
    }

    add_filter('body_class', 'readanddigest_header_behaviour_class');
}

if(!function_exists('readanddigest_header_style_class')) {
    /**
     * Function that adds behaviour class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added behaviour class
     */
    function readanddigest_header_style_class($classes) {

        $id = readanddigest_get_page_id();

        if(readanddigest_get_meta_field_intersect('header_style', $id) !== '') {
            $classes[] = 'eltdf-' . readanddigest_get_meta_field_intersect('header_style', $id);
        }
        return $classes;
    }

    add_filter('body_class', 'readanddigest_header_style_class');
}

if(!function_exists('readanddigest_mobile_header_class')) {
    function readanddigest_mobile_header_class($classes) {
        $classes[] = 'eltdf-default-mobile-header';

        $classes[] = 'eltdf-sticky-up-mobile-header';

        return $classes;
    }

    add_filter('body_class', 'readanddigest_mobile_header_class');
}

if(!function_exists('readanddigest_header_global_js_var')) {
    function readanddigest_header_global_js_var($global_variables) {

        $global_variables['eltdfTopBarHeight'] = readanddigest_get_top_bar_height();
        $global_variables['eltdfStickyHeaderHeight'] = readanddigest_get_sticky_header_height();
        $global_variables['eltdfStickyHeaderTransparencyHeight'] = readanddigest_get_sticky_header_height_of_complete_transparency();
        $global_variables['eltdfMobileHeaderHeight'] = readanddigest_get_mobile_header_height();

        return $global_variables;
    }

    add_filter('readanddigest_js_global_variables', 'readanddigest_header_global_js_var');
}

if(!function_exists('readanddigest_header_per_page_js_var')) {
    function readanddigest_header_per_page_js_var($perPageVars) {

        $perPageVars['eltdfStickyScrollAmount'] = readanddigest_get_sticky_scroll_amount();

        return $perPageVars;
    }

    add_filter('readanddigest_per_page_js_vars', 'readanddigest_header_per_page_js_var');
}

if(!function_exists('readanddigest_aps_custom_style_class')) {
    function readanddigest_aps_custom_style_class($classes) {

        if(readanddigest_options()->getOptionValue('aps_custom_style') !== ''){
            $classes[] = 'eltdf-'.readanddigest_options()->getOptionValue('aps_custom_style');
        }

        return $classes;
    }

    add_filter('body_class', 'readanddigest_aps_custom_style_class');
}