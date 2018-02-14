<div class="eltdf-pt-six-item eltdf-post-item">
    <?php if ( has_post_thumbnail() ) { ?>
        <div class="eltdf-pt-six-image-holder">
            <?php
            readanddigest_post_info_category(array(
                'category' => $display_category
            )); ?>
            <a itemprop="url" class="eltdf-pt-six-slide-link eltdf-image-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self">
                <?php
                if($thumb_image_size != 'custom_size') {
                    echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
                }
                elseif($thumb_image_width != '' && $thumb_image_height != ''){
                    echo readanddigest_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$thumb_image_width,$thumb_image_height);
                }
						
				if($display_featured_icon == 'yes' && get_post_meta(get_the_ID(), "eltdf_show_featured_post", true) == "yes") {
				?>
					<span class="eltdf-bnl-featured-icon"><span class="icon_star_alt"></span></span>
				<?php } ?>
            </a>
        </div>
    <?php } ?>
    <div class="eltdf-pt-six-content-holder">
        <div class="eltdf-pt-six-title-holder">
            <<?php echo esc_html($title_tag)?> class="eltdf-pt-six-title">
                <a itemprop="url" class="eltdf-pt-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self"><?php echo readanddigest_get_title_substring(get_the_title(), $title_length) ?></a>
            </<?php echo esc_html($title_tag) ?>>
        </div>
    </div>
    <?php if($display_date == 'yes' || $display_author == 'yes' || $display_comments == 'yes' || $display_like == 'yes'){ ?>
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
                <?php readanddigest_post_info_like(array(
                    'like' => $display_like
                )) ?>
            </div>
        </div>
    <?php } ?>
</div>