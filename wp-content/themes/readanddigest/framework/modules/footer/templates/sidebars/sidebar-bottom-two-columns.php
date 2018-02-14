<div class="eltdf-two-columns-50-50 clearfix">
	<div class="eltdf-two-columns-50-50-inner">
		<div class="eltdf-column">
			<div class="eltdf-column-inner">
				<?php if(is_active_sidebar('footer_bottom_left')) {
					dynamic_sidebar( 'footer_bottom_left' );
				} ?>
			</div>
		</div>
		<div class="eltdf-column">
			<div class="eltdf-column-inner">
				<?php if(is_active_sidebar('footer_bottom_right')) {
					dynamic_sidebar( 'footer_bottom_right' );
				} ?>
			</div>
		</div>
	</div>
</div>