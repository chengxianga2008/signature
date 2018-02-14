<div class="eltdf-pt-two-item eltdf-post-item">
	<div class="eltdf-pt-two-item-inner">
		<?php if(has_post_thumbnail()){ ?>
			<div class="eltdf-pt-two-image-holder">
				<a itemprop="url" class="eltdf-pt-two-link eltdf-image-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self" <?php readanddigest_inline_style($image_style); ?>>
					<?php
						echo readanddigest_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$thumb_image_width,$thumb_image_height);

					if($display_featured_icon == 'yes' && get_post_meta(get_the_ID(), "eltdf_show_featured_post", true) == "yes") {
					?>
						<span class="eltdf-bnl-featured-icon"><span class="icon_star_alt"></span></span>
					<?php } ?>
				<?php readanddigest_post_info_count(array(
					'count' => $display_count
				)) ?>
				</a>
			</div>
		<?php } ?>
		<div class="eltdf-pt-two-content-holder">
			<div class="eltdf-pt-two-content-holder-inner">
				<div class="eltdf-pt-two-content-top-holder">
					<<?php echo esc_html( $title_tag)?> class="eltdf-pt-two-title">
					<a itemprop="url" class="eltdf-pt-link" href="<?php echo esc_url(get_permalink()) ?>" target="_self">
						<?php echo readanddigest_get_title_substring(get_the_title(), $title_length) ?>
					</a>
					</<?php echo esc_html($title_tag) ?>>
					<?php if($display_excerpt == 'yes'){ ?>
						<div class="eltdf-pt-two-excerpt">
							<?php readanddigest_excerpt($excerpt_length); ?>
						</div>
					<?php } ?>
				</div>
				<?php if ($display_date == "yes" || $display_comments == "yes") { ?>
				<div class="eltdf-pt-two-content-bottom-holder">
					<div class="eltdf-pt-info-section clearfix">
						<div class="eltdf-pt-info-section-left">
							<?php readanddigest_post_info_date(array(
								'date' => $display_date,
								'date_format' => $date_format
							)) ?>
						</div>
						<div class="eltdf-pt-info-section-right">
							<?php readanddigest_post_info_comments(array(
								'comments' => $display_comments
							));
							if (!has_post_thumbnail()){
								readanddigest_post_info_count(array(
									'count' => $display_count
								));
							}
							?>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>