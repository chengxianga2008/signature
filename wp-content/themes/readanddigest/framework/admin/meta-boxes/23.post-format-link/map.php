<?php

/*** Link Post Format ***/

$link_post_format_meta_box = readanddigest_add_meta_box(
	array(
		'scope' => array('post'),
		'title' => 'Link Post Format',
		'name' => 'post_format_link_meta'
	)
);

    readanddigest_add_meta_box_field(
        array(
            'name'        => 'eltdf_post_link_link_meta',
            'type'        => 'text',
            'label'       => 'Link',
            'description' => 'Enter link',
            'parent'      => $link_post_format_meta_box,

        )
    );

