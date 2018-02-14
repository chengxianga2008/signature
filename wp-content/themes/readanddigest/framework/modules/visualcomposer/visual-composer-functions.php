<?php

if(!function_exists('readanddigest_vc_grid_elements_enabled')) {

	/**
	 * Function that checks if Visual Composer Grid Elements are enabled
	 *
	 * @return bool
	 */
	function readanddigest_vc_grid_elements_enabled() {

		return (readanddigest_options()->getOptionValue('enable_grid_elements') == 'yes') ? true : false;
	}
}

if(!function_exists('readanddigest_visual_composer_grid_elements')) {

	/**
	 * Removes Visual Composer Grid Elements post type if VC Grid option disabled
	 * and enables Visual Composer Grid Elements post type
	 * if VC Grid option enabled
	 */
	function readanddigest_visual_composer_grid_elements() {

		if(!readanddigest_vc_grid_elements_enabled()) {
			remove_action('init', 'vc_grid_item_editor_create_post_type');
		}
	}

	add_action('vc_after_init', 'readanddigest_visual_composer_grid_elements', 12);
}

if(!function_exists('readanddigest_get_vc_version')) {
	/**
	 * Return Visual Composer version string
	 *
	 * @return bool|string
	 */
	function readanddigest_get_vc_version() {
		if(readanddigest_visual_composer_installed()) {
			return WPB_VC_VERSION;
		}

		return false;
	}
}