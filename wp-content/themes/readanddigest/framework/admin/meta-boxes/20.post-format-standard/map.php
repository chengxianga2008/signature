<?php

    $standard_post_format_meta_box = readanddigest_add_meta_box(
        array(
            'scope' => array('post'),
            'title' => 'Standard Post Format',
            'name'  => 'post_format_standard_meta'
        )
    );

    readanddigest_add_meta_box_field(
        array(
            'name'        => 'eltdf_show_featured_post',
            'type'        => 'select',
            'default_value' => 'no',
            'label'       => 'Set as featured post',
            'description' => 'Enable this option will show this post as featured',
            'parent'      => $standard_post_format_meta_box,
            'options'     => array(
                'no' => 'No',
                'yes' => 'Yes'
            )
        )
    );

    readanddigest_add_meta_box_field(
        array(
            'name'        => 'eltdf_blog_masonry_dimensions',
            'type'        => 'selectblank',
            'label'       => 'Dimensions for Masonry',
            'description' => 'Choose image layout in Blog Masonry shortcode',
            'parent'      => $standard_post_format_meta_box,
			'options'     => array(
				'default'            => 'Default',
				'large-width'        => 'Large width',
				'large-height'       => 'Large height'
			),
			'default_value' => 'default'
        )
    );