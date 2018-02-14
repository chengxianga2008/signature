<div class="eltdf-google-map-holder">
	<div class="eltdf-google-map" id="<?php echo esc_attr($map_id); ?>" <?php print $map_data; ?>></div>
	<?php if ($scroll_wheel == "false") { ?>
		<div class="eltdf-google-map-overlay"></div>
	<?php } ?>
</div>
