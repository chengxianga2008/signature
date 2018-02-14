<?php
include_once get_template_directory().'/theme-includes.php'; // File containing all theme includes/requires at one place
//
function wpse205632_filter_excerpt( $excerpt ) {

    $excerpt = strip_shortcodes( $excerpt );

    return $excerpt;
}
add_filter( 'get_the_excerpt', 'wpse205632_filter_excerpt' );  
//

if(!function_exists('readanddigest_styles')) {
    /**
     * Function that includes theme's core styles
     */
    function readanddigest_styles() {

        //include theme's core styles
        wp_enqueue_style('readanddigest_default_style', ELATED_ROOT.'/style.css');
        wp_enqueue_style('readanddigest_modules', ELATED_ASSETS_ROOT.'/css/modules.min.css');

        wp_deregister_style('font-awesome'); //deresgister font-awesome style from js-composer, since their's is outdated, and it is included with editor render function
        readanddigest_icon_collections()->enqueueStyles();

        wp_enqueue_style('wp-mediaelement');

        //define files afer which style dynamic needs to be included. It should be included last so it can override other files
        $style_dynamic_deps_array = array();
        if(readanddigest_load_woo_assets()) {
            $style_dynamic_deps_array = array('readanddigest_woo');
        }

        //is responsive option turned on?
        if(readanddigest_is_responsive_on()) {
            wp_enqueue_style('readanddigest_modules_responsive', ELATED_ASSETS_ROOT.'/css/modules-responsive.min.css');

            //include proper styles
            if(file_exists(ELATED_ROOT_DIR.'/assets/css/style_dynamic_responsive.css') && readanddigest_is_css_folder_writable() && !is_multisite()) {
                wp_enqueue_style('readanddigest_style_dynamic_responsive', ELATED_ASSETS_ROOT.'/css/style_dynamic_responsive.css', array(), filemtime(ELATED_ROOT_DIR.'/assets/css/style_dynamic_responsive.css'));
            } else {
                wp_enqueue_style('readanddigest_style_dynamic_responsive', ELATED_ASSETS_ROOT.'/css/style_dynamic_responsive.php');
            }
        }

        if(file_exists(ELATED_ROOT_DIR.'/assets/css/style_dynamic.css') && readanddigest_is_css_folder_writable() && !is_multisite()) {
            wp_enqueue_style('readanddigest_style_dynamic', ELATED_ASSETS_ROOT.'/css/style_dynamic.css', $style_dynamic_deps_array, filemtime(ELATED_ROOT_DIR.'/assets/css/style_dynamic.css')); //it must be included after woocommerce styles so it can override it
        } else {
            wp_enqueue_style('readanddigest_style_dynamic', ELATED_ASSETS_ROOT.'/css/style_dynamic.php', $style_dynamic_deps_array); //it must be included after woocommerce styles so it can override it
        }

        //include Visual Composer styles
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            wp_enqueue_style('js_composer_front');
        }
    }

    add_action('wp_enqueue_scripts', 'readanddigest_styles');
}

