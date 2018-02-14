<?php
if(!function_exists('readanddigest_design_styles')) {
    /**
     * Generates general custom styles
     */
    function readanddigest_design_styles() {

		if (readanddigest_options()->getOptionValue('google_fonts')){
			$font_family = readanddigest_options()->getOptionValue('google_fonts');
			if(readanddigest_is_font_option_valid($font_family)) {
				echo readanddigest_dynamic_css('body', array('font-family' => readanddigest_get_font_option_val($font_family)));
			}
		}

        if(readanddigest_options()->getOptionValue('first_color') !== "") {
            $color_selector = array(
            	'h6',
                'h1 a:hover', 
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'a:hover',
                'p a:hover',
                '.eltdf-comment-holder .eltdf-comment-links a:hover',
                '.eltdf-post-author-comment .eltdf-comment-info .eltdf-comment-author-label',
                '.eltdf-post-author-comment .eltdf-comment-info .eltdf-comment-mark',
                '.eltdf-post-author-comment .eltdf-comment-text .eltdf-text-holder:before',
                '.eltdf-comment-form > .comment-respond > .comment-reply-title',
                '#submit_comment:hover',
                '.post-password-form input[type="submit"]:hover',
                'input.wpcf7-form-control.wpcf7-submit:hover',
                '.eltdf-top-bar #lang_sel ul li:hover .lang_sel_sel',
                '.eltdf-top-bar #lang_sel ul ul a:hover',
                '.eltdf-main-menu > ul > li.eltdf-active-item > a',
                '.eltdf-main-menu > ul > li:hover > a',
                '.eltdf-main-menu > ul > li.eltdf-active-item > a',
                '.eltdf-drop-down .eltdf-menu-wide .eltdf-menu-second .eltdf-menu-inner > ul > li > a',
                '.eltdf-drop-down .eltdf-menu-wide .eltdf-menu-second .eltdf-menu-inner > ul > li > a .menu_icon_wrapper i',
                '.eltdf-top-bar .widget.widget_nav_menu ul li a:hover',
                '.eltdf-mobile-header .eltdf-mobile-nav a:hover',
                '.eltdf-mobile-header .eltdf-mobile-nav h6:hover',
                '.eltdf-dark .eltdf-main-menu.eltdf-default-nav > ul > li.eltdf-active-item > a',
                '.eltdf-light .eltdf-main-menu.eltdf-default-nav > ul > li.eltdf-active-item > a',
                '.eltdf-transparent .eltdf-main-menu.eltdf-default-nav > ul > li.eltdf-active-item > a',
                'footer .eltdf-footer-bottom-holder .widget.widget_nav_menu ul li a:hover',
                '.eltdf-title .eltdf-title-holder .eltdf-breadcrumbs a',
                '.eltdf-title .eltdf-title-holder .eltdf-breadcrumbs span',
                'aside.eltdf-sidebar .widget a:hover h5',
                '.wpb_widgetised_column .widget a:hover h5',
                'aside.eltdf-sidebar .widget.widget_pages ul li a:hover',
                'aside.eltdf-sidebar .widget.widget_archive ul li a:hover',
                'aside.eltdf-sidebar .widget.widget_categories ul li a:hover',
                'aside.eltdf-sidebar .widget.widget_meta ul li a:hover',
                'aside.eltdf-sidebar .widget.widget_recent_comments ul li a:hover',
                'aside.eltdf-sidebar .widget.widget_nav_menu ul li a:hover',
                '.wpb_widgetised_column .widget.widget_pages ul li a:hover',
                '.wpb_widgetised_column .widget.widget_archive ul li a:hover',
                '.wpb_widgetised_column .widget.widget_categories ul li a:hover',
                '.wpb_widgetised_column .widget.widget_meta ul li a:hover',
                '.wpb_widgetised_column .widget.widget_recent_comments ul li a:hover',
                '.wpb_widgetised_column .widget.widget_nav_menu ul li a:hover',
                'aside.eltdf-sidebar .widget.widget_tag_cloud a:hover',
                '.wpb_widgetised_column .widget.widget_tag_cloud a:hover',
                'aside.eltdf-sidebar .widget.widget_recent_entries a:hover',
                '.wpb_widgetised_column .widget.widget_recent_entries a:hover',
                '.eltdf-btn.eltdf-btn-outline',
                '.eltdf-icon-shortcode .eltdf-icon-element',
                '.eltdf-social-share-holder.eltdf-dropdown .eltdf-social-share-dropdown ul li',
                '.eltdf-tabs .eltdf-tabs-nav li.ui-state-active a',
                '.eltdf-tabs .eltdf-tabs-nav li.ui-state-hover a',
                '.eltdf-tabs.eltdf-tabs-skin-light .eltdf-tabs-nav li.ui-state-active a',
                '.eltdf-tabs.eltdf-tabs-skin-light .eltdf-tabs-nav li.ui-state-hover a',
                '.eltdf-tabs.eltdf-tabs-skin-dark .eltdf-tabs-nav li.ui-state-active a',
                '.eltdf-tabs.eltdf-tabs-skin-dark .eltdf-tabs-nav li.ui-state-hover a',
                '.eltdf-psc-holder .eltdf-psc-slides .eltdf-psc-content .eltdf-post-info-category',
                '.eltdf-psc-holder .eltdf-psc-slides .eltdf-psc-content .eltdf-post-info-category a',
                '.eltdf-psc-holder .eltdf-psc-slides .eltdf-psc-content .eltdf-psc-info-section > div',
                '.eltdf-pswt-holder .eltdf-pswt-slides .eltdf-pswt-content .eltdf-post-info-category',
                '.eltdf-pswt-holder .eltdf-pswt-slides .eltdf-pswt-content .eltdf-post-info-category a',
                '.eltdf-pswt-holder .eltdf-pswt-slides .eltdf-pswt-content .eltdf-pswt-info-section > div > div',
                '.eltdf-pc-holder .eltdf-pc-title',
                '.eltdf-post-item .eltdf-pt-info-section > div > div a:hover',
                '.eltdf-pt-one-item.eltdf-item-hovered .eltdf-pt-one-title a',
                '.eltdf-post-item.eltdf-pt-five-item .eltdf-pt-five-content .eltdf-pt-info-section.eltdf-pt-five-info > div > div',
                '.eltdf-pt-six-item.eltdf-item-hovered .eltdf-pt-six-title a',
                '.eltdf-pt-seven-item.eltdf-item-hovered .eltdf-pt-seven-title a',
                '.eltdf-pt-seven-item .eltdf-pt-seven-image-holder .eltdf-post-info-category a:hover',
                '.eltdf-pt-eight-item.eltdf-item-hovered .eltdf-pt-eight-title a',
                '.eltdf-pt-eight-item .eltdf-pt-eight-image-holder .eltdf-post-info-category a:hover',
                '.eltdf-pb-three-holder .eltdf-pb-three-featured .eltdf-pb-three-item .eltdf-post-info-category',
                '.eltdf-pb-three-holder .eltdf-pb-three-featured .eltdf-pb-three-item .eltdf-post-info-category a',
                '.eltdf-blog-masonry-holder .eltdf-blog-masonry-item .eltdf-pt-info-section > div > div',
                '.eltdf-blog-holder article.sticky .eltdf-post-title a',
                '.eltdf-blog-holder article .eltdf-post-image-holder .eltdf-post-info-category a:hover',
                '.eltdf-blog-holder article .eltdf-post-info > div > div a:hover',
                '.single-post .eltdf-title .eltdf-title-cat',
                '.single-post .eltdf-title .eltdf-pt-info-section',
                '.eltdf-author-description .eltdf-author-description-text-holder .eltdf-author-name span',
                '.eltdf-single-tags-holder .eltdf-tags a:hover',
                '.eltdf-blog-single-navigation .eltdf-blog-single-prev a:hover',
                '.eltdf-blog-single-navigation .eltdf-blog-single-prev h4:hover',
                '.eltdf-blog-single-navigation .eltdf-blog-single-next a:hover',
                '.eltdf-blog-single-navigation .eltdf-blog-single-next h4:hover',
                '.eltdf-related-posts-holder .eltdf-related-content .eltdf-related-info-section > div > div',
                '.eltdf-post-pag-np-horizontal.eltdf-post-layout-light .eltdf-bnl-nav-icon:hover',
                '.eltdf-post-pag-np-horizontal.eltdf-post-layout-dark .eltdf-bnl-nav-icon:hover',
                '.eltdf-bn-holder ul.eltdf-bn-slide .eltdf-bn-text a:hover',
                '.eltdf-rpc-holder .eltdf-rpc-inner ul li .eltdf-rpc-date:hover',
                '.eltdf-top-bar .eltdf-social-icon-widget-holder:hover',
                '.eltdf-footer-bottom-holder .eltdf-social-icon-widget-holder:hover',
                '.eltdf-twitter-widget li .eltdf-tweet-text a',
                '.eltdf-twitter-widget li .eltdf-tweet-text a.eltdf-tweet-time:hover',
                '.eltdf-side-menu-button-opener:hover',
                '.eltdf-image-with-hover-info-item .eltdf-hover-holder .eltdf-hover-holder-inner .eltdf-hover-content .eltdf-hover-content-inner .eltdf-image-description-pre',
                '.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a',
                '.woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover'
            );


            $color_important_selector = array(
            	'.eltdf-pt-two-item.eltdf-item-hovered .eltdf-pt-two-title',
            	'.eltdf-pt-three-item.eltdf-item-hovered .eltdf-pt-three-title'
            );

            $background_color_selector = array(
            	'.eltdf-pagination ul li a:hover',
            	'.eltdf-pagination ul li.active span',
            	'#eltdf-back-to-top > span',
            	'.eltdf-search-menu-holder .eltdf-search-submit',
            	'footer .widget #wp-calendar td#today',
            	'footer .widget.widget_search input[type="submit"]:hover',
            	'footer .widget.widget_tag_cloud a:hover',
            	'.eltdf-search-page-holder .eltdf-search-page-form .eltdf-form-holder .eltdf-search-submit',
            	'aside.eltdf-sidebar .widget #wp-calendar td#today',
            	'.wpb_widgetised_column .widget #wp-calendar td#today',
            	'aside.eltdf-sidebar .widget.widget_search input[type="submit"]',
            	'.wpb_widgetised_column .widget.widget_search input[type="submit"]',
            	'.eltdf-btn.eltdf-btn-solid',
            	'.eltdf-icon-shortcode.circle, .eltdf-icon-shortcode.square',
            	'.wpb_gallery_slides.wpb_flexslider .flex-control-nav li a:hover',
            	'.wpb_gallery_slides.wpb_flexslider .flex-control-nav li a.flex-active',
            	'.eltdf-tabs .eltdf-tabs-nav li.eltdf-tabs-title-holder .eltdf-tabs-title',
            	'.eltdf-psc-holder .flex-control-paging > li a:hover',
            	'.eltdf-psc-holder .flex-control-paging > li a.flex-active',
            	'.eltdf-pswt-holder .flex-direction-nav li:hover',
            	'.eltdf-pc-holder .flex-control-paging > li a:hover',
            	'.eltdf-pc-holder .flex-control-paging > li a.flex-active',
            	'.eltdf-post-item .eltdf-pt-one-image-holder .eltdf-post-info-category:hover',
            	'.eltdf-post-item .eltdf-pt-three-image-holder .eltdf-post-info-category:hover',
            	'.eltdf-post-item .eltdf-pt-six-image-holder .eltdf-post-info-category:hover',
            	'.eltdf-post-item .eltdf-pt-eight-image-holder .eltdf-post-info-category:hover',
            	'.eltdf-bnl-featured-icon',
            	'.eltdf-pt-two-item .eltdf-pt-two-image-holder .eltdf-post-info-count',
            	'.eltdf-pb-three-holder .eltdf-pb-three-non-featured .eltdf-pb-three-nonf-title',
            	'.eltdf-blog-single-share .eltdf-social-share-holder ul li a:hover',
            	'.eltdf-single-links-pages .eltdf-single-links-pages-inner > span',
            	'.eltdf-single-links-pages .eltdf-single-links-pages-inner > a:hover',
            	'.eltdf-post-pag-np-horizontal .eltdf-bnl-navigation-holder .eltdf-paging-button-holder:hover .eltdf-paging-button',
            	'.eltdf-post-pag-np-horizontal .eltdf-bnl-navigation-holder .eltdf-paging-button-holder.eltdf-bnl-paging-active .eltdf-paging-button',
            	'.widget_eltdf_instagram_widget .eltdf-instagram-feed-heading a:hover span',
            	'.widget_eltdf_twitter_widget .eltdf-twitter-widget-heading a:hover span',
                'body:not(.eltdf-light) .eltdf-search-menu-holder .eltdf-search-submit:hover'
            );

            $background_color_important_selector = array(
            	'.eltdf-btn.eltdf-btn-outline:not(.eltdf-btn-custom-hover-bg):hover'
            );
    
            $border_color_selector = array(
            	'.wpcf7-form-control.wpcf7-text:focus',
            	'.wpcf7-form-control.wpcf7-number:focus',
            	'.wpcf7-form-control.wpcf7-date:focus',
            	'.wpcf7-form-control.wpcf7-textarea:focus',
            	'.wpcf7-form-control.wpcf7-select:focus',
            	'.wpcf7-form-control.wpcf7-quiz:focus',
            	'#respond textarea:focus',
            	'#respond input[type="text"]:focus',
            	'.post-password-form input[type="password"]:focus',
            	'.eltdf-search-menu-holder .eltdf-search-field:focus',
            	'.eltdf-dark .eltdf-search-menu-holder .eltdf-search-field:focus',
            	'.eltdf-light .eltdf-search-menu-holder .eltdf-search-field:focus',
            	'.eltdf-search-page-holder .eltdf-search-page-form .eltdf-form-holder .eltdf-search-field:focus',
            	'aside.eltdf-sidebar .widget.widget_search input:not([type="submit"]):focus',
            	'.wpb_widgetised_column .widget.widget_search input:not([type="submit"]):focus',
            	'.eltdf-btn.eltdf-btn-outline',
            	'.eltdf-tabs .eltdf-tabs-nav li.eltdf-tabs-title-holder .eltdf-tabs-title-image',
            	'.eltdf-post-ajax-preloader .eltdf-pulse',
                'body:not(.eltdf-light) .eltdf-search-menu-holder .eltdf-search-submit:hover'
            );

            $border_top_color_selector = array(
            	'.eltdf-search-menu-holder .eltdf-search-submit'
            );

            $border_bottom_color_selector = array(
            	'.eltdf-search-menu-holder .eltdf-search-submit'
            );

            $border_left_color_selector = array(
            	'.eltdf-bnl-featured-icon:after'
            );

            $border_right_color_selector = array(
            	'.eltdf-bnl-featured-icon:after'
            );

            $border_color_important_selector = array(
            	'.eltdf-btn.eltdf-btn-outline:not(.eltdf-btn-custom-border-hover):hover'
            );



            $woo_color_selector = array();
            $woo_background_color_selector = array();
            $woo_background_color_important_selector = array();
            $woo_border_color_selector = array();
            $woo_border_bottom_color_selector = array();

            if(readanddigest_is_woocommerce_installed()) {
                $woo_color_selector = array(
					'.woocommerce .eltdf-product-info-holder .eltdf-product-categories',
					'.woocommerce .eltdf-product-info-holder .price ins',
					'.woocommerce .star-rating span',
					'.eltdf-single-product-summary .price',
					'.eltdf-single-product-summary .product_meta span a',
					'.eltdf-woocommerce-page.eltdf-woocommerce-single-page .woocommerce-tabs ul.tabs > li:hover a',
					'.eltdf-woocommerce-page.eltdf-woocommerce-single-page .woocommerce-tabs ul.tabs > li.active a',
					'.eltdf-woocommerce-page.eltdf-woocommerce-single-page .comment-respond .stars a.active:after',
					'.eltdf-shopping-cart-outer .eltdf-shopping-cart-header .eltdf-cart-no',
					'.eltdf-shopping-cart-dropdown ul li a:hover',
					'.eltdf-shopping-cart-dropdown .eltdf-item-info-holder .eltdf-item-left a:hover',
					'.eltdf-shopping-cart-dropdown .eltdf-item-info-holder .eltdf-item-left .amount',
					'.eltdf-shopping-cart-dropdown span.eltdf-quantity',
					'.eltdf-shopping-cart-dropdown .eltdf-cart-bottom .eltdf-total-amount span',
					'.eltdf-woocommerce-page .eltdf-content .eltdf-quantity-buttons .eltdf-quantity-minus:hover',
					'.eltdf-woocommerce-page .eltdf-content .eltdf-quantity-buttons .eltdf-quantity-plus:hover',
					'.eltdf-woocommerce-page .woocommerce-info .showcoupon:hover',
					'.eltdf-woocommerce-page .eltdf-content input[type="submit"]:hover',
					'.eltdf-woocommerce-page .eltdf-content button[type="submit"]:hover',
					'.eltdf-woocommerce-page table.cart tr.cart_item td.product-name a:hover',
					'.eltdf-woocommerce-page table.cart tr.cart_item td.product-remove a:hover',
					'.woocommerce-page .widget.widget_products ul li .eltdf-widget-product-holder .eltdf-product-widget-cat a',
					'.woocommerce-page .widget.widget_recent_reviews ul li .eltdf-widget-product-holder .eltdf-product-widget-cat a',
					'.woocommerce-page .widget.widget_top_rated_products ul li .eltdf-widget-product-holder .eltdf-product-widget-cat a',
					'.woocommerce-page .widget.widget_products ul li ins',
					'.woocommerce-page .widget.widget_recent_reviews ul li ins',
					'.woocommerce-page .widget.widget_top_rated_products ul li ins',
					'.woocommerce-page .widget.widget_product_categories ul li a:hover',
					'.select2-container .select2-choice:hover',
					'.select2-container .select2-choice:hover .select2-arrow'
                );

                $woo_background_color_selector = array(
                	'.woocommerce-pagination .page-numbers li span.current',
                	'.woocommerce-pagination .page-numbers li a:hover',
                	'.woocommerce-pagination .page-numbers li span:hover',
                	'.woocommerce-pagination .page-numbers li span.current:hover',
                	'.eltdf-woocommerce-page .woocommerce-message a.button.wc-forward',
                	'.woocommerce a.added_to_cart',
                	'.eltdf-woocommerce-page a.button.checkout-button',
                	'.woocommerce-page .widget.widget_price_filter .ui-slider-horizontal .ui-slider-range',
                	'.woocommerce-page .widget.widget_price_filter .button',
                	'.woocommerce-page .widget.widget_product_search input[type="submit"]',
                	'.select2-drop .select2-results .select2-highlighted'
                );

                $woo_background_color_important_selector = array(
                	'.eltdf-shopping-cart-dropdown .eltdf-cart-bottom .checkout:hover',

            	);

                $woo_border_color_selector = array(
                	'.woocommerce-page .widget.widget_product_search .search-field:focus'
                );

                $woo_border_bottom_color_selector = array(
                	'.woocommerce-page .widget.widget_product_tag_cloud .tagcloud a'
                );
            }


            $color_selector = array_merge($color_selector, $woo_color_selector);
            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);
            $background_color_important_selector = array_merge($background_color_important_selector, $woo_background_color_important_selector);
            $border_color_selector = array_merge($border_color_selector, $woo_border_color_selector);
            $border_bottom_color_selector = array_merge($border_bottom_color_selector, $woo_border_bottom_color_selector); 

            echo readanddigest_dynamic_css('::selection', array('background' => readanddigest_options()->getOptionValue('first_color')));
            echo readanddigest_dynamic_css('::-moz-selection', array('background' => readanddigest_options()->getOptionValue('first_color')));
            echo readanddigest_dynamic_css($color_selector, array('color' => readanddigest_options()->getOptionValue('first_color')));
            echo readanddigest_dynamic_css($color_important_selector, array('color' => readanddigest_options()->getOptionValue('first_color').'!important'));
            echo readanddigest_dynamic_css($background_color_selector, array('background-color' => readanddigest_options()->getOptionValue('first_color')));
            echo readanddigest_dynamic_css($background_color_important_selector, array('background-color' => readanddigest_options()->getOptionValue('first_color').'!important'));
            echo readanddigest_dynamic_css($border_color_selector, array('border-color' => readanddigest_options()->getOptionValue('first_color')));
            echo readanddigest_dynamic_css($border_top_color_selector, array('border-top-color' => readanddigest_options()->getOptionValue('first_color')));
            echo readanddigest_dynamic_css($border_bottom_color_selector, array('border-bottom-color' => readanddigest_options()->getOptionValue('first_color')));
            echo readanddigest_dynamic_css($border_left_color_selector, array('border-left-color' => readanddigest_options()->getOptionValue('first_color')));
            echo readanddigest_dynamic_css($border_right_color_selector, array('border-right-color' => readanddigest_options()->getOptionValue('first_color')));
            echo readanddigest_dynamic_css($border_color_important_selector, array('border-color' => readanddigest_options()->getOptionValue('first_color').'!important'));
        }

		if (readanddigest_options()->getOptionValue('page_background_color')) {
			$background_color_selector = array(
				'.eltdf-wrapper-inner',
				'.eltdf-content',
                '.eltdf-boxed .eltdf-wrapper .eltdf-wrapper-inner',
                '.eltdf-boxed .eltdf-wrapper .eltdf-content'
			);
			echo readanddigest_dynamic_css($background_color_selector, array('background-color' => readanddigest_options()->getOptionValue('page_background_color')));
		}

		if (readanddigest_options()->getOptionValue('selection_color')) {
			echo readanddigest_dynamic_css('::selection', array('background' => readanddigest_options()->getOptionValue('selection_color')));
			echo readanddigest_dynamic_css('::-moz-selection', array('background' => readanddigest_options()->getOptionValue('selection_color')));
		}

		$boxed_background_style = array();
		if (readanddigest_options()->getOptionValue('page_background_color_in_box')) {
			$boxed_background_style['background-color'] = readanddigest_options()->getOptionValue('page_background_color_in_box');
		}

		if (readanddigest_options()->getOptionValue('boxed_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(readanddigest_options()->getOptionValue('boxed_background_image')).')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat'] = 'no-repeat';
		}

		if (readanddigest_options()->getOptionValue('boxed_pattern_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(readanddigest_options()->getOptionValue('boxed_pattern_background_image')).')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat'] = 'repeat';
		}

		if (readanddigest_options()->getOptionValue('boxed_background_image_attachment')) {
			$boxed_background_style['background-attachment'] = (readanddigest_options()->getOptionValue('boxed_background_image_attachment'));
            if(readanddigest_options()->getOptionValue('boxed_background_image_attachment') == 'fixed'){
                $boxed_background_style['background-size'] = 'cover';
            }
		}

		echo readanddigest_dynamic_css('.eltdf-boxed', $boxed_background_style);
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_design_styles');
}


