<?php
/**
 * Highlight shortcode template
 */
?>

<span class="eltdf-highlight" <?php readanddigest_inline_style($highlight_style);?>>
	<?php echo esc_html($content);?>
</span>