if(!function_exists('readanddigest_google_fonts_styles')) {
	/**
	 * Function that includes google fonts defined anywhere in the theme
	 */
    function readanddigest_google_fonts_styles() {
        $font_simple_field_array = readanddigest_options()->getOptionsByType('fontsimple');
        if(!(is_array($font_simple_field_array) && count($font_simple_field_array) > 0)) {
            $font_simple_field_array = array();
        }

        $font_field_array = readanddigest_options()->getOptionsByType('font');
        if(!(is_array($font_field_array) && count($font_field_array) > 0)) {
            $font_field_array = array();
        }

        $available_font_options = array_merge($font_simple_field_array, $font_field_array);
        $font_weight_str        = '100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic';

        //define available font options array
        $fonts_array = array();
        foreach($available_font_options as $font_option) {
            //is font set and not set to default and not empty?
            $font_option_value = readanddigest_options()->getOptionValue($font_option);
            if(readanddigest_is_font_option_valid($font_option_value) && !readanddigest_is_native_font($font_option_value)) {
                $font_option_string = $font_option_value.':'.$font_weight_str;
                if(!in_array($font_option_string, $fonts_array)) {
                    $fonts_array[] = $font_option_string;
                }
            }
        }

        wp_reset_postdata();

        $fonts_array         = array_diff($fonts_array, array('-1:'.$font_weight_str));
        $google_fonts_string = implode('|', $fonts_array);

        //default fonts should be separated with %7C because of HTML validation
        $default_font_string = 'Playfair Display:'.$font_weight_str.'|Raleway:'.$font_weight_str;
        $protocol = is_ssl() ? 'https:' : 'http:';

        //is google font option checked anywhere in theme?
        if (count($fonts_array) > 0) {

            //include all checked fonts
            $fonts_full_list = $default_font_string . '|' . str_replace('+', ' ', $google_fonts_string);
            $fonts_full_list_args = array(
                'family' => urlencode($fonts_full_list),
                'subset' => urlencode('latin,latin-ext'),
            );

            $readanddigest_fonts = add_query_arg( $fonts_full_list_args, $protocol.'//fonts.googleapis.com/css' );
            wp_enqueue_style( 'readanddigest_google_fonts', esc_url_raw($readanddigest_fonts), array(), '1.0.0' );

        } else {
            //include default google font that theme is using
            $default_fonts_args = array(
                'family' => urlencode($default_font_string),
                'subset' => urlencode('latin,latin-ext'),
            );
            $readanddigest_fonts = add_query_arg( $default_fonts_args, $protocol.'//fonts.googleapis.com/css' );
            wp_enqueue_style( 'readanddigest_google_fonts', esc_url_raw($readanddigest_fonts), array(), '1.0.0' );
        }

    }

	add_action('wp_enqueue_scripts', 'readanddigest_google_fonts_styles');
}

if(!function_exists('readanddigest_scripts')) {
    /**
     * Function that includes all necessary scripts
     */
    function readanddigest_scripts() {
        global $wp_scripts;

        //init theme core scripts
		wp_enqueue_script( 'jquery-ui-core');
		wp_enqueue_script( 'jquery-ui-tabs');
		wp_enqueue_script( 'wp-mediaelement');

        wp_enqueue_script('readanddigest_third_party', ELATED_ASSETS_ROOT.'/js/third-party.min.js', array('jquery'), false, true);

        if(readanddigest_is_smoth_scroll_enabled()) {
            wp_enqueue_script("readanddigest_smooth_page_scroll", ELATED_ASSETS_ROOT . "/js/smoothPageScroll.js", array(), false, true);
        }

        //include google map api script
       if(readanddigest_options()->getOptionValue('google_maps_api_key') != '') {
            $google_maps_api_key = readanddigest_options()->getOptionValue('google_maps_api_key');
            wp_enqueue_script("google_map_api", "https://maps.googleapis.com/maps/api/js?key=" . $google_maps_api_key,array(),false,true);
        }
        else {
            wp_enqueue_script('google_map_api', '//maps.googleapis.com/maps/api/js', array(), false, true);
        }
        wp_enqueue_script('readanddigest_modules', ELATED_ASSETS_ROOT.'/js/modules.min.js', array('jquery'), false, true);

        //include comment reply script
        $wp_scripts->add_data('comment-reply', 'group', 1);
        if(is_singular()) {
            wp_enqueue_script("comment-reply");
        }

        //include Visual Composer script
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            wp_enqueue_script('wpb_composer_front_js');
        }
    }

    add_action('wp_enqueue_scripts', 'readanddigest_scripts');
}

//defined content width variable
if (!isset( $content_width )) $content_width = 1060;

