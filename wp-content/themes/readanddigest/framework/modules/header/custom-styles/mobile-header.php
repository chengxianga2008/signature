<?php

if(!function_exists('readanddigest_mobile_header_general_styles')) {
    /**
     * Generates general custom styles for mobile header
     */
    function readanddigest_mobile_header_general_styles() {
        $mobile_header_styles = array();
        if(readanddigest_options()->getOptionValue('mobile_header_height') !== '') {
            $mobile_header_styles['height'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('mobile_header_height')).'px';
        }

        if(readanddigest_options()->getOptionValue('mobile_header_background_color')) {
            $mobile_header_styles['background-color'] = readanddigest_options()->getOptionValue('mobile_header_background_color');
        }

        echo readanddigest_dynamic_css('.eltdf-mobile-header .eltdf-mobile-header-inner', $mobile_header_styles);

		if(readanddigest_options()->getOptionValue('mobile_menu_background_color')) {
			echo readanddigest_dynamic_css(
				'.eltdf-mobile-header .eltdf-mobile-nav',
				array("background-color" => readanddigest_options()->getOptionValue('mobile_menu_background_color'))
			);
		}
        
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_mobile_header_general_styles');
}

if(!function_exists('readanddigest_mobile_logo_styles')) {
    /**
     * Generates styles for mobile logo
     */
    function readanddigest_mobile_logo_styles() {
        if(readanddigest_options()->getOptionValue('mobile_logo_height') !== '') { ?>
            @media only screen and (max-width: 1000px) {
            <?php echo readanddigest_dynamic_css(
                '.eltdf-mobile-header .eltdf-mobile-logo-wrapper a',
                array('height' => readanddigest_filter_px(readanddigest_options()->getOptionValue('mobile_logo_height')).'px !important')
            ); ?>
            }
        <?php }

        if(readanddigest_options()->getOptionValue('mobile_logo_height_phones') !== '') { ?>
            @media only screen and (max-width: 480px) {
            <?php echo readanddigest_dynamic_css(
                '.eltdf-mobile-header .eltdf-mobile-logo-wrapper a',
                array('height' => readanddigest_filter_px(readanddigest_options()->getOptionValue('mobile_logo_height_phones')).'px !important')
            ); ?>
            }
        <?php }
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_mobile_logo_styles');
}

if(!function_exists('readanddigest_mobile_icon_styles')) {
    /**
     * Generates styles for mobile icon opener
     */
    function readanddigest_mobile_icon_styles() {

        if(readanddigest_options()->getOptionValue('mobile_icon_color') !== '') {
			echo readanddigest_dynamic_css(
				'.eltdf-mobile-header .eltdf-mobile-menu-opener .eltdf-mobile-opener-icon-holder .eltdf-line',
				array('background-color' => readanddigest_options()->getOptionValue('mobile_icon_color'))
			);
        }

        if(readanddigest_options()->getOptionValue('mobile_icon_hover_color') !== '') {
            echo readanddigest_dynamic_css(
                '.eltdf-mobile-header .eltdf-mobile-menu-opener a:hover .eltdf-mobile-opener-icon-holder .eltdf-line',
                array('background-color' => readanddigest_options()->getOptionValue('mobile_icon_hover_color')));
        }
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_mobile_icon_styles');
}