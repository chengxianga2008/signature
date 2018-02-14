<?php

if (!function_exists('readanddigest_side_area_slide_over_content_style')) {

	function readanddigest_side_area_slide_over_content_style()
	{

		if (readanddigest_options()->getOptionValue('side_area_type') == 'side-menu-slide-over-content') {

			$width = readanddigest_options()->getOptionValue('side_area_slide_over_content_width');
			if ($width !== '') {

				if ($width == 'width-240'){
					$width = '240px';
				}
				elseif ($width == 'width-340'){
					$width = '340px';
				}
				else{
					$width = '440px';
				}

				echo readanddigest_dynamic_css('.eltdf-side-menu-slide-over-content .eltdf-side-menu', array(
					'left' => '-'.$width,
					'width' => $width
				));
			}
		}

	}

	add_action('readanddigest_style_dynamic', 'readanddigest_side_area_slide_over_content_style');

}

if (!function_exists('readanddigest_side_area_icon_color_styles')) {

	function readanddigest_side_area_icon_color_styles()
	{

		if (readanddigest_options()->getOptionValue('side_area_icon_font_size') !== '') {

			echo readanddigest_dynamic_css('.eltdf-side-menu-button-opener span', array(
				'font-size' => readanddigest_filter_px(readanddigest_options()->getOptionValue('side_area_icon_font_size')) . 'px'
			));

			if (readanddigest_options()->getOptionValue('side_area_icon_font_size') > 30) {
				echo '@media only screen and (max-width: 480px) {
						.eltdf-side-menu-button-opener span {
						font-size: 30px;
						}
					}';
			}

		}

		if (readanddigest_options()->getOptionValue('side_area_icon_color') !== '') {

			echo readanddigest_dynamic_css('a.eltdf-side-menu-button-opener', array(
				'color' => readanddigest_options()->getOptionValue('side_area_icon_color')
			));

		}
		if (readanddigest_options()->getOptionValue('side_area_icon_hover_color') !== '') {

			echo readanddigest_dynamic_css('a.eltdf-side-menu-button-opener:hover', array(
				'color' => readanddigest_options()->getOptionValue('side_area_icon_hover_color')
			));

		}


	}

	add_action('readanddigest_style_dynamic', 'readanddigest_side_area_icon_color_styles');

}

if (!function_exists('readanddigest_side_area_alignment')) {

	function readanddigest_side_area_alignment()
	{

		if (readanddigest_options()->getOptionValue('side_area_aligment')) {

			echo readanddigest_dynamic_css('.eltdf-side-menu-slide-over-content .eltdf-side-menu', array(
				'text-align' => readanddigest_options()->getOptionValue('side_area_aligment')
			));

		}

	}

	add_action('readanddigest_style_dynamic', 'readanddigest_side_area_alignment');

}