if(!function_exists('readanddigest_theme_setup')) {
    /**
     * Function that adds various features to theme. Also defines image sizes that are used in a theme
     */
    function readanddigest_theme_setup() {
        //add support for feed links
        add_theme_support('automatic-feed-links');

        //add support for post formats
        add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

        //add theme support for post thumbnails
        add_theme_support('post-thumbnails');

        //add theme support for title tag
        add_theme_support('title-tag');

        //define thumbnail sizes
        add_image_size('readanddigest_square', 550, 550, true);
        add_image_size('readanddigest_landscape', 300, 225, true);
        add_image_size('readanddigest_portrait', 600, 800, true);
        add_image_size('readanddigest_post_feature_image', 1200);
        add_image_size('readanddigest_thumb', 128, 86, true);
        add_image_size('readanddigest_single_post_title', 1200, 580, true);
        add_image_size('readanddigest_large_width', 1100, 550, true);
        add_image_size('readanddigest_large_height', 550, 1100, true);

        load_theme_textdomain( 'readanddigest', get_template_directory().'/languages' );
    }

    add_action('after_setup_theme', 'readanddigest_theme_setup');
}


if(!function_exists('readanddigest_rgba_color')) {
    /**
     * Function that generates rgba part of css color property
     *
     * @param $color string hex color
     * @param $transparency float transparency value between 0 and 1
     *
     * @return string generated rgba string
     */
    function readanddigest_rgba_color($color, $transparency) {
        if($color !== '' && $transparency !== '') {
            $rgba_color = '';

            $rgb_color_array = readanddigest_hex2rgb($color);
            $rgba_color .= 'rgba('.implode(', ', $rgb_color_array).', '.$transparency.')';

            return $rgba_color;
        }
    }
}

if(!function_exists('readanddigest_wp_title_text')) {
    /**
     * Function that sets page's title. Hooks to wp_title filter
     *
     * @param $title string current page title
     * @param $sep string title separator
     *
     * @return string changed title text if SEO plugins aren't installed
     */
    function readanddigest_wp_title_text($title, $sep) {

        //is SEO plugin installed?
        if(readanddigest_seo_plugin_installed()) {
            //don't do anything, seo plugin will take care of it
        } else {
            //get current post id
            $id           = readanddigest_get_page_id();
            $sep          = ' | ';
            $title_prefix = get_bloginfo('name');
            $title_suffix = '';

            //is WooCommerce installed and is current page shop page?
            if(readanddigest_is_woocommerce_installed() && readanddigest_is_woocommerce_shop()) {
                //get shop page id
                $id = readanddigest_get_woo_shop_page_id();
            }

            //set unchanged title variable so we can use it later
            $title_array     = explode($sep, $title);
            $unchanged_title = array_shift($title_array);

            if(empty($title_suffix)) {
                //if current page is front page append site description, else take original title string
                $title_suffix = is_front_page() ? get_bloginfo('description') : $unchanged_title;
            }

            //concatenate title string
            $title = $title_prefix.$sep.$title_suffix;

            //return generated title string
            return $title;
        }
    }

    add_filter('wp_title', 'readanddigest_wp_title_text', 10, 2);
}

if(!function_exists('readanddigest_header_meta')) {
    /**
     * Function that echoes meta data if our seo is enabled
     */
    function readanddigest_header_meta() {

        ?>

        <meta charset="<?php bloginfo('charset'); ?>"/>

        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
        <?php 
    }

    add_action('readanddigest_header_meta', 'readanddigest_header_meta');
}

if(!function_exists('readanddigest_user_scalable_meta')) {
    /**
     * Function that outputs user scalable meta if responsiveness is turned on
     * Hooked to readanddigest_header_meta action
     */
    function readanddigest_user_scalable_meta() {
        //is responsiveness option is chosen?
        if(readanddigest_is_responsive_on()) { ?>
            <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <?php } else { ?>
            <meta name="viewport" content="width=1200,user-scalable=yes">
        <?php }
    }

    add_action('readanddigest_header_meta', 'readanddigest_user_scalable_meta');
}

if(!function_exists('readanddigest_get_page_id')) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 */
	function readanddigest_get_page_id() {

        if(readanddigest_is_woocommerce_installed() && readanddigest_is_woocommerce_shop()) {
            return readanddigest_get_woo_shop_page_id();
        }

		if(is_archive() || is_search() || is_404() || (is_home() && is_front_page())) {
			return -1;
		}

		return get_queried_object_id();
	}
}


