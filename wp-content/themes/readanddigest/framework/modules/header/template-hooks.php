<?php

//top header bar
add_action('readanddigest_before_page_header', 'readanddigest_get_header_top');

//mobile header
add_action('readanddigest_after_page_header', 'readanddigest_get_mobile_header');