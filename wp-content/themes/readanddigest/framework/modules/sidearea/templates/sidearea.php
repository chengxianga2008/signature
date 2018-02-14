<section class="eltdf-side-menu right">
	<?php if ($show_side_area_title) {
		readanddigest_get_side_area_title();
	} ?>
	<div class="eltdf-close-side-menu-holder">
		<div class="eltdf-close-side-menu-holder-inner">
			<a href="#" target="_self" class="eltdf-close-side-menu">
				<span aria-hidden="true" class="icon_close"></span>
			</a>
		</div>
	</div>
	<?php if(is_active_sidebar('sidearea')) {
		dynamic_sidebar('sidearea');
	} ?>
</section>