if(!function_exists('readanddigest_is_default_wp_template')) {
    /**
     * Function that checks if current page archive page, search, 404 or default home blog page
     * @return bool
     *
     * @see is_archive()
     * @see is_search()
     * @see is_404()
     * @see is_front_page()
     * @see is_home()
     */
    function readanddigest_is_default_wp_template() {
        return is_archive() || is_search() || is_404() || (is_front_page() && is_home());
    }
}

if(!function_exists('readanddigest_get_page_template_name')) {
    /**
     * Returns current template file name without extension
     * @return string name of current template file
     */
    function readanddigest_get_page_template_name() {
        $file_name = '';

        if(!readanddigest_is_default_wp_template()) {
            $file_name_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename(get_page_template()));

            if($file_name_without_ext !== '') {
                $file_name = $file_name_without_ext;
            }
        }

        return $file_name;
    }
}

if(!function_exists('readanddigest_has_shortcode')) {
    /**
     * Function that checks whether shortcode exists on current page / post
     *
     * @param string shortcode to find
     * @param string content to check. If isn't passed current post content will be used
     *
     * @return bool whether content has shortcode or not
     */
    function readanddigest_has_shortcode($shortcode, $content = '') {
        $has_shortcode = false;

        if($shortcode) {
            //if content variable isn't past
            if($content == '') {
                //take content from current post
                $page_id = readanddigest_get_page_id();
                if(!empty($page_id)) {
                    $current_post = get_post($page_id);

                    if(is_object($current_post) && property_exists($current_post, 'post_content')) {
                        $content = $current_post->post_content;
                    }
                }
            }

            //does content has shortcode added?
            if(stripos($content, '['.$shortcode) !== false) {
                $has_shortcode = true;
            }
        }

        return $has_shortcode;
    }
}

if(!function_exists('readanddigest_rewrite_rules_on_theme_activation')) {
    /**
     * Function that flushes rewrite rules on deactivation
     */
    function readanddigest_rewrite_rules_on_theme_activation() {
        flush_rewrite_rules();
    }

    add_action('after_switch_theme', 'readanddigest_rewrite_rules_on_theme_activation');
}

if(!function_exists('readanddigest_get_dynamic_sidebar')) {
    /**
     * Return Custom Widget Area content
     *
     * @return string
     */
    function readanddigest_get_dynamic_sidebar($index = 1) {
        ob_start();
        dynamic_sidebar($index);
        $sidebar_contents = ob_get_clean();

        return $sidebar_contents;
    }
}

if(!function_exists('readanddigest_get_sidebar')) {
    /**
     * Return Sidebar
     *
     * @return string
     */
    function readanddigest_get_sidebar() {

        $id = readanddigest_get_page_id();

        $sidebar = "sidebar";

        if(is_category()) {

            $current_cat_id = readanddigest_get_current_object_id();
            $cat_array = get_option("post_tax_term_$current_cat_id");
            $cat_custom_sidebar = $cat_array['custom_sidebar'];

            $category_custom_sidebar = '';
            if(!empty($cat_custom_sidebar)) {
                $category_custom_sidebar = $cat_custom_sidebar;
            }else if(readanddigest_options()->getOptionValue('blog_custom_category_sidebar') !== ''){
                $category_custom_sidebar = readanddigest_options()->getOptionValue('blog_custom_category_sidebar');
            }

        }

        if (get_post_meta($id, 'eltdf_custom_sidebar_meta', true) !== '') {
            $sidebar = get_post_meta($id, 'eltdf_custom_sidebar_meta', true);
        } else {
            if (is_single() && readanddigest_options()->getOptionValue('blog_single_custom_sidebar') != '' ) {
                $sidebar = esc_attr(readanddigest_options()->getOptionValue('blog_single_custom_sidebar'));
            } elseif (is_archive() && !is_author() && !is_category() && readanddigest_options()->getOptionValue('blog_custom_sidebar') != '') {
                $sidebar = esc_attr(readanddigest_options()->getOptionValue('blog_custom_sidebar'));
            } elseif (is_search() && readanddigest_options()->getOptionValue('search_page_custom_sidebar') != '') {
                $sidebar = esc_attr(readanddigest_options()->getOptionValue('search_page_custom_sidebar'));
            } elseif (is_page() && readanddigest_options()->getOptionValue('page_custom_sidebar') != '') {
                $sidebar = esc_attr(readanddigest_options()->getOptionValue('page_custom_sidebar'));
            } elseif (is_category() && $category_custom_sidebar != '') {
                $sidebar = esc_attr($category_custom_sidebar);
            } elseif (is_author() && readanddigest_options()->getOptionValue('blog_custom_author_sidebar') != '') {
                $sidebar = esc_attr(readanddigest_options()->getOptionValue('blog_custom_author_sidebar'));
            }
        }

        return $sidebar;
    }
}

