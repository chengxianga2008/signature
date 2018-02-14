<?php if(readanddigest_options()->getOptionValue('blog_single_tags') == 'yes' && has_tag()){ ?>
	<div class="eltdf-single-tags-holder">
		<h6 class="eltdf-single-tags-title"><?php esc_html_e('POST TAGS:', 'readanddigest'); ?></h6>
		<div class="eltdf-tags">
			<?php the_tags('', '', ''); ?>
		</div>
	</div>
<?php } ?>