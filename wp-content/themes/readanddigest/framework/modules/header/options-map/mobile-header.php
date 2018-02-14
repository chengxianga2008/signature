<?php

if ( ! function_exists('readanddigest_mobile_header_options_map') ) {

	function readanddigest_mobile_header_options_map() {

		$panel_mobile_header = readanddigest_add_admin_panel(array(
			'title' => 'Mobile header',
			'name'  => 'panel_mobile_header',
			'page'  => '_header_page'
		));

		readanddigest_add_admin_field(array(
			'name'        => 'mobile_header_height',
			'type'        => 'text',
			'label'       => 'Mobile Header Height',
			'description' => 'Enter height for mobile header in pixels',
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		readanddigest_add_admin_field(array(
			'name'        => 'mobile_header_background_color',
			'type'        => 'color',
			'label'       => 'Mobile Header Background Color',
			'description' => 'Choose color for mobile header',
			'parent'      => $panel_mobile_header
		));

		readanddigest_add_admin_field(array(
			'name'        => 'mobile_menu_background_color',
			'type'        => 'color',
			'label'       => 'Mobile Menu Background Color',
			'description' => 'Choose color for mobile menu',
			'parent'      => $panel_mobile_header
		));

		readanddigest_add_admin_field(array(
			'name'        => 'mobile_logo_height',
			'type'        => 'text',
			'label'       => 'Logo Height For Mobile Header',
			'description' => 'Define logo height for screen size smaller than 1000px',
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		readanddigest_add_admin_field(array(
			'name'        => 'mobile_logo_height_phones',
			'type'        => 'text',
			'label'       => 'Logo Height For Mobile Devices',
			'description' => 'Define logo height for screen size smaller than 480px',
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		readanddigest_add_admin_section_title(array(
			'name' => 'mobile_opener_panel',
			'parent' => $panel_mobile_header,
			'title' => 'Mobile Menu Opener'
		));

		readanddigest_add_admin_field(array(
			'name'        => 'mobile_icon_color',
			'type'        => 'color',
			'label'       => 'Mobile Navigation Icon Color',
			'description' => 'Choose color for icon header',
			'parent'      => $panel_mobile_header
		));

		readanddigest_add_admin_field(array(
			'name'        => 'mobile_icon_hover_color',
			'type'        => 'color',
			'label'       => 'Mobile Navigation Icon Hover Color',
			'description' => 'Choose hover color for mobile navigation icon ',
			'parent'      => $panel_mobile_header
		));
	}

	add_action( 'readanddigest_after_header_options_map', 'readanddigest_mobile_header_options_map');

}