if( !function_exists('readanddigest_sidebar_columns_class') ) {

    /**
     * Return classes for columns holder when sidebar is active
     *
     * @return array
     */

    function readanddigest_sidebar_columns_class() {

        $sidebar_class = array();
        $sidebar_layout = readanddigest_sidebar_layout();

        switch($sidebar_layout):
            case 'sidebar-33-right':
                $sidebar_class[] = 'eltdf-two-columns-66-33';
                break;
            case 'sidebar-25-right':
                $sidebar_class[] = 'eltdf-two-columns-75-25';
                break;
            case 'sidebar-33-left':
                $sidebar_class[] = 'eltdf-two-columns-33-66';
                break;
            case 'sidebar-25-left':
                $sidebar_class[] = 'eltdf-two-columns-25-75';
                break;

        endswitch;

        $sidebar_class[] = ' eltdf-content-has-sidebar clearfix';

        return readanddigest_class_attribute($sidebar_class);
    }
}

if( !function_exists('readanddigest_sidebar_layout') ) {

    /**
     * Function that check is sidebar is enabled and return type of sidebar layout
     */

    function readanddigest_sidebar_layout() {

        $sidebar_layout = '';
        $page_id        = readanddigest_get_page_id();

        $page_sidebar_meta = get_post_meta($page_id, 'eltdf_sidebar_meta', true);

        $category_sidebar = false;
        if(is_category()) {

            $current_cat_id = readanddigest_get_current_object_id();
            $cat_array = get_option("post_tax_term_$current_cat_id");
            $cat_sidebar = $cat_array['sidebar_layout'];

            if(!empty($cat_sidebar)) {
                $category_sidebar = $cat_sidebar !== 'default' ? true : false;
                $category_sidebar_layout = $cat_sidebar !== 'default' ? $cat_sidebar : '';
            }else if(readanddigest_options()->getOptionValue('category_sidebar_layout') !== 'default'){
                $category_sidebar = true;
                $category_sidebar_layout = readanddigest_options()->getOptionValue('category_sidebar_layout');
            }

        }

        if($page_sidebar_meta !== '' && $page_id !== -1) {
            if($page_sidebar_meta == 'no-sidebar') {
                $sidebar_layout = '';
            } else {
                $sidebar_layout = $page_sidebar_meta;
            }
        } else {
            if(is_single() && readanddigest_options()->getOptionValue('blog_single_sidebar_layout')) {
                $sidebar_layout = esc_attr(readanddigest_options()->getOptionValue('blog_single_sidebar_layout'));
            } elseif((is_archive() || (is_home() && is_front_page())) && !is_author() && !is_category() && readanddigest_options()->getOptionValue('archive_sidebar_layout')) {
                $sidebar_layout = esc_attr(readanddigest_options()->getOptionValue('archive_sidebar_layout'));
            } elseif(is_page() && readanddigest_options()->getOptionValue('page_sidebar_layout')) {
                $sidebar_layout = esc_attr(readanddigest_options()->getOptionValue('page_sidebar_layout'));
            } elseif(is_category() && $category_sidebar) {
                $sidebar_layout = esc_attr($category_sidebar_layout);
            } elseif(is_author() && readanddigest_options()->getOptionValue('author_sidebar_layout')) {
                $sidebar_layout = esc_attr(readanddigest_options()->getOptionValue('author_sidebar_layout'));
            }
        }

        return $sidebar_layout;
    }
}