if(!function_exists('readanddigest_content_styles')) {
    /**
     * Generates content custom styles
     */
    function readanddigest_content_styles() {

        $content_style = array();
        if (readanddigest_options()->getOptionValue('content_top_padding') !== '') {
            $padding_top = (readanddigest_options()->getOptionValue('content_top_padding'));
            $content_style['padding-top'] = readanddigest_filter_px($padding_top).'px';
        }

        $content_selector = array(
            '.eltdf-content .eltdf-content-inner > .eltdf-full-width > .eltdf-full-width-inner',
        );

        echo readanddigest_dynamic_css($content_selector, $content_style);

        $content_style_in_grid = array();
        $content_style_in_grid_standard_post = array();
        if (readanddigest_options()->getOptionValue('content_top_padding_in_grid') !== '') {
            $padding_top_in_grid = (readanddigest_options()->getOptionValue('content_top_padding_in_grid'));
            $content_style_in_grid['padding-top'] = readanddigest_filter_px($padding_top_in_grid).'px';
            $content_style_in_grid_standard_post['margin-top'] = readanddigest_filter_px($padding_top_in_grid).'px';

        }

        $content_selector_in_grid = array(
            '.eltdf-content-inner > .eltdf-container:first-child',
        );
        $content_selector_in_grid_standard_post = array(
            '.single-post .eltdf-title.eltdf-title-has-thumbnail',
        );



        echo readanddigest_dynamic_css($content_selector_in_grid, $content_style_in_grid);
        echo readanddigest_dynamic_css($content_selector_in_grid_standard_post, $content_style_in_grid_standard_post);

    }

    add_action('readanddigest_style_dynamic', 'readanddigest_content_styles');
}


