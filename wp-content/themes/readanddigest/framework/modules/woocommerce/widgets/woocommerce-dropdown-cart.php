<?php
class ReadAndDigestWoocommerceDropdownCart extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'eltdf_woocommerce_dropdown_cart', // Base ID
			'Elated Woocommerce Dropdown Cart', // Name
			array( 'description' => esc_html__( 'Elated Woocommerce Dropdown Cart', 'readanddigest' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );
		
		global $woocommerce; 
		global $readanddigest_options;
		
		$cart_style = 'eltdf-with-icon';
		
		?>
		<div class="eltdf-shopping-cart-outer">
			<div class="eltdf-shopping-cart-inner">
				<div class="eltdf-shopping-cart-header">
					<a class="eltdf-header-cart" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>">
						<span class="eltdf-cart-label"><?php esc_html_e('Cart','readanddigest') ?></span>
						<span class="eltdf-cart-no">(<?php echo esc_html($woocommerce->cart->cart_contents_count); ?>)</span>
						<i class="icon_cart_alt"></i>
					</a>
					<div class="eltdf-shopping-cart-dropdown">
						<?php
						$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
						$list_class = array( 'eltdf-cart-list', 'product_list_widget' );
						?>
						<ul>

							<?php if ( !$cart_is_empty ) : ?>

								<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

									$_product = $cart_item['data'];

									// Only display if allowed
									if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
										continue;
									}

									// Get price
									$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();
									?>


									<li>
										<div class="eltdf-item-image-holder">
											<a href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
												<?php echo wp_kses($_product->get_image(), array(
													'img' => array(
														'src' => true,
														'width' => true,
														'height' => true,
														'class' => true,
														'alt' => true,
														'title' => true,
														'id' => true
													)
												)); ?>
											</a>
										</div>
										<div class="eltdf-item-info-holder">
											<div class="eltdf-item-left">
												<a href="<?php echo esc_url(get_permalink( $cart_item['product_id'])); ?>">
													<?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
												</a>
												<?php echo apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
											</div>
											<div class="eltdf-item-right">
												<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon_close"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'readanddigest') ), $cart_item_key ); ?>

											</div>
										</div>
									</li>

								<?php endforeach; ?>
								<div class="eltdf-cart-bottom">
									<div class="eltdf-subtotal-holder clearfix">
										<span class="eltdf-total"><?php esc_html_e( 'Subtotal', 'readanddigest' ); ?>:</span>
										<span class="eltdf-total-amount">
											<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
												'span' => array(
													'class' => true,
													'id' => true
												)
											)); ?>
										</span>
									</div>
									<div class="eltdf-btns-holder clearfix">
										<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="eltdf-btn eltdf-btn-solid eltdf-btn-large view-cart"><?php esc_html_e( 'View Cart', 'readanddigest' ); ?></a>
										<a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="eltdf-btn eltdf-btn-solid eltdf-btn-large checkout"><?php esc_html_e( 'Checkout', 'readanddigest' ); ?></a>
									</div>
								</div>
							<?php else : ?>

								<li class="eltdf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'readanddigest' ); ?></li>

							<?php endif; ?>

						</ul>
						<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

						<?php endif; ?>
						

						<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

}
add_action( 'widgets_init', create_function( '', 'register_widget( "ReadAndDigestWoocommerceDropdownCart" );' ) );
?>
<?php
add_filter('add_to_cart_fragments', 'readanddigest_woocommerce_header_add_to_cart_fragment');
function readanddigest_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();
	?>
	<div class="eltdf-shopping-cart-header">
		<a class="eltdf-header-cart" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>">
			<span class="eltdf-cart-label"><?php esc_html_e('Cart','readanddigest') ?></span>
			<span class="eltdf-cart-no">(<?php echo esc_html($woocommerce->cart->cart_contents_count); ?>)</span>
			<i class="icon_cart_alt"></i>
		</a>		
		<div class="eltdf-shopping-cart-dropdown">
			<?php
			$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
			//$list_class = array( 'eltdf-cart-list', 'product_list_widget' );
			?>
			<ul>

				<?php if ( !$cart_is_empty ) : ?>

					<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

						$_product = $cart_item['data'];

						// Only display if allowed
						if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
							continue;
						}

						// Get price
						$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();
						?>

						<li>
							<div class="eltdf-item-image-holder">
								<?php echo wp_kses($_product->get_image(), array(
									'img' => array(
										'src' => true,
										'width' => true,
										'height' => true,
										'class' => true,
										'alt' => true,
										'title' => true,
										'id' => true
									)
								)); ?>
							</div>
							<div class="eltdf-item-info-holder">
								<div class="eltdf-item-left">
									<a href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
										<?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
									</a>
									<?php echo apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
								</div>
								<div class="eltdf-item-right">
									<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon_close"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'readanddigest') ), $cart_item_key ); ?>

								</div>
							</div>
						</li>

					<?php endforeach; ?>
						<div class="eltdf-cart-bottom">
							<div class="eltdf-subtotal-holder clearfix">
								<span class="eltdf-total"><?php esc_html_e( 'Subtotal', 'readanddigest' ); ?>:</span>
								<span class="eltdf-total-amount">
									<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
										'span' => array(
											'class' => true,
											'id' => true
										)
									)); ?>
								</span>
							</div>
							<div class="eltdf-btns-holder clearfix">
								<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="eltdf-btn eltdf-btn-solid eltdf-btn-large view-cart">
									<?php esc_html_e( 'View Cart', 'readanddigest' ); ?>
								</a>
								<a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="eltdf-btn eltdf-btn-solid eltdf-btn-large checkout">
									<?php esc_html_e( 'Checkout', 'readanddigest' ); ?>
								</a>
							</div>
						</div>
				<?php else : ?>

					<li class="eltdf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'readanddigest' ); ?></li>

				<?php endif; ?>

			</ul>
			<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

			<?php endif; ?>
			

			<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

			<?php endif; ?>
		</div>
	</div>

	<?php
	$fragments['div.eltdf-shopping-cart-header'] = ob_get_clean();
	return $fragments;
}
?>