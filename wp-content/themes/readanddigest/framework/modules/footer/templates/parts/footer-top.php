<div class="eltdf-footer-top-holder">
	<div class="eltdf-footer-top <?php echo esc_attr($footer_top_classes) ?>">
		<?php if($footer_in_grid) { ?>

		<div class="eltdf-container">
			<div class="eltdf-container-inner">

		<?php }

		switch ($footer_top_columns) {
			case 6:
				readanddigest_get_footer_sidebar_25_25_50();
				break;
			case 5:
				readanddigest_get_footer_sidebar_50_25_25();
				break;
			case 4:
				readanddigest_get_footer_sidebar_four_columns();
				break;
			case 3:
				readanddigest_get_footer_sidebar_three_columns();
				break;
			case 2:
				readanddigest_get_footer_sidebar_two_columns();
				break;
			case 1:
				readanddigest_get_footer_sidebar_one_column();
				break;
		}

		if($footer_in_grid) { ?>
			</div>
		</div>
	<?php } ?>
	</div>
</div>
