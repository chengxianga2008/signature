<?php

if ( ! function_exists('readanddigest_general_options_map') ) {
    /**
     * General options page
     */
    function readanddigest_general_options_map() {

        readanddigest_add_admin_page(
            array(
                'slug'  => '',
                'title' => 'General',
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_design_style = readanddigest_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => 'Design Style'
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => 'Font Family',
                'description'   => 'Choose a default Google font for your site',
                'parent' => $panel_design_style
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => 'Additional Google Fonts',
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltdf_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = readanddigest_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'additional_google_fonts_container',
                'hidden_property'   => 'additional_google_fonts',
                'hidden_value'      => 'no'
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => 'Font Family',
                'description'   => 'Choose additional Google font for your site',
                'parent'        => $additional_google_fonts_container
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => 'Font Family',
                'description'   => 'Choose additional Google font for your site',
                'parent'        => $additional_google_fonts_container
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => 'Font Family',
                'description'   => 'Choose additional Google font for your site',
                'parent'        => $additional_google_fonts_container
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => 'Font Family',
                'description'   => 'Choose additional Google font for your site',
                'parent'        => $additional_google_fonts_container
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => 'Font Family',
                'description'   => 'Choose additional Google font for your site',
                'parent'        => $additional_google_fonts_container
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'first_color',
                'type'          => 'color',
                'label'         => 'First Main Color',
                'description'   => 'Choose the most dominant theme color. Default color is #ff1d4d',
                'parent'        => $panel_design_style
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'page_background_color',
                'type'          => 'color',
                'label'         => 'Page Background Color',
                'description'   => 'Choose the background color for page content. Default color is #ffffff',
                'parent'        => $panel_design_style
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'selection_color',
                'type'          => 'color',
                'label'         => 'Text Selection Color',
                'description'   => 'Choose the color users see when selecting text',
                'parent'        => $panel_design_style
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => 'Boxed Layout',
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#eltdf_fixed_image_container",
                    "dependence_show_on_yes" => "#eltdf_boxed_container"
                )
            )
        );

        $boxed_container = readanddigest_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'boxed_container',
                'hidden_property'   => 'boxed',
                'hidden_value'      => 'no'
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'page_background_color_in_box',
                'type'          => 'color',
                'label'         => 'Page Background Color',
                'description'   => 'Choose the page background color outside box.',
                'parent'        => $boxed_container
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'boxed_background_image',
                'type'          => 'image',
                'label'         => 'Background Image',
                'description'   => 'Choose an image to be displayed in background',
                'parent'        => $boxed_container
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'boxed_pattern_background_image',
                'type'          => 'image',
                'label'         => 'Background Pattern',
                'description'   => 'Choose an image to be used as background pattern',
                'parent'        => $boxed_container
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label'         => 'Background Image Attachment',
                'description'   => 'Choose background image attachment',
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed'     => 'Fixed',
                    'scroll'    => 'Scroll'
                )
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => 'grid-1200',
                'label'         => 'Initial Width of Content',
                'description'   => 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid"',
                'parent'        => $panel_design_style,
                'options'       => array(
                    "grid-1200" => "1200px - default",
                    "grid-1300" => "1300px",
                    "grid-1100" => "1100px",
                    "grid-1000" => "1000px"
                )
            )
        );

        readanddigest_add_admin_field(
            array(
                'name' => 'element_appear_amount',
                'type' => 'text',
                'label' => 'Element Appearance',
                'description' => 'For animated elements, set distance (related to browser bottom) to start the animation',
                'parent' => $panel_design_style,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        $panel_settings = readanddigest_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => 'Settings'
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'smooth_scroll',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => 'Smooth Scroll',
                'description'   => 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)',
                'parent'        => $panel_settings
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => 'Show "Back To Top Button"',
                'description'   => 'Enabling this option will display a Back to Top button on every page',
                'parent'        => $panel_settings
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => 'Responsiveness',
                'description'   => 'Enabling this option will make all pages responsive',
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = readanddigest_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => 'Custom Code'
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'custom_css',
                'type'          => 'textarea',
                'label'         => 'Custom CSS',
                'description'   => 'Enter your custom CSS here',
                'parent'        => $panel_custom_code
            )
        );

        readanddigest_add_admin_field(
            array(
                'name'          => 'custom_js',
                'type'          => 'textarea',
                'label'         => 'Custom JS',
                'description'   => 'Enter your custom Javascript here',
                'parent'        => $panel_custom_code
            )
        );

        $google_maps_api_key = readanddigest_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'google_maps_api_key_panel',
                'title' => 'Google Maps API key'
            )
        );

       readanddigest_add_admin_field(
            array(
                'name'          => 'google_maps_api_key',
                'type'          => 'text',
                'label'         => 'Google Maps API key',
                'description'   => 'Enter your Google Maps API key',
                'parent'        =>  $google_maps_api_key
            )
        );
    }

    add_action( 'readanddigest_options_map', 'readanddigest_general_options_map', 1);
}