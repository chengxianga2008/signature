<?php
/*
Plugin Name: Elated CPT
Description: Plugin that adds all post types needed by our theme
Author: Elated Themes
Version: 1.1
*/

require_once 'load.php';


if(!function_exists('eltd_core_text_domain')) {
    /**
     * Loads plugin text domain so it can be used in translation
     */
    function eltd_core_text_domain() {
        load_plugin_textdomain('eltd_core', false, ELATED_CORE_REL_PATH.'/languages');
    }

    add_action('plugins_loaded', 'eltd_core_text_domain');
}

if(!function_exists('readanddigest_theme_menu')) {
	/**
	 * Function that generates admin menu for options page.
	 * It generates one admin page per options page.
	 */
	function readanddigest_theme_menu() {
		if(eltd_core_theme_installed()) {
			global $readanddigest_Framework;
			readanddigest_init_theme_options();

			$page_hook_suffix = add_menu_page(
				'Elated Options',                   // The value used to populate the browser's title bar when the menu page is active
				'Elated Options',                   // The text of the menu in the administrator's sidebar
				'administrator',                  // What roles are able to access the menu
				'readanddigest_theme_menu',                // The ID used to bind submenu items to this menu
				array($readanddigest_Framework->getSkin(), 'renderOptions'), // The callback function used to render this menu
				$readanddigest_Framework->getSkin()->getMenuIcon('options'),             // Icon For menu Item
				$readanddigest_Framework->getSkin()->getMenuItemPosition('options')            // Position
			);

			foreach ($readanddigest_Framework->eltdOptions->adminPages as $key=>$value ) {
				$slug = "";

				if (!empty($value->slug)) {
					$slug = "_tab".$value->slug;
				}

				$subpage_hook_suffix = add_submenu_page(
					'readanddigest_theme_menu',
					'Elated Options - '.$value->title,                   // The value used to populate the browser's title bar when the menu page is active
					$value->title,                   // The text of the menu in the administrator's sidebar
					'administrator',                  // What roles are able to access the menu
					'readanddigest_theme_menu'.$slug,                // The ID used to bind submenu items to this menu
					array($readanddigest_Framework->getSkin(), 'renderOptions')
				);

				add_action('admin_print_scripts-'.$subpage_hook_suffix, 'readanddigest_enqueue_admin_scripts');
				add_action('admin_print_styles-'.$subpage_hook_suffix, 'readanddigest_enqueue_admin_styles');
			};

			add_action('admin_print_scripts-'.$page_hook_suffix, 'readanddigest_enqueue_admin_scripts');
			add_action('admin_print_styles-'.$page_hook_suffix, 'readanddigest_enqueue_admin_styles');
		}
	}

	add_action( 'admin_menu', 'readanddigest_theme_menu');
}

if(!function_exists('readanddigest_shortcodes_in_widgets')) {
    /**
     * Function that enables shortcodes rendering in widgets
     */
    function readanddigest_shortcodes_in_widgets(){
        //enable rendering shortcodes in widgets
        add_filter('widget_text', 'do_shortcode');
    }

    add_action('after_setup_theme', 'readanddigest_shortcodes_in_widgets');
}