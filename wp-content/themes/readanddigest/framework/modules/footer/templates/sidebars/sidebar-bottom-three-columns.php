<div class="eltdf-three-columns clearfix">
	<div class="eltdf-three-columns-inner">
		<div class="eltdf-column">
			<div class="eltdf-column-inner">
				<?php if(is_active_sidebar('footer_bottom_left')) {
					dynamic_sidebar( 'footer_bottom_left' );
				} ?>
			</div>
		</div>
		<div class="eltdf-column">
			<div class="eltdf-column-inner">
				<?php if(is_active_sidebar('footer_text')) {
					dynamic_sidebar( 'footer_text' );
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