if( !function_exists('readanddigest_container_style') ) {

    /**
     * Function that return container style
     */

    function readanddigest_container_style($style) {
        $id = readanddigest_get_page_id();
        $class_prefix = readanddigest_get_unique_page_class();

        $container_selector = array(
            $class_prefix.' .eltdf-wrapper-inner',
            $class_prefix.' .eltdf-content',
            $class_prefix.'.eltdf-boxed .eltdf-wrapper .eltdf-wrapper-inner',
            $class_prefix.'.eltdf-boxed .eltdf-wrapper .eltdf-content',
        );

        $container_class = array();
        $page_backgorund_color = get_post_meta($id, "eltdf_page_background_color_meta", true);

        if($page_backgorund_color){
            $container_class['background-color'] = $page_backgorund_color;
        }

        $current_style = readanddigest_dynamic_css($container_selector, $container_class);
        $current_style = $current_style . $style;

        return $current_style;

    }
    add_filter('readanddigest_add_page_custom_style', 'readanddigest_container_style');
}

if( !function_exists('readanddigest_boxed_style') ) {

    /**
     * Function that return container style
     */

    function readanddigest_boxed_style($style) {

        $id = readanddigest_get_page_id();

        $class_prefix = readanddigest_get_unique_page_class();

        $container_selector = array(
            $class_prefix . '.eltdf-boxed'
        );

        $container_style = array();

        if(get_post_meta($id, "eltdf_boxed_meta", true) == 'yes') {
            $page_backgorund_color = get_post_meta($id, "eltdf_page_background_color_in_box_meta", true);
            $page_backgorund_image = get_post_meta($id, "eltdf_boxed_background_image_meta", true);
            $page_backgorund_image_pattern = get_post_meta($id, "eltdf_boxed_pattern_background_image_meta", true);
            $page_backgorund_attachment = get_post_meta($id, "eltdf_boxed_background_image_attachment_meta", true);

            if ($page_backgorund_color) {
                $container_style['background-color'] = $page_backgorund_color;
            }
            if ($page_backgorund_image) {
                $container_style['background-image'] = 'url(' . $page_backgorund_image . ')';
                $container_style['background-position'] = 'center 0px';
                $container_style['background-repeat'] = 'no-repeat';
            }
            if ($page_backgorund_image_pattern) {
                $container_style['background-image'] = 'url(' . $page_backgorund_image_pattern . ')';
                $container_style['background-position'] = '0px 0px';
                $container_style['background-repeat'] = 'repeat';
            }
            if ($page_backgorund_attachment) {
                $container_style['background-attachment'] = $page_backgorund_attachment;
                if ($page_backgorund_attachment == 'fixed') {
                    $container_style['background-size'] = 'cover';
                } else {
                    $container_style['background-size'] = 'contain';
                }
            }
        }
        $current_style = readanddigest_dynamic_css($container_selector, $container_style);

        $current_style = $current_style . $style;
        return $current_style;

    }
    add_filter('readanddigest_add_page_custom_style', 'readanddigest_boxed_style');
}

if( !function_exists('readanddigest_post_classic_slider_responsive_style') ) {

    /**
     * Function that return container style
     */

    function readanddigest_post_classic_slider_responsive_style($style) {
        $id = readanddigest_get_page_id();
        $class_prefix = readanddigest_get_unique_page_class();

        $container_selector = array(
            $class_prefix.' .eltdf-psc-holder.eltdf-psc-full-screen .eltdf-psc-slides .eltdf-psc-content .eltdf-psc-content-inner2'
        );
        $navigation_selector = array(
            $class_prefix.' .eltdf-psc-holder.eltdf-psc-pagination .flex-direction-nav li'
        );

        $container_style = array();
        $navigation_style = array();

        if (readanddigest_get_meta_field_intersect('header_style',$id) == 'transparent') {
            $container_style['padding-top'] = (readanddigest_get_title_content_padding()-80).'px'; //80 is height of info section at the bottom
            $navigation_style['padding-top'] = (readanddigest_get_title_content_padding()).'px';
        }

        $current_style = '@media only screen and (min-width: 1024px) and (max-width: 1400px){';
        $current_style .= readanddigest_dynamic_css($container_selector, $container_style);
        $current_style .= readanddigest_dynamic_css($navigation_selector, $navigation_style);
        $current_style .= '}';
        $current_style = $current_style . $style;

        return $current_style;

    }
    add_filter('readanddigest_add_page_custom_style', 'readanddigest_post_classic_slider_responsive_style');
}

