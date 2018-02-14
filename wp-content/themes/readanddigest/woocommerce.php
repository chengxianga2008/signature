<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php

global $woocommerce;

$id = get_option('woocommerce_shop_page_id');
$shop = get_post($id);
$sidebar = readanddigest_sidebar_layout();

if(get_post_meta($id, 'eltdf_page_background_color_meta', true) != ''){
	$background_color = 'background-color: '.esc_attr(get_post_meta($id, 'eltdf_page_background_color_meta', true));
}else{
	$background_color = '';
}

$content_style = '';
if(get_post_meta($id, 'eltdf_page_content_top_padding', true) != '') {
	if(get_post_meta($id, 'eltdf_page_content_top_padding_mobile', true) == 'yes') {
		$content_style = 'padding-top:'.esc_attr(get_post_meta($id, 'eltdf_page_content_top_padding', true)).'px !important';
	} else {
		$content_style = 'padding-top:'.esc_attr(get_post_meta($id, 'eltdf_page_content_top_padding', true)).'px';
	}
}

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
	$paged = get_query_var('page');
} else {
	$paged = 1;
}

get_header();
readanddigest_get_title();
get_template_part('slider');
?>

<div class="eltdf-container" <?php readanddigest_inline_style($background_color); ?>>
	<div class="eltdf-container-inner clearfix" <?php readanddigest_inline_style($content_style); ?>>
		<?php
			//Woocommerce content
			if ( ! is_singular('product') ) {

				switch( $sidebar ) {
					case 'sidebar-33-right': ?>
						<div class="eltdf-two-columns-66-33 eltdf-content-has-sidebar eltdf-woocommerce-with-sidebar clearfix">
							<div class="eltdf-column1">
								<div class="eltdf-column-inner">
									<?php readanddigest_woocommerce_content(); ?>
								</div>
							</div>
							<div class="eltdf-column2">
								<?php get_sidebar();?>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-25-right': ?>
						<div class="eltdf-two-columns-75-25 eltdf-content-has-sidebar eltdf-woocommerce-with-sidebar clearfix">
							<div class="eltdf-column1 eltdf-content-left-from-sidebar">
								<div class="eltdf-column-inner">
									<?php readanddigest_woocommerce_content(); ?>
								</div>
							</div>
							<div class="eltdf-column2">
								<?php get_sidebar();?>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-33-left': ?>
						<div class="eltdf-two-columns-33-66 eltdf-content-has-sidebar eltdf-woocommerce-with-sidebar clearfix">
							<div class="eltdf-column1">
								<?php get_sidebar();?>
							</div>
							<div class="eltdf-column2">
								<div class="eltdf-column-inner">
									<?php readanddigest_woocommerce_content(); ?>
								</div>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-25-left': ?>
						<div class="eltdf-two-columns-25-75 eltdf-content-has-sidebar eltdf-woocommerce-with-sidebar clearfix">
							<div class="eltdf-column1">
								<?php get_sidebar();?>
							</div>
							<div class="eltdf-column2 eltdf-content-right-from-sidebar">
								<div class="eltdf-column-inner">
									<?php readanddigest_woocommerce_content(); ?>
								</div>
							</div>
						</div>
					<?php
						break;
					default:
						readanddigest_woocommerce_content();
				}

			} else {
				readanddigest_woocommerce_content();
			} ?>

			</div>
	</div>
<?php get_footer(); ?>