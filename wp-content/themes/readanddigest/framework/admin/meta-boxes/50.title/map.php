<?php

$title_meta_box = readanddigest_add_meta_box(
    array(
        'scope' => array('page', 'post'),
        'title' => 'Title',
        'name' => 'title_meta'
    )
);

    readanddigest_add_meta_box_field(
        array(
            'name' => 'eltdf_show_title_area_meta',
            'type' => 'select',
            'default_value' => '',
            'label' => 'Show Title Area',
            'description' => 'Disabling this option will turn off page title area',
            'parent' => $title_meta_box,
            'options' => array(
                '' => '',
                'no' => 'No',
                'yes' => 'Yes'
            ),
            'args' => array(
                "dependence" => true,
                "hide" => array(
                    "" => "",
                    "no" => "#eltdf_eltdf_show_title_area_meta_container",
                    "yes" => ""
                ),
                "show" => array(
                    "" => "#eltdf_eltdf_show_title_area_meta_container",
                    "no" => "",
                    "yes" => "#eltdf_eltdf_show_title_area_meta_container"
                )
            )
        )
    );

    $show_title_area_meta_container = readanddigest_add_admin_container(
        array(
            'parent' => $title_meta_box,
            'name' => 'eltdf_show_title_area_meta_container',
            'hidden_property' => 'eltdf_show_title_area_meta',
            'hidden_value' => 'no'
        )
    );

        readanddigest_add_meta_box_field(
            array(
                'name' => 'eltdf_title_area_content_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => 'Content Alignment',
                'description' => 'Specify title content alignment',
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'left' => 'Left',
                    'center' => 'Center',
                    'right' => 'Right'
                )
            )
        );

        readanddigest_add_meta_box_field(
            array(
                'name' => 'eltdf_title_color_meta',
                'type' => 'color',
                'label' => 'Title Color',
                'description' => 'Choose a color for title text',
                'parent' => $show_title_area_meta_container
            )
        );

        readanddigest_add_meta_box_field(
            array(
                'name' => 'eltdf_title_breadcrumb_color_meta',
                'type' => 'color',
                'label' => 'Title Breadcrumbs Color',
                'description' => 'Choose a color for breadcrumb text',
                'parent' => $show_title_area_meta_container
            )
        );

        readanddigest_add_meta_box_field(
            array(
                'name' => 'eltdf_title_info_color_meta',
                'type' => 'color',
                'label' => 'Title Info Color',
                'description' => 'Choose a color for title info text (only for posts)',
                'parent' => $show_title_area_meta_container
            )
        );

        readanddigest_add_meta_box_field(
            array(
                'name' => 'eltdf_title_area_background_color_meta',
                'type' => 'color',
                'label' => 'Background Color',
                'description' => 'Choose a background color for Title Area',
                'parent' => $show_title_area_meta_container
            )
        );

        readanddigest_add_meta_box_field(
            array(
                'name' => 'eltdf_hide_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => 'Hide Background Image',
                'description' => 'Enable this option to hide background image in Title Area',
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#eltdf_eltdf_hide_background_image_meta_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_background_image_meta_container = readanddigest_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'eltdf_hide_background_image_meta_container',
                'hidden_property' => 'eltdf_hide_background_image_meta',
                'hidden_value' => 'yes'
            )
        );

        readanddigest_add_meta_box_field(
            array(
                'name' => 'eltdf_title_area_background_image_meta',
                'type' => 'image',
                'label' => 'Background Image',
                'description' => 'Choose an Image for Title Area',
                'parent' => $hide_background_image_meta_container
            )
        );

        readanddigest_add_meta_box_field(
            array(
                'name' => 'eltdf_title_area_background_image_responsive_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => 'Background Responsive Image',
                'description' => 'Enabling this option will make Title background image responsive',
                'parent' => $hide_background_image_meta_container,
                'options' => array(
                    '' => '',
                    'no' => 'No',
                    'yes' => 'Yes'
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "",
                        "yes" => "#eltdf_eltdf_title_area_height_meta"
                    ),
                    "show" => array(
                        "" => "#eltdf_eltdf_title_area_height_meta",
                        "no" => "#eltdf_eltdf_title_area_height_meta",
                        "yes" => ""
                    )
                )
            )
        );

        readanddigest_add_meta_box_field(array(
            'name' => 'eltdf_title_area_height_meta',
            'type' => 'text',
            'label' => 'Height',
            'description' => 'Set a height for Title Area',
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

    readanddigest_add_meta_box_field(
        array(
            'name' => 'eltdf_title_area_border_color_meta',
            'type' => 'color',
            'label' => 'Bottom Border Color',
            'description' => 'Choose a bottom border color for Title Area',
            'parent' => $show_title_area_meta_container
        )
    );