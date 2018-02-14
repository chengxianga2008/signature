<?php

if(!function_exists('readanddigest_header_top_bar_styles')) {
    /**
     * Generates styles for header top bar
     */
    function readanddigest_header_top_bar_styles() {
        global $readanddigest_options;

        $background_color = readanddigest_options()->getOptionValue('top_bar_background_color');
        $top_bar_styles = array();

        if($background_color !== '') {
            $top_bar_styles['background-color'] = $background_color;
        }

        if(readanddigest_options()->getOptionValue('top_bar_bottom_border') == 'yes'){
            if(readanddigest_options()->getOptionValue('top_bar_bottom_border_color') !== ""){
                $top_bar_styles['border-bottom'] = '1px solid '.readanddigest_options()->getOptionValue('top_bar_bottom_border_color');
            }else{
                $top_bar_styles['border-bottom'] = '1px solid #e4e4e4';
            }
        }

        echo readanddigest_dynamic_css('.eltdf-top-bar', $top_bar_styles);
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_header_top_bar_styles');
}

if(!function_exists('readanddigest_header_top_bar_responsive_styles')) {
    /**
     * Generates styles for header top bar
     */
    function readanddigest_header_top_bar_responsive_styles() {
        global $readanddigest_options;

        $top_bar_responsive_styles = array();
        $hide_top_bar_on_mobile = readanddigest_options()->getOptionValue('hide_top_bar_on_mobile');

        if($hide_top_bar_on_mobile === 'yes') { ?>
            @media only screen and (max-width: 700px) {
                .eltdf-top-bar {
                    height: 0;
                    display: none;
                }
            }
        <?php }
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_header_top_bar_responsive_styles');
}

if(!function_exists('readanddigest_header_type3_logo_styles')) {
    /**
     * Generates styles for header type 3 logo
     */
    function readanddigest_header_type3_logo_styles() {
        global $readanddigest_options;

        $logo_area_header_type3_styles = array();

        if($readanddigest_options['logo_area_height_header_type3'] !== '') {
            $header_type3_height = readanddigest_filter_px($readanddigest_options['logo_area_height_header_type3']);

            $logo_area_header_type3_styles['height'] = $header_type3_height.'px';

            $max_height = intval($header_type3_height).'px';
            echo readanddigest_dynamic_css('.eltdf-header-type3 .eltdf-page-header .eltdf-logo-wrapper a', array('max-height' => $max_height));
        }

        echo readanddigest_dynamic_css('.eltdf-header-type3 .eltdf-page-header .eltdf-logo-area', $logo_area_header_type3_styles);
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_header_type3_logo_styles');
}

if(!function_exists('readanddigest_header_type3_menu_area_styles')) {
    /**
     * Generates styles for header type 3 menu area
     */
    function readanddigest_header_type3_menu_area_styles() {
        global $readanddigest_options;

        $menu_area_header_type3_styles = array();

        if($readanddigest_options['menu_area_height_header_type3'] !== '') {
            $menu_area_header_type3_styles['height'] = readanddigest_filter_px($readanddigest_options['menu_area_height_header_type3']).'px';
        }

        $menu_area_header_type3_color_styles = array();
        if($readanddigest_options['menu_area_background_color'] !== '') {
            $menu_area_header_type3_color_styles['background-color'] = $readanddigest_options['menu_area_background_color'];
        }

        if(readanddigest_options()->getOptionValue('menu_area_border') == 'yes'){
            if(readanddigest_options()->getOptionValue('menu_area_border_color') !== ""){
                $menu_area_header_type3_color_styles['border-top'] = '1px solid '.readanddigest_options()->getOptionValue('menu_area_border_color');
                $menu_area_header_type3_color_styles['border-bottom'] = '1px solid '.readanddigest_options()->getOptionValue('menu_area_border_color');

            }else{
                $menu_area_header_type3_color_styles['border-top'] = '1px solid #e4e4e4';
                $menu_area_header_type3_color_styles['border-bottom'] = '1px solid #e4e4e4';
            }
        }

        echo readanddigest_dynamic_css('.eltdf-header-type3 .eltdf-page-header .eltdf-menu-area', $menu_area_header_type3_styles);
        echo readanddigest_dynamic_css('.eltdf-header-type3 .eltdf-page-header .eltdf-menu-area .eltdf-vertical-align-containers', $menu_area_header_type3_color_styles);
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_header_type3_menu_area_styles');
}

if(!function_exists('readanddigest_sticky_header_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function readanddigest_sticky_header_styles() {
        global $readanddigest_options;

        if($readanddigest_options['sticky_header_background_color'] !== '') {

            $sticky_header_background_color              = $readanddigest_options['sticky_header_background_color'];
            $sticky_header_background_color_transparency = 1;

            if($readanddigest_options['sticky_header_transparency'] !== '') {
                $sticky_header_background_color_transparency = $readanddigest_options['sticky_header_transparency'];
            }

            echo readanddigest_dynamic_css('.eltdf-page-header .eltdf-sticky-header .eltdf-sticky-holder', array('background-color' => readanddigest_rgba_color($sticky_header_background_color, $sticky_header_background_color_transparency)));
        }

        if($readanddigest_options['sticky_header_height'] !== '') {
            $sticky_header_height = readanddigest_filter_px($readanddigest_options['sticky_header_height']);
            $max_height = intval($sticky_header_height * 0.9).'px';

            echo readanddigest_dynamic_css('.eltdf-page-header .eltdf-sticky-header', array('height' => $sticky_header_height.'px'));
            echo readanddigest_dynamic_css('.eltdf-page-header .eltdf-sticky-header .eltdf-sticky-holder .eltdf-logo-wrapper a', array('max-height' => $max_height));
        }

        $sticky_menu_item_styles = array();
        if($readanddigest_options['sticky_color'] !== '') {
            $sticky_menu_item_styles['color'] = $readanddigest_options['sticky_color'];
        }
        if($readanddigest_options['sticky_google_fonts'] !== '-1') {
            $sticky_menu_item_styles['font-family'] = readanddigest_get_formatted_font_family($readanddigest_options['sticky_google_fonts']);
        }
        if($readanddigest_options['sticky_fontsize'] !== '') {
            $sticky_menu_item_styles['font-size'] = $readanddigest_options['sticky_fontsize'].'px';
        }
        if($readanddigest_options['sticky_lineheight'] !== '') {
            $sticky_menu_item_styles['line-height'] = $readanddigest_options['sticky_lineheight'].'px';
        }
        if($readanddigest_options['sticky_texttransform'] !== '') {
            $sticky_menu_item_styles['text-transform'] = $readanddigest_options['sticky_texttransform'];
        }
        if($readanddigest_options['sticky_fontstyle'] !== '') {
            $sticky_menu_item_styles['font-style'] = $readanddigest_options['sticky_fontstyle'];
        }
        if($readanddigest_options['sticky_fontweight'] !== '') {
            $sticky_menu_item_styles['font-weight'] = $readanddigest_options['sticky_fontweight'];
        }
        if($readanddigest_options['sticky_letterspacing'] !== '') {
            $sticky_menu_item_styles['letter-spacing'] = $readanddigest_options['sticky_letterspacing'].'px';
        }

        $sticky_menu_item_selector = array(
            '.eltdf-page-header .eltdf-sticky-header .eltdf-main-menu.eltdf-sticky-nav > ul > li > a'
        );

        echo readanddigest_dynamic_css($sticky_menu_item_selector, $sticky_menu_item_styles);

        $sticky_menu_item_hover_styles = array();
        if($readanddigest_options['sticky_hovercolor'] !== '') {
            $sticky_menu_item_hover_styles['color'] = $readanddigest_options['sticky_hovercolor'];
        }

        $sticky_menu_item_hover_selector = array(
            '.eltdf-page-header .eltdf-sticky-header .eltdf-main-menu.eltdf-sticky-nav > ul > li:hover > a',
            '.eltdf-page-header .eltdf-sticky-header .eltdf-main-menu.eltdf-sticky-nav > ul > li.eltdf-active-item:hover > a'
        );

        echo readanddigest_dynamic_css($sticky_menu_item_hover_selector, $sticky_menu_item_hover_styles);
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_sticky_header_styles');
}

if(!function_exists('readanddigest_main_menu_styles')) {
    /**
     * Generates styles for main menu
     */
    function readanddigest_main_menu_styles() {
        global $readanddigest_options;

        if($readanddigest_options['menu_color'] !== '' || $readanddigest_options['menu_fontsize'] != '' || $readanddigest_options['menu_lineheight'] != '' || $readanddigest_options['menu_fontstyle'] !== '' || $readanddigest_options['menu_fontweight'] !== '' || $readanddigest_options['menu_texttransform'] !== '' || $readanddigest_options['menu_letterspacing'] !== '' || $readanddigest_options['menu_google_fonts'] != "-1") { ?>
            .eltdf-main-menu.eltdf-default-nav > ul > li > a {
            <?php if($readanddigest_options['menu_color']) { ?> color: <?php echo esc_attr($readanddigest_options['menu_color']); ?>; <?php } ?>
            <?php if($readanddigest_options['menu_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $readanddigest_options['menu_google_fonts'])); ?>', sans-serif;
            <?php } ?>
            <?php if($readanddigest_options['menu_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($readanddigest_options['menu_fontsize']); ?>px; <?php } ?>
            <?php if($readanddigest_options['menu_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($readanddigest_options['menu_lineheight']); ?>px; <?php } ?>
            <?php if($readanddigest_options['menu_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($readanddigest_options['menu_fontstyle']); ?>; <?php } ?>
            <?php if($readanddigest_options['menu_fontweight'] !== '') { ?> font-weight: <?php echo esc_attr($readanddigest_options['menu_fontweight']); ?>; <?php } ?>
            <?php if($readanddigest_options['menu_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($readanddigest_options['menu_texttransform']); ?>;  <?php } ?>
            <?php if($readanddigest_options['menu_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($readanddigest_options['menu_letterspacing']); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if($readanddigest_options['menu_hovercolor'] !== '') { ?>
            .eltdf-main-menu.eltdf-default-nav > ul > li:hover > a,
            .eltdf-main-menu.eltdf-default-nav > ul > li.eltdf-active-item:hover > a {
                color: <?php echo esc_attr($readanddigest_options['menu_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($readanddigest_options['menu_activecolor'] !== '') { ?>
            .eltdf-main-menu.eltdf-default-nav > ul > li.eltdf-active-item > a {
                color: <?php echo esc_attr($readanddigest_options['menu_activecolor']); ?>;
            }
        <?php } ?>

        <?php

        $dropdown_styles = array();
        if($readanddigest_options['dropdown_background_color'] !== '') {
            $dropdown_styles['background-color'] = $readanddigest_options['dropdown_background_color'];
        }

        $dropdown_selector = array(
            '.eltdf-drop-down .eltdf-menu-second .eltdf-menu-inner > ul,
            li.eltdf-menu-narrow .eltdf-menu-second .eltdf-menu-inner ul,
            .eltdf-top-bar #lang_sel ul ul'
        );

        echo readanddigest_dynamic_css($dropdown_selector, $dropdown_styles);


    }

    add_action('readanddigest_style_dynamic', 'readanddigest_main_menu_styles');
}