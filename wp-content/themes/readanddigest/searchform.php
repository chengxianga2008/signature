<form method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
	<div role="search">
		<input type="text" value="" placeholder="<?php esc_html_e('Search Here', 'readanddigest'); ?>" name="s" id="s" />
		<input type="submit" class="eltdf-search-widget-icon" id="searchsubmit" value="&#x55;">
	</div>
</form>