if (!function_exists('readanddigest_h1_styles')) {

    function readanddigest_h1_styles() {

        $h1_styles = array();

        if(readanddigest_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] = readanddigest_options()->getOptionValue('h1_color');
        }
        if(readanddigest_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = readanddigest_get_formatted_font_family(readanddigest_options()->getOptionValue('h1_google_fonts'));
        }
        if(readanddigest_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h1_fontsize')).'px';
        }
        if(readanddigest_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h1_lineheight')).'px';
        }
        if(readanddigest_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] = readanddigest_options()->getOptionValue('h1_texttransform');
        }
        if(readanddigest_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] = readanddigest_options()->getOptionValue('h1_fontstyle');
        }
        if(readanddigest_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] = readanddigest_options()->getOptionValue('h1_fontweight');
        }
        if(readanddigest_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h1_letterspacing')).'px';
        }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo readanddigest_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_h1_styles');
}

if (!function_exists('readanddigest_h2_styles')) {

    function readanddigest_h2_styles() {

        $h2_styles = array();

        if(readanddigest_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] = readanddigest_options()->getOptionValue('h2_color');
        }
        if(readanddigest_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = readanddigest_get_formatted_font_family(readanddigest_options()->getOptionValue('h2_google_fonts'));
        }
        if(readanddigest_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h2_fontsize')).'px';
        }
        if(readanddigest_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h2_lineheight')).'px';
        }
        if(readanddigest_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] = readanddigest_options()->getOptionValue('h2_texttransform');
        }
        if(readanddigest_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] = readanddigest_options()->getOptionValue('h2_fontstyle');
        }
        if(readanddigest_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] = readanddigest_options()->getOptionValue('h2_fontweight');
        }
        if(readanddigest_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h2_letterspacing')).'px';
        }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo readanddigest_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_h2_styles');
}

