<?php
$slider_shortcode = get_post_meta(readanddigest_get_page_id(), "eltdf_page_slider_meta", true);
if (!empty($slider_shortcode)) { ?>
	<div class="eltdf-slider">
		<div class="eltdf-slider-inner">
			<?php echo do_shortcode(wp_kses_post($slider_shortcode)); // XSS OK ?>
		</div>
	</div>
<?php } ?>