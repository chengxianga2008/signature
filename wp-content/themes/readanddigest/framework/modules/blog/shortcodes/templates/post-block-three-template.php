<div class="eltdf-pb-three-item eltdf-post-item">
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="eltdf-pb-three-image-holder">
			<div class="eltdf-pb-three-image-inner-holder">
				<a itemprop="url" class="eltdf-pb-three-slide-link eltdf-image-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self">
				<?php
					echo readanddigest_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$custom_thumb_image_width,$custom_thumb_image_height);
				?>
				</a>
			</div>
		</div>
	<?php } ?>
	<div class="eltdf-pb-three-content-holder-outer">
		<div class="eltdf-pb-three-content-holder">
			<div class="eltdf-pb-three-content-holder-inner">
					<?php
					readanddigest_post_info_category(array(
						'category' => $display_category
					)); ?>
				<div class="eltdf-pb-three-title-holder">
					<<?php echo esc_html($title_tag)?> class="eltdf-pb-three-title">
					<a itemprop="url" class="eltdf-pt-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self"><?php echo readanddigest_get_title_substring(get_the_title(), $title_length) ?></a>
				</<?php echo esc_html($title_tag) ?>>
				</div>
				<?php if($display_excerpt == 'yes'){ ?>
					<div class="eltdf-pb-three-excerpt">
						<?php readanddigest_excerpt($excerpt_length); ?>
					</div>
				<?php } ?>
				<?php if($display_author == 'yes'){ ?>
				<div class="eltdf-pt-info-section clearfix">
					<div class="eltdf-pbt-author-image">
						<?php echo readanddigest_kses_img(get_avatar(get_the_author_meta('ID'), 30)); ?>
					</div>
					<div class="eltdf-pbt-author">
						<span><?php esc_html_e('By','readanddigest')?></span>
						<?php readanddigest_post_info_author(array(
							'author' => $display_author
						)) ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>