if (!function_exists('readanddigest_h3_styles')) {

    function readanddigest_h3_styles() {

        $h3_styles = array();

        if(readanddigest_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] = readanddigest_options()->getOptionValue('h3_color');
        }
        if(readanddigest_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = readanddigest_get_formatted_font_family(readanddigest_options()->getOptionValue('h3_google_fonts'));
        }
        if(readanddigest_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h3_fontsize')).'px';
        }
        if(readanddigest_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h3_lineheight')).'px';
        }
        if(readanddigest_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] = readanddigest_options()->getOptionValue('h3_texttransform');
        }
        if(readanddigest_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] = readanddigest_options()->getOptionValue('h3_fontstyle');
        }
        if(readanddigest_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] = readanddigest_options()->getOptionValue('h3_fontweight');
        }
        if(readanddigest_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h3_letterspacing')).'px';
        }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo readanddigest_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_h3_styles');
}

if (!function_exists('readanddigest_h4_styles')) {

    function readanddigest_h4_styles() {

        $h4_styles = array();

        if(readanddigest_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] = readanddigest_options()->getOptionValue('h4_color');
        }
        if(readanddigest_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = readanddigest_get_formatted_font_family(readanddigest_options()->getOptionValue('h4_google_fonts'));
        }
        if(readanddigest_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h4_fontsize')).'px';
        }
        if(readanddigest_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h4_lineheight')).'px';
        }
        if(readanddigest_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] = readanddigest_options()->getOptionValue('h4_texttransform');
        }
        if(readanddigest_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] = readanddigest_options()->getOptionValue('h4_fontstyle');
        }
        if(readanddigest_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] = readanddigest_options()->getOptionValue('h4_fontweight');
        }
        if(readanddigest_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h4_letterspacing')).'px';
        }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo readanddigest_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_h4_styles');
}

