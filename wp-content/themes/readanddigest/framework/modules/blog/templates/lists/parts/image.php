<?php

$display_custom_feature_image_width = '';
if(readanddigest_options()->getOptionValue('blog_list_feature_image_max_width') !== ''){
	$display_custom_feature_image_width = intval(readanddigest_options()->getOptionValue('blog_list_feature_image_max_width'));
}
?>
<?php if ( has_post_thumbnail() ) { ?>
	<div class="eltdf-post-image">
		<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php if($display_custom_feature_image_width !== '') {
				the_post_thumbnail(array($display_custom_feature_image_width, 0));
			} else {
				the_post_thumbnail('readanddigest_post_feature_image');
			} ?>
		</a>
	</div>
<?php } ?>