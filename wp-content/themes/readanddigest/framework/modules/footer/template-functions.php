<?php

if (!function_exists('readanddigest_register_footer_sidebar')) {

	function readanddigest_register_footer_sidebar() {

		register_sidebar(array(
			'name' => 'Footer Column 1',
			'id' => 'footer_column_1',
			'description' => 'Footer Column 1',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-1 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="eltdf-footer-widget-title">',
			'after_title' => '</h6>'
		));

		register_sidebar(array(
			'name' => 'Footer Column 2',
			'id' => 'footer_column_2',
			'description' => 'Footer Column 2',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-2 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="eltdf-footer-widget-title">',
			'after_title' => '</h6>'
		));

		register_sidebar(array(
			'name' => 'Footer Column 3',
			'id' => 'footer_column_3',
			'description' => 'Footer Column 3',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-3 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="eltdf-footer-widget-title">',
			'after_title' => '</h6>'
		));

		register_sidebar(array(
			'name' => 'Footer Column 4',
			'id' => 'footer_column_4',
			'description' => 'Footer Column 4',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-4 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="eltdf-footer-widget-title">',
			'after_title' => '</h6>'
		));

		register_sidebar(array(
			'name' => 'Footer Text',
			'id' => 'footer_text',
			'description' => 'Footer Text',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-text %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="eltdf-footer-widget-title">',
			'after_title' => '</h6>'
		));

		register_sidebar(array(
			'name' => 'Footer Bottom Left',
			'id' => 'footer_bottom_left',
			'description' => 'Footer Bottom Left',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-bottom-left %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="eltdf-footer-widget-title">',
			'after_title' => '</h6>'
		));

		register_sidebar(array(
			'name' => 'Footer Bottom Right',
			'id' => 'footer_bottom_right',
			'description' => 'Footer Bottom Right',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-bottom-left %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="eltdf-footer-widget-title">',
			'after_title' => '</h6>'
		));

	}

	add_action('widgets_init', 'readanddigest_register_footer_sidebar');

}

if (!function_exists('readanddigest_get_footer')) {
	/**
	 * Loads footer HTML
	 */
	function readanddigest_get_footer() {

		$parameters = array();
		$id = readanddigest_get_page_id();
		$parameters['display_footer_top'] = (readanddigest_options()->getOptionValue('show_footer_top') == 'yes') ? true : false;
		$parameters['display_footer_bottom'] = (readanddigest_options()->getOptionValue('show_footer_bottom') == 'yes') ? true : false;

		readanddigest_get_module_template_part('templates/footer', 'footer', '', $parameters);
	}
}

if (!function_exists('readanddigest_get_footer_top')) {
	/**
	 * Return footer top HTML
	 */
	function readanddigest_get_footer_top() {

		$parameters = array();

		$parameters['footer_in_grid'] = (readanddigest_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
		$parameters['footer_top_classes'] = (readanddigest_options()->getOptionValue('footer_in_grid') == 'yes') ? '' : 'eltdf-footer-top-full';
		$parameters['footer_top_columns'] = readanddigest_options()->getOptionValue('footer_top_columns');

		readanddigest_get_module_template_part('templates/parts/footer-top', 'footer', '', $parameters);
	}
}

if (!function_exists('readanddigest_get_footer_bottom')) {
	/**
	 * Return footer bottom HTML
	 */
	function readanddigest_get_footer_bottom() {

		$parameters = array();

		$parameters['footer_in_grid'] = (readanddigest_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
        $parameters['footer_bottom_classes'] = (readanddigest_options()->getOptionValue('footer_in_grid') == 'yes') ? '' : 'eltdf-footer-top-full';
		$parameters['footer_bottom_columns'] = readanddigest_options()->getOptionValue('footer_bottom_columns');

		readanddigest_get_module_template_part('templates/parts/footer-bottom', 'footer', '', $parameters);
	}
}

//Functions for loading sidebars

if (!function_exists('readanddigest_get_footer_sidebar_25_25_50')) {

	function readanddigest_get_footer_sidebar_25_25_50() {
		readanddigest_get_module_template_part('templates/sidebars/sidebar-three-columns-25-25-50', 'footer');
	}
}

if (!function_exists('readanddigest_get_footer_sidebar_50_25_25')) {

	function readanddigest_get_footer_sidebar_50_25_25() {
		readanddigest_get_module_template_part('templates/sidebars/sidebar-three-columns-50-25-25', 'footer');
	}
}

if (!function_exists('readanddigest_get_footer_sidebar_four_columns')) {

	function readanddigest_get_footer_sidebar_four_columns() {
		readanddigest_get_module_template_part('templates/sidebars/sidebar-four-columns', 'footer');
	}
}

if (!function_exists('readanddigest_get_footer_sidebar_three_columns')) {

	function readanddigest_get_footer_sidebar_three_columns() {
		readanddigest_get_module_template_part('templates/sidebars/sidebar-three-columns', 'footer');
	}
}

if (!function_exists('readanddigest_get_footer_sidebar_two_columns')) {

	function readanddigest_get_footer_sidebar_two_columns() {
		readanddigest_get_module_template_part('templates/sidebars/sidebar-two-columns', 'footer');
	}
}

if (!function_exists('readanddigest_get_footer_sidebar_one_column')) {

	function readanddigest_get_footer_sidebar_one_column() {
		readanddigest_get_module_template_part('templates/sidebars/sidebar-one-column', 'footer');
	}
}

if (!function_exists('readanddigest_get_footer_bottom_sidebar_three_columns')) {

	function readanddigest_get_footer_bottom_sidebar_three_columns() {
		readanddigest_get_module_template_part('templates/sidebars/sidebar-bottom-three-columns', 'footer');
	}
}

if (!function_exists('readanddigest_get_footer_bottom_sidebar_two_columns')) {

	function readanddigest_get_footer_bottom_sidebar_two_columns() {
		readanddigest_get_module_template_part('templates/sidebars/sidebar-bottom-two-columns', 'footer');
	}
}

if (!function_exists('readanddigest_get_footer_bottom_sidebar_one_column')) {

	function readanddigest_get_footer_bottom_sidebar_one_column() {
		readanddigest_get_module_template_part('templates/sidebars/sidebar-bottom-one-column', 'footer');
	}
}