if (!function_exists('readanddigest_h5_styles')) {

    function readanddigest_h5_styles() {

        $h5_styles = array();

        if(readanddigest_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] = readanddigest_options()->getOptionValue('h5_color');
        }
        if(readanddigest_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = readanddigest_get_formatted_font_family(readanddigest_options()->getOptionValue('h5_google_fonts'));
        }
        if(readanddigest_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h5_fontsize')).'px';
        }
        if(readanddigest_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h5_lineheight')).'px';
        }
        if(readanddigest_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] = readanddigest_options()->getOptionValue('h5_texttransform');
        }
        if(readanddigest_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] = readanddigest_options()->getOptionValue('h5_fontstyle');
        }
        if(readanddigest_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] = readanddigest_options()->getOptionValue('h5_fontweight');
        }
        if(readanddigest_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h5_letterspacing')).'px';
        }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo readanddigest_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_h5_styles');
}

if (!function_exists('readanddigest_h6_styles')) {

    function readanddigest_h6_styles() {

        $h6_styles = array();

        if(readanddigest_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] = readanddigest_options()->getOptionValue('h6_color');
        }
        if(readanddigest_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = readanddigest_get_formatted_font_family(readanddigest_options()->getOptionValue('h6_google_fonts'));
        }
        if(readanddigest_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h6_fontsize')).'px';
        }
        if(readanddigest_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h6_lineheight')).'px';
        }
        if(readanddigest_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] = readanddigest_options()->getOptionValue('h6_texttransform');
        }
        if(readanddigest_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] = readanddigest_options()->getOptionValue('h6_fontstyle');
        }
        if(readanddigest_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] = readanddigest_options()->getOptionValue('h6_fontweight');
        }
        if(readanddigest_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('h6_letterspacing')).'px';
        }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo readanddigest_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_h6_styles');
}

