<?php

add_action('after_setup_theme', 'readanddigest_meta_boxes_map_init', 1);
function readanddigest_meta_boxes_map_init() {
    /**
    * Loades all meta-boxes by going through all folders that are placed directly in meta-boxes folder
    * and loads map.php file in each.
    *
    * @see http://php.net/manual/en/function.glob.php
    */

    do_action('readanddigest_before_meta_boxes_map');

	global $readanddigest_options;
	global $readanddigest_Framework;
	global $readanddigest_options_fontstyle;
	global $readanddigest_options_fontweight;
	global $readanddigest_options_texttransform;
	global $readanddigest_options_fontdecoration;
	global $readanddigest_options_arrows_type;

    foreach(glob(ELATED_FRAMEWORK_ROOT_DIR.'/admin/meta-boxes/*/map.php') as $meta_box_load) {
        include_once $meta_box_load;
    }

	do_action('readanddigest_meta_boxes_map');

	do_action('readanddigest_after_meta_boxes_map');
}