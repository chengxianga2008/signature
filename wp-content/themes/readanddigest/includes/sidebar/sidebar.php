<?php

if(!function_exists('eltdf_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function eltdf_register_sidebars() {

        register_sidebar(array(
            'name' => 'Sidebar',
            'id' => 'sidebar',
            'description' => 'Default Sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h6>',
            'after_title' => '</h6>'
        ));

    }

    add_action('widgets_init', 'eltdf_register_sidebars');
}

if(!function_exists('eltd_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates ReadAndDigestSidebar object
     */
    function eltd_add_support_custom_sidebar() {
        add_theme_support('ReadAndDigestSidebar');
        if (get_theme_support('ReadAndDigestSidebar')) new ReadAndDigestSidebar();
    }

    add_action('after_setup_theme', 'eltd_add_support_custom_sidebar');
}