if (!function_exists('readanddigest_side_area_styles')) {

	function readanddigest_side_area_styles()
	{

		$side_area_styles = array();

		if (readanddigest_options()->getOptionValue('side_area_background_color') !== '') {
			$side_area_styles['background-color'] = readanddigest_options()->getOptionValue('side_area_background_color');
		}

		if (!empty($side_area_styles)) {
			echo readanddigest_dynamic_css('.eltdf-side-menu', $side_area_styles);
		}

		if (readanddigest_options()->getOptionValue('side_area_close_icon') == 'dark') {
			echo readanddigest_dynamic_css('.eltdf-side-menu a.eltdf-close-side-menu span, .eltdf-side-menu a.eltdf-close-side-menu i', array(
				'color' => '#000000'
			));
		}

		if (readanddigest_options()->getOptionValue('side_area_close_icon_size') !== '') {
			echo readanddigest_dynamic_css('.eltdf-side-menu a.eltdf-close-side-menu', array(
				'height' => readanddigest_filter_px(readanddigest_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'width' => readanddigest_filter_px(readanddigest_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'line-height' => readanddigest_filter_px(readanddigest_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'padding' => 0,
			));
			echo readanddigest_dynamic_css('.eltdf-side-menu a.eltdf-close-side-menu span, .eltdf-side-menu a.eltdf-close-side-menu i', array(
				'font-size' => readanddigest_filter_px(readanddigest_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'height' => readanddigest_filter_px(readanddigest_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'width' => readanddigest_filter_px(readanddigest_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'line-height' => readanddigest_filter_px(readanddigest_options()->getOptionValue('side_area_close_icon_size')) . 'px',
			));
		}

	}

	add_action('readanddigest_style_dynamic', 'readanddigest_side_area_styles');

}

if (!function_exists('readanddigest_side_area_title_styles')) {

	function readanddigest_side_area_title_styles()
	{

		$title_styles = array();

		if (readanddigest_options()->getOptionValue('side_area_title_color') !== '') {
			$title_styles['color'] = readanddigest_options()->getOptionValue('side_area_title_color');
		}

		if (readanddigest_options()->getOptionValue('side_area_title_fontsize') !== '') {
			$title_styles['font-size'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('side_area_title_fontsize')) . 'px';
		}

		if (readanddigest_options()->getOptionValue('side_area_title_lineheight') !== '') {
			$title_styles['line-height'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('side_area_title_lineheight')) . 'px';
		}

		if (readanddigest_options()->getOptionValue('side_area_title_texttransform') !== '') {
			$title_styles['text-transform'] = readanddigest_options()->getOptionValue('side_area_title_texttransform');
		}

		if (readanddigest_options()->getOptionValue('side_area_title_google_fonts') !== '-1') {
			$title_styles['font-family'] = readanddigest_get_formatted_font_family(readanddigest_options()->getOptionValue('side_area_title_google_fonts')) . ', sans-serif';
		}

		if (readanddigest_options()->getOptionValue('side_area_title_fontstyle') !== '') {
			$title_styles['font-style'] = readanddigest_options()->getOptionValue('side_area_title_fontstyle');
		}

		if (readanddigest_options()->getOptionValue('side_area_title_fontweight') !== '') {
			$title_styles['font-weight'] = readanddigest_options()->getOptionValue('side_area_title_fontweight');
		}

		if (readanddigest_options()->getOptionValue('side_area_title_letterspacing') !== '') {
			$title_styles['letter-spacing'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('side_area_title_letterspacing')) . 'px';
		}

		if (!empty($title_styles)) {

			echo readanddigest_dynamic_css('.eltdf-side-menu-title h4, .eltdf-side-menu-title h5', $title_styles);

		}

	}

	add_action('readanddigest_style_dynamic', 'readanddigest_side_area_title_styles');

}

if (!function_exists('readanddigest_side_area_text_styles')) {

	function readanddigest_side_area_text_styles()
	{
		$text_styles = array();

		if (readanddigest_options()->getOptionValue('side_area_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = readanddigest_get_formatted_font_family(readanddigest_options()->getOptionValue('side_area_text_google_fonts')) . ', sans-serif';
		}

		if (readanddigest_options()->getOptionValue('side_area_text_fontsize') !== '') {
			$text_styles['font-size'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('side_area_text_fontsize')) . 'px';
		}

		if (readanddigest_options()->getOptionValue('side_area_text_lineheight') !== '') {
			$text_styles['line-height'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('side_area_text_lineheight')) . 'px';
		}

		if (readanddigest_options()->getOptionValue('side_area_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('side_area_text_letterspacing')) . 'px';
		}

		if (readanddigest_options()->getOptionValue('side_area_text_fontweight') !== '') {
			$text_styles['font-weight'] = readanddigest_options()->getOptionValue('side_area_text_fontweight');
		}

		if (readanddigest_options()->getOptionValue('side_area_text_fontstyle') !== '') {
			$text_styles['font-style'] = readanddigest_options()->getOptionValue('side_area_text_fontstyle');
		}

		if (readanddigest_options()->getOptionValue('side_area_text_texttransform') !== '') {
			$text_styles['text-transform'] = readanddigest_options()->getOptionValue('side_area_text_texttransform');
		}

		if (readanddigest_options()->getOptionValue('side_area_text_color') !== '') {
			$text_styles['color'] = readanddigest_options()->getOptionValue('side_area_text_color');
		}

		if (!empty($text_styles)) {

			echo readanddigest_dynamic_css(array(
				'.eltdf-side-menu .widget',
				'.eltdf-side-menu .widget.widget_search form',
				'.eltdf-side-menu .widget.widget_search form input[type="text"]',
				'.eltdf-side-menu .widget.widget_search form input[type="submit"]',
				'.eltdf-side-menu .widget h6',
				'.eltdf-side-menu .widget h6 a',
				'.eltdf-side-menu .widget p',
				'.eltdf-side-menu .widget li a',
				'.eltdf-side-menu #wp-calendar caption',
				'.eltdf-side-menu .widget li',
				'.eltdf-side-menu h3',
				'.eltdf-side-menu .widget.widget_archive select',
				'.eltdf-side-menu .widget.widget_categories select',
				'.eltdf-side-menu .widget.widget_text select',
				'.eltdf-side-menu .widget.widget_search form input[type="submit"]',
				'.eltdf-side-menu #wp-calendar th',
				'.eltdf-side-menu #wp-calendar td',
				'.eltdf-side-menu .q_social_icon_holder i.simple_social',
				'.eltdf-side-menu .widget .screen-reader-text',
				'.eltdf-side-menu span'
				),
				$text_styles
			);

		}

	}

	add_action('readanddigest_style_dynamic', 'readanddigest_side_area_text_styles');

}

if (!function_exists('readanddigest_side_area_link_styles')) {

	function readanddigest_side_area_link_styles()
	{
		$link_styles = array();

		if (readanddigest_options()->getOptionValue('sidearea_link_font_family') !== '-1') {
			$link_styles['font-family'] = readanddigest_get_formatted_font_family(readanddigest_options()->getOptionValue('sidearea_link_font_family')) . ',sans-serif';
		}

		if (readanddigest_options()->getOptionValue('sidearea_link_font_size') !== '') {
			$link_styles['font-size'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('sidearea_link_font_size')) . 'px';
		}

		if (readanddigest_options()->getOptionValue('sidearea_link_line_height') !== '') {
			$link_styles['line-height'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('sidearea_link_line_height')) . 'px';
		}

		if (readanddigest_options()->getOptionValue('sidearea_link_letter_spacing') !== '') {
			$link_styles['letter-spacing'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('sidearea_link_letter_spacing')) . 'px';
		}

		if (readanddigest_options()->getOptionValue('sidearea_link_font_weight') !== '') {
			$link_styles['font-weight'] = readanddigest_options()->getOptionValue('sidearea_link_font_weight');
		}

		if (readanddigest_options()->getOptionValue('sidearea_link_font_style') !== '') {
			$link_styles['font-style'] = readanddigest_options()->getOptionValue('sidearea_link_font_style');
		}

		if (readanddigest_options()->getOptionValue('sidearea_link_text_transform') !== '') {
			$link_styles['text-transform'] = readanddigest_options()->getOptionValue('sidearea_link_text_transform');
		}

		if (readanddigest_options()->getOptionValue('sidearea_link_color') !== '') {
			$link_styles['color'] = readanddigest_options()->getOptionValue('sidearea_link_color');
		}

		if (!empty($link_styles)) {

			echo readanddigest_dynamic_css(array(
				'.eltdf-side-menu .widget li a',
				'.eltdf-side-menu .widget a:not(.qbutton)',
				'.eltdf-side-menu .widget.widget_rss li a.rsswidget'
				),$link_styles);

		}

		if (readanddigest_options()->getOptionValue('sidearea_link_hover_color') !== '') {
			echo readanddigest_dynamic_css(array(
				'.eltdf-side-menu .widget a:hover',
				'.eltdf-side-menu .widget li:hover',
				'.eltdf-side-menu .widget li:hover>a',
				'.eltdf-side-menu .widget.widget_rss li a.rsswidget:hover'
				), array(
				'color' => readanddigest_options()->getOptionValue('sidearea_link_hover_color')
			));
		}

	}

	add_action('readanddigest_style_dynamic', 'readanddigest_side_area_link_styles');

}