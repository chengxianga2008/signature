<?php

if ( ! function_exists('readanddigest_reset_options_map') ) {
	/**
	 * Reset options panel
	 */
	function readanddigest_reset_options_map() {

		readanddigest_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => 'Reset',
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = readanddigest_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => 'Reset'
			)
		);

		readanddigest_add_admin_field(array(
			'type'	=> 'yesno',
			'name'	=> 'reset_to_defaults',
			'default_value'	=> 'no',
			'label'			=> 'Reset to Defaults',
			'description'	=> 'This option will reset all Elated Options values to defaults',
			'parent'		=> $panel_reset
		));

	}

	add_action( 'readanddigest_options_map', 'readanddigest_reset_options_map', 20 );
}