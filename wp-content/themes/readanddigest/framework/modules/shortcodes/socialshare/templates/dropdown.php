<div class="eltdf-social-share-holder eltdf-dropdown">
	<a href="javascript:void(0)" target="_self" class="eltdf-social-share-dropdown-opener">
		<span class="eltdf-social-share-title"><?php esc_html_e('Share', 'readanddigest') ?></span>
	</a>
	<div class="eltdf-social-share-dropdown">
		<ul>
			<?php foreach (array_reverse($networks) as $net) {
				print $net;
			} ?>
		</ul>
	</div>
</div>