if (!function_exists('readanddigest_text_styles')) {

    function readanddigest_text_styles() {

        $text_styles = array();

        if(readanddigest_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = readanddigest_options()->getOptionValue('text_color');
        }
        if(readanddigest_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = readanddigest_get_formatted_font_family(readanddigest_options()->getOptionValue('text_google_fonts'));
        }
        if(readanddigest_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('text_fontsize')).'px';
        }
        if(readanddigest_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('text_lineheight')).'px';
        }
        if(readanddigest_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] = readanddigest_options()->getOptionValue('text_texttransform');
        }
        if(readanddigest_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] = readanddigest_options()->getOptionValue('text_fontstyle');
        }
        if(readanddigest_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = readanddigest_options()->getOptionValue('text_fontweight');
        }
        if(readanddigest_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('text_letterspacing')).'px';
        }

        $text_selector = array(
            'p'
        );

        if (!empty($text_styles)) {
            echo readanddigest_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_text_styles');
}

if (!function_exists('readanddigest_boxy_text_styles')) {

    function readanddigest_boxy_text_styles() {

        $text_styles = array();

        if(readanddigest_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = readanddigest_options()->getOptionValue('text_color');
        }
        if(readanddigest_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('text_fontsize')).'px';
        }
        if(readanddigest_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('text_lineheight')).'px';
        }
        if(readanddigest_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = readanddigest_options()->getOptionValue('text_fontweight');
        }

        $text_selector = array(
            'body'
        );

        if (!empty($text_styles)) {
            echo readanddigest_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_boxy_text_styles');
}

