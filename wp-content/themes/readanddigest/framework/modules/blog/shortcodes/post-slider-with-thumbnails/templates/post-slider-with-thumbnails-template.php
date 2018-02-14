<?php
$categories = get_the_category();
$output = '';
if (!empty($categories)) {
    foreach( $categories as $category ) {
        $output .= esc_html($category->name);
        break;
    }
}
?>
<li class="eltdf-pswt-slide" data-thumb="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()))?>" data-posttitle="<?php echo esc_attr(get_the_title()) ?>" data-postcategory="<?php echo esc_attr($output); ?>">
    <?php if (has_post_thumbnail()) { ?>
    <div class="eltdf-pswt-image">
        <a itemprop="url" class="eltdf-pswt-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self">
            <?php
                if($thumb_image_size != 'custom_size') {
                    echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
                } elseif($thumb_image_width != '' && $thumb_image_height != ''){
                    echo readanddigest_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$thumb_image_width,$thumb_image_height);
                }
            ?>
        </a>
    </div>
    <?php } ?>
    <div class="eltdf-pswt-content">
        <?php readanddigest_post_info_category(array(
            'category' => $display_category
        )) ?>
        <<?php echo esc_html($title_tag)?> class="eltdf-pswt-title">
            <a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>" target="_self"><?php echo esc_attr(get_the_title()) ?></a>
        </<?php echo esc_html($title_tag) ?>>
        <?php if($display_date == 'yes' || $display_author == 'yes' || $display_comments == 'yes'){ ?>
			<div class="eltdf-pswt-info">
				<div class="eltdf-pswt-info-section clearfix">
					<div class="eltdf-pswt-info-section-left">
						<?php readanddigest_post_info_date(array(
							'date' => $display_date,
							'date_format' => $date_format
						)) ?>
						<?php readanddigest_post_info_like(array(
							'like' => $display_like
						)) ?>
					</div>
					<div class="eltdf-pswt-info-section-right">
						<?php readanddigest_post_info_comments(array(
							'comments' => $display_comments
						)) ?>
					</div>
				</div>
			</div>
        <?php } ?>

    </div>
</li>