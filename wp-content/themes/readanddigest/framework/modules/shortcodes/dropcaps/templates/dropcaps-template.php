<?php
/**
 * Dropcaps shortcode template
 */
?>

<span class="eltdf-dropcaps <?php echo esc_attr($dropcaps_class);?>" <?php readanddigest_inline_style($dropcaps_style);?>>
	<?php echo esc_html($letter);?>
</span>