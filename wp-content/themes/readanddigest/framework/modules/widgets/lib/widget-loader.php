<?php

if (!function_exists('readanddigest_register_widgets')) {

	function readanddigest_register_widgets() {

		$widgets = array(
			'ReadAndDigestBreakingNews',
			'ReadAndDigestDateWidget',
			'ReadAndDigestImageWidget',
			'ReadAndDigestPostLayoutOne',
			'ReadAndDigestPostLayoutTwo',
			'ReadAndDigestPostLayoutFive',
			'ReadAndDigestPostLayoutSeven',
            'ReadAndDigestPostLayoutTabs',
            'ReadAndDigestRecentComments',
			'ReadAndDigestSearchForm',
			'ReadAndDigestSeparatorWidget',
			'ReadAndDigestSocialIconWidget',
			'ReadAndDigestStickySidebar',
			'ReadAndDigestPostTabs',
			'ReadAndDigestSideAreaOpener',
		);

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
}

add_action('widgets_init', 'readanddigest_register_widgets');