if(!function_exists('readanddigest_get_unique_page_class')) {
    /**
     * Returns unique page class based on post type and page id
     *
     * @return string
     */
    function readanddigest_get_unique_page_class() {
        $id = readanddigest_get_page_id();

        return is_single() ? '.postid-'.$id : '.page-id-'.$id;
    }
}

if(!function_exists('readanddigest_print_custom_css')) {
    /**
     * Prints out custom css from theme options
     */
    function readanddigest_print_custom_css() {
        $custom_css = readanddigest_options()->getOptionValue('custom_css');
        $style = '';
        $custom_css .= apply_filters('readanddigest_add_page_custom_style', $style);

        if($custom_css !== '') {
            wp_add_inline_style( 'readanddigest_modules', $custom_css);
        }
    }

    add_action('wp_enqueue_scripts', 'readanddigest_print_custom_css');
}

if(!function_exists('readanddigest_print_custom_js')) {
    /**
     * Prints out custom css from theme options
     */
    function readanddigest_print_custom_js() {
        $custom_js = readanddigest_options()->getOptionValue('custom_js');
        $output = '';

        if($custom_js !== '') {
            $output .= '<script type="text/javascript" id="readanddigest-custom-js">';
            $output .= '(function($) {';
            $output .= $custom_js;
            $output .= '})(jQuery)';
            $output .= '</script>';
        }

        print $output;
    }

    add_action('wp_footer', 'readanddigest_print_custom_js', 1000);
}


if(!function_exists('readanddigest_get_global_variables')) {
    /**
     * Function that generates global variables and put them in array so they could be used in the theme
     */
    function readanddigest_get_global_variables() {

        $global_variables = array();
        $element_appear_amount = -150;

        $global_variables['eltdfAddForAdminBar'] = is_admin_bar_showing() ? 32 : 0;
        $global_variables['eltdfElementAppearAmount'] = readanddigest_options()->getOptionValue('element_appear_amount') !== '' ? readanddigest_options()->getOptionValue('element_appear_amount') : $element_appear_amount;
        $global_variables['eltdfFinishedMessage'] = esc_html__('No more posts', 'readanddigest');
        $global_variables['eltdfMessage'] = esc_html__('Loading new posts...', 'readanddigest');
        $global_variables['eltdfAjaxUrl'] = admin_url('admin-ajax.php');

        $global_variables = apply_filters('readanddigest_js_global_variables', $global_variables);

        wp_localize_script('readanddigest_modules', 'eltdfGlobalVars', array(
            'vars' => $global_variables
        ));

    }

    add_action('wp_enqueue_scripts', 'readanddigest_get_global_variables');
}

if(!function_exists('readanddigest_per_page_js_variables')) {
    function readanddigest_per_page_js_variables() {
        $per_page_js_vars = apply_filters('readanddigest_per_page_js_vars', array());

        wp_localize_script('readanddigest_modules', 'eltdfPerPageVars', array(
            'vars' => $per_page_js_vars
        ));
    }

    add_action('wp_enqueue_scripts', 'readanddigest_per_page_js_variables');
}

if(!function_exists('readanddigest_content_elem_style_attr')) {
    /**
     * Defines filter for adding custom styles to content HTML element
     */
    function readanddigest_content_elem_style_attr() {
        $styles = apply_filters('readanddigest_content_elem_style_attr', array());

        readanddigest_inline_style($styles);
    }
}

if(!function_exists('readanddigest_is_woocommerce_installed')) {
    /**
     * Function that checks if woocommerce is installed
     * @return bool
     */
    function readanddigest_is_woocommerce_installed() {
        return function_exists('is_woocommerce');
    }
}

if(!function_exists('readanddigest_visual_composer_installed')) {
    /**
     * Function that checks if visual composer installed
     * @return bool
     */
    function readanddigest_visual_composer_installed() {
        //is Visual Composer installed?
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            return true;
        }

        return false;
    }
}

