<?php

if (!function_exists('readanddigest_woocommerce_products_per_page')) {
	/**
	 * Function that sets number of products per page. Default is 12
	 * @return int number of products to be shown per page
	 */
	function readanddigest_woocommerce_products_per_page() {

		$products_per_page = 12;

		if (readanddigest_options()->getOptionValue('eltdf_woo_products_per_page')) {
			$products_per_page = readanddigest_options()->getOptionValue('eltdf_woo_products_per_page');
		}

		return $products_per_page;
	}
}

if (!function_exists('readanddigest_woocommerce_related_products_args')) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 * @param $args array array of args for the query
	 * @return mixed array of changed args
	 */
	function readanddigest_woocommerce_related_products_args($args) {

		if (readanddigest_options()->getOptionValue('eltdf_woo_product_list_columns')) {

			$related = readanddigest_options()->getOptionValue('eltdf_woo_product_list_columns');
			switch ($related) {
				case 'eltdf-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'eltdf-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 3;
			}

		} else {
			$args['posts_per_page'] = 3;
		}

		return $args;
	}
}

if (!function_exists('readanddigest_woocommerce_template_loop_product_title')) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function readanddigest_woocommerce_template_loop_product_title() {

		$tag = readanddigest_options()->getOptionValue('eltdf_products_list_title_tag');
		if($tag === '') {
			$tag = 'h4';
		}
		the_title('<' . $tag . ' class="eltdf-product-list-product-title"><a href="'.get_the_permalink().'">', '</a></' . $tag . '>');
	}
}

if (!function_exists('readanddigest_woocommerce_template_single_title')) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function readanddigest_woocommerce_template_single_title() {

		$tag = readanddigest_options()->getOptionValue('eltdf_single_product_title_tag');
		if($tag === '') {
			$tag = 'h1';
		}
		the_title('<' . $tag . '  itemprop="name" class="eltdf-single-product-title">', '</' . $tag . '>');
	}
}

if (!function_exists('readanddigest_woocommerce_sale_flash')) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function readanddigest_woocommerce_sale_flash() {

		return '<span class="eltdf-onsale">' . esc_html__('Sale', 'readanddigest') . '</span>';
	}
}

if (!function_exists('readanddigest_woocommerce_loop_add_to_cart_link')) {
	/**
	 * Function that overrides default woocommerce add to cart button on product list
	 * Uses HTML from eltdf_button
	 *
	 * @return mixed|string
	 */
	function readanddigest_woocommerce_loop_add_to_cart_link() {

		global $product;

		$button_url = $product->add_to_cart_url();
		$button_classes = sprintf('%s product_type_%s ajax_add_to_cart button',
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
			esc_attr( $product->product_type )
		);
		$button_text = $product->add_to_cart_text();
		$button_attrs = array(
			'rel' => 'nofollow',
			'data-product_id' => esc_attr( $product->id ),
			'data-product_sku' => esc_attr( $product->get_sku() ),
			'data-quantity' => esc_attr( isset( $quantity ) ? $quantity : 1 )
		);


		$add_to_cart_button = readanddigest_get_button_html(
			array(
				'link'			=> $button_url,
				'custom_class'	=> $button_classes,
				'text'			=> $button_text,
				'custom_attrs'	=> $button_attrs
			)
		);

		return $add_to_cart_button;
	}
}

if (!function_exists('readanddigest_woocommerce_loop_categories')){
	/**
	 * Function that overrides default woocommerce add to cart button on product list
	 * Uses HTML from eltdf_button
	 *
	 * @return mixed|string
	 */
	function readanddigest_woocommerce_loop_categories(){

		global $product;

		?>
		<span class="eltdf-product-categories">
			<?php echo wp_kses($product->get_categories(', '), array('a' => array('href' => true,'rel' => true,'class' => true,'title' => true,'id' => true))); ?>
		</span>

		<?php 

	}
}