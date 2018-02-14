<div class="eltdf-post-item eltdf-blog-masonry-item <?php echo esc_attr($type);?>">
	<div class="eltdf-blog-masonry-item-inner">
		<div class="eltdf-masonry-content-outer">
			<?php if (has_post_thumbnail()){ ?>
				<div class="eltdf-masonry-image">
					<a itemprop="url" class="eltdf-masonry-link eltdf-image-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self">
						<?php
							echo get_the_post_thumbnail(get_the_ID(), $image_size);
						
						if($display_featured_icon == 'yes' && get_post_meta(get_the_ID(), "eltdf_show_featured_post", true) == "yes") {
						?>
							<span class="eltdf-bnl-featured-icon"><span class="icon_star_alt"></span></span>
						<?php } ?>
					</a>
				</div>
			<?php } ?>
			<div class="eltdf-masonry-content">
				<<?php echo esc_html($title_tag)?> class="eltdf-masonry-title">
					<a itemprop="url" class="eltdf-pt-link" href="<?php echo esc_url(get_permalink()) ?>" target="_self"><?php echo readanddigest_get_title_substring(get_the_title(), $title_length) ?></a>
				</<?php echo esc_html($title_tag) ?>>
				<?php if ($display_date == "yes" || $display_comments == "yes") { ?>
					<div class="eltdf-pt-info-section eltdf-masonry-info clearfix">
						<div class="eltdf-pt-info-section-left">
							<?php readanddigest_post_info_date(array(
								'date' => $display_date,
								'date_format' => $date_format
							)) ?>
						</div>
						<div class="eltdf-pt-info-section-right">
							<?php readanddigest_post_info_comments(array(
								'comments' => $display_comments
							)) ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>	
</div>