if (!function_exists('readanddigest_link_styles')) {

    function readanddigest_link_styles() {

        $link_styles = array();

        if(readanddigest_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = readanddigest_options()->getOptionValue('link_color');
        }
        if(readanddigest_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = readanddigest_options()->getOptionValue('link_fontstyle');
        }
        if(readanddigest_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = readanddigest_options()->getOptionValue('link_fontweight');
        }
        if(readanddigest_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = readanddigest_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo readanddigest_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_link_styles');
}

if (!function_exists('readanddigest_link_hover_styles')) {

    function readanddigest_link_hover_styles() {

        $link_hover_styles = array();

        if(readanddigest_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = readanddigest_options()->getOptionValue('link_hovercolor');
        }
        if(readanddigest_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = readanddigest_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo readanddigest_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(readanddigest_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = readanddigest_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo readanddigest_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_link_hover_styles');
}

if (!function_exists('readanddigest_sidebar_styles')) {

    function readanddigest_sidebar_styles() {

        $sidebar_styles = array();

        if(readanddigest_options()->getOptionValue('sidebar_background_color') !== '') {
            $sidebar_styles['background-color'] = readanddigest_options()->getOptionValue('sidebar_background_color');
        }

        if(readanddigest_options()->getOptionValue('sidebar_padding_top') !== '') {
            $sidebar_styles['padding-top'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('sidebar_padding_top')).'px';
        }

        if(readanddigest_options()->getOptionValue('sidebar_padding_right') !== '') {
            $sidebar_styles['padding-right'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('sidebar_padding_right')).'px';
        }

        if(readanddigest_options()->getOptionValue('sidebar_padding_bottom') !== '') {
            $sidebar_styles['padding-bottom'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('sidebar_padding_bottom')).'px';
        }

        if(readanddigest_options()->getOptionValue('sidebar_padding_left') !== '') {
            $sidebar_styles['padding-left'] = readanddigest_filter_px(readanddigest_options()->getOptionValue('sidebar_padding_left')).'px';
        }

        if(readanddigest_options()->getOptionValue('sidebar_alignment') !== '') {
            $sidebar_styles['text-align'] = readanddigest_options()->getOptionValue('sidebar_alignment');
        }

        if (!empty($sidebar_styles)) {
            echo readanddigest_dynamic_css('aside.eltdf-sidebar', $sidebar_styles);
        }
    }

    add_action('readanddigest_style_dynamic', 'readanddigest_sidebar_styles');
}