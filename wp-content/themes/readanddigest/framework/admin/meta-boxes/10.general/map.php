<?php

    $general_meta_box = readanddigest_add_meta_box(
        array(
            'scope' => array('page', 'post'),
            'title' => 'General',
            'name' => 'general_meta'
        )
    );

    readanddigest_add_meta_box_field(
        array(
            'parent' => $general_meta_box,
            'type' => 'select',
            'name' => 'eltdf_header_style_meta',
            'default_value' => '',
            'label' => 'Header Style',
            'description' => 'Choose predefined Header style',
            'options' => array(
                '' => '',
                'dark' => 'Dark',
                'light' => 'Light',
                'transparent' => 'Transparent'
            )
        )
    );

    readanddigest_add_meta_box_field(
        array(
            'parent' => $general_meta_box,
            'name' => 'eltdf_logo_position_meta',
            'type' => 'select',
            'default_value' => '',
            'label' => 'Logo position',
            'description' => 'Coose a logo position',
            'options' => array(
                '' => '',
                'center' => 'Center',
                'left' => 'Left'
            )
        )
    );

    readanddigest_add_meta_box_field(
        array(
            'name' => 'eltdf_page_background_color_meta',
            'type' => 'color',
            'default_value' => '',
            'label' => 'Page Background Color',
            'description' => 'Choose background color for page content',
            'parent' => $general_meta_box
        )
    );

    readanddigest_add_meta_box_field(
        array(
            'name'          => 'eltdf_boxed_meta',
            'type'          => 'select',
            'default_value' => '',
            'label'         => 'Boxed Layout',
            'description'   => '',
            'parent'        => $general_meta_box,
            'options'     => array(
                '' => '',
                'yes' => 'Yes',
                'no' => 'No',
            ),
            'args'          => array(
                "dependence" => true,
                'show' => array(
                    '' => '',
                    'yes' => '#eltdf_eltdf_boxed_container_meta',
                    'no' => '',

                ),
                'hide' => array(
                    '' => '#eltdf_eltdf_boxed_container_meta',
                    'yes' => '',
                    'no' => '#eltdf_eltdf_boxed_container_meta',
                )
            )
        )
    );

        $boxed_container = readanddigest_add_admin_container(
            array(
                'parent'            => $general_meta_box,
                'name'              => 'eltdf_boxed_container_meta',
                'hidden_property'   => 'eltdf_boxed_meta',
                'hidden_values'      => array('','no')
            )
        );

            readanddigest_add_meta_box_field(
                array(
                    'name'          => 'eltdf_page_background_color_in_box_meta',
                    'type'          => 'color',
                    'label'         => 'Page Background Color',
                    'description'   => 'Choose the page background color outside box.',
                    'parent'        => $boxed_container
                )
            );

            readanddigest_add_meta_box_field(
                array(
                    'name'          => 'eltdf_boxed_background_image_meta',
                    'type'          => 'image',
                    'label'         => 'Background Image',
                    'description'   => 'Choose an image to be displayed in background',
                    'parent'        => $boxed_container
                )
            );

            readanddigest_add_meta_box_field(
                array(
                    'name'          => 'eltdf_boxed_pattern_background_image_meta',
                    'type'          => 'image',
                    'label'         => 'Background Pattern',
                    'description'   => 'Choose an image to be used as background pattern',
                    'parent'        => $boxed_container
                )
            );

            readanddigest_add_meta_box_field(
                array(
                    'name'          => 'eltdf_boxed_background_image_attachment_meta',
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

    readanddigest_add_meta_box_field(
        array(
            'name' => 'eltdf_page_slider_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => 'Slider Shortcode',
            'description' => 'Paste your slider shortcode here',
            'parent' => $general_meta_box
        )
    );

    $eltdf_content_padding_group = readanddigest_add_admin_group(array(
        'name' => 'content_padding_group',
        'title' => 'Content Style',
        'description' => 'Define styles for Content area',
        'parent' => $general_meta_box
    ));
    
    $eltdf_content_padding_row = readanddigest_add_admin_row(array(
        'name' => 'eltdf_content_padding_row',
        'next' => true,
        'parent' => $eltdf_content_padding_group
    ));
    
    readanddigest_add_meta_box_field(
        array(
            'name'          => 'eltdf_page_content_top_padding',
            'type'          => 'textsimple',
            'default_value' => '',
            'label'         => 'Content Top Padding',
            'parent'        => $eltdf_content_padding_row,
            'args'          => array(
                'suffix' => 'px'
            )
        )
    );
    
    readanddigest_add_meta_box_field(
        array(
            'name'        => 'eltdf_page_content_top_padding_mobile',
            'type'        => 'selectblanksimple',
            'label'       => 'Set this top padding for mobile header',
            'parent'      => $eltdf_content_padding_row,
            'options'     => array(
                'yes' => 'Yes',
                'no' => 'No',
            )
        )
    );

    readanddigest_add_meta_box_field(
        array(
            'name'        => 'eltdf_page_comments_meta',
            'type'        => 'selectblank',
            'label'       => 'Show Comments',
            'description' => 'Enabling this option will show comments on your page',
            'parent'      => $general_meta_box,
            'options'     => array(
                'yes' => 'Yes',
                'no' => 'No',
            )
        )
    );

    if(readanddigest_options() -> getOptionValue('header_type') != 'header-vertical') {
        readanddigest_add_meta_box_field(
            array(
                'name'            => 'eltdf_scroll_amount_for_sticky_meta',
                'type'            => 'text',
                'label'           => 'Scroll amount for sticky header appearance',
                'description'     => 'Define scroll amount for sticky header appearance',
                'parent'          => $general_meta_box,
                'args'            => array(
                    'col_width' => 2,
                    'suffix'    => 'px'
                )
            )
        );
    }

    readanddigest_add_meta_box_field(
        array(
            'name'          => 'eltdf_initial_content_width_meta',
            'type'          => 'select',
            'default_value' => '',
            'label'         => 'Initial Width of Content',
            'description'   => 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid"',
            'parent'        => $general_meta_box,
            'options'       => array(
                "" => "",
                "grid-1300" => "1300px",
                "grid-1200" => "1200px",
                "grid-1100" => "1100px",
                "grid-1000" => "1000px"
            )
        )
    );