if(!function_exists('readanddigest_seo_plugin_installed')) {
    /**
     * Function that checks if popular seo plugins are installed
     * @return bool
     */
    function readanddigest_seo_plugin_installed() {
        //is 'YOAST' or 'All in One SEO' installed?
        if(defined('WPSEO_VERSION') || class_exists('All_in_One_SEO_Pack')) {
            return true;
        }

        return false;
    }
}

if(!function_exists('readanddigest_contact_form_7_installed')) {
    /**
     * Function that checks if contact form 7 installed
     * @return bool
     */
    function readanddigest_contact_form_7_installed() {
        //is Contact Form 7 installed?
        if(defined('WPCF7_VERSION')) {
            return true;
        }

        return false;
    }
}

if(!function_exists('readanddigest_is_wpml_installed')) {
    /**
     * Function that checks if WPML plugin is installed
     * @return bool
     *
     * @version 0.1
     */
    function readanddigest_is_wpml_installed() {
        return defined('ICL_SITEPRESS_VERSION');
    }
}

if( !function_exists('readanddigest_content_padding_top') ) {

    /**
     * Function that return padding for content
     */

    function readanddigest_content_padding_top($style) {

        $id = readanddigest_get_page_id();
        $current_style = '';

        if(is_single()) {
            $post_type = '.postid-';
        } else {
            $post_type = '.page-id-';
        }

        $content_selector = array(
            $post_type . $id . ' .eltdf-content .eltdf-content-inner > .eltdf-container > .eltdf-container-inner',
            $post_type . $id . ' .eltdf-content .eltdf-content-inner > .eltdf-full-width > .eltdf-full-width-inner',
        );

        $content_class = array();

        $page_padding_top = get_post_meta($id, "eltdf_page_content_top_padding", true);

        if($page_padding_top !== ''){
            if(get_post_meta($id, "eltdf_page_content_top_padding_mobile", true) == 'yes') {
                $content_class['padding-top'] = readanddigest_filter_px($page_padding_top).'px!important';
            }
            else {
                $content_class['padding-top'] = readanddigest_filter_px($page_padding_top).'px';
            }
            $current_style .= readanddigest_dynamic_css($content_selector, $content_class);
        }

        $current_style = $current_style . $style;

        return $current_style;

    }
    add_filter('readanddigest_add_page_custom_style', 'readanddigest_content_padding_top');
}

if(!function_exists('readanddigest_max_image_width_srcset')) {
    /**
     * Set max width for srcset to 1920
     *
     * @return int
     */
    function readanddigest_max_image_width_srcset() {
        return 1920;
    }

    add_filter('max_srcset_image_width', 'readanddigest_max_image_width_srcset');
}

if(!function_exists('readanddigest_get_max_number_of_pages')) {
    /**
     * Function that return max number of posts/pages for pagination
     * @return int
     *
     * @version 0.1
     */
    function readanddigest_get_max_number_of_pages() {
        global $wp_query;

        $max_number_of_pages = 10; //default value
        
        if($wp_query) {
            $max_number_of_pages = $wp_query->max_num_pages;
        }

        return $max_number_of_pages;
    }
}

if(!function_exists('readanddigest_get_current_object_id')) {
    /**
     * Function that return current object id
     * @return int
     *
     * @version 0.1
     */
    function readanddigest_get_current_object_id() {
        global $wp_query;

        $current_object_id = -1; //default value
        
        if($wp_query) {
            $current_object_id = $wp_query->get_queried_object_id();
        }

        return $current_object_id;
    }
}

if(!function_exists('readanddigest_get_blog_page_range')) {
    /**
     * Function that return current page for blog list pagination
     * @return int
     *
     * @version 0.1
     */
    function readanddigest_get_blog_page_range() {
        global $wp_query;

        if(readanddigest_options()->getOptionValue('blog_page_range') != ""){
            $blog_page_range = esc_attr(readanddigest_options()->getOptionValue('blog_page_range'));
        } else{
            $blog_page_range = $wp_query->max_num_pages;
        }

        return $blog_page_range;
    }
}