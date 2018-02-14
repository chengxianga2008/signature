<div class="eltdf-pt-four-item eltdf-post-item">
    <div class="eltdf-pt-four-item-inner">
        <div class="eltdf-pt-four-content-holder">
            <<?php echo esc_html( $title_tag)?> class="eltdf-pt-four-title">
            <a itemprop="url" class="eltdf-pt-link" href="<?php echo esc_url(get_permalink()) ?>" target="_self"><?php echo readanddigest_get_title_substring(get_the_title(), $title_length) ?></a>
            </<?php echo esc_html($title_tag) ?>>
			<?php if ($display_date == "yes" || $display_author == "yes" || $display_comments == "yes") { ?>
				<div class="eltdf-pt-info-section clearfix">
					<div class="eltdf-pt-info-section-left">
						<?php readanddigest_post_info_date(array(
							'date' => $display_date,
							'date_format' => $date_format
						)) ?>
						<?php readanddigest_post_info_author(array(
							'author' => $display_author
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