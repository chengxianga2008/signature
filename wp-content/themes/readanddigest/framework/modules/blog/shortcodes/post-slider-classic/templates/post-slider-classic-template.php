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
<li class="eltdf-psc-slide" <?php if ($full_screen == 'no' || ($full_screen == 'yes' && $parallax_effect != 'yes')) readanddigest_inline_style($slider_style); ?> data-thumb="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()))?>" data-posttitle="<?php echo esc_attr(get_the_title()) ?>" data-postcategory="<?php echo esc_attr($output); ?>">
    <?php if ($full_screen == 'yes' && $parallax_effect == 'yes') { ?>
    <div class="eltdf-psc-bgnd-holder" <?php readanddigest_inline_style($slider_style) ?>></div>
    <?php } ?>
    <?php if (has_post_thumbnail() && $full_screen == 'no') { ?>
    <div class="eltdf-psc-image">
        <a itemprop="url" class="eltdf-psc-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self">
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
    <div class="eltdf-psc-content">
        <div class="eltdf-psc-content-inner">
            <div class="eltdf-psc-content-inner2">
            <<?php echo esc_html($title_tag)?> class="eltdf-psc-title">
                <a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>" target="_self"><?php echo esc_attr(get_the_title()) ?></a>
            </<?php echo esc_html($title_tag) ?>>
            <?php readanddigest_post_info_category(array(
                'category' => $display_category
            )) ?>
            <?php if($display_date == 'yes' || $display_author == 'yes' || $display_comments == 'yes'){ ?>
                <div class="eltdf-psc-info">
                    <div class="eltdf-psc-info-section clearfix">
                        <div class="eltdf-psc-author-info">
                            <div class="eltdf-psc-author-image">
                                <?php echo readanddigest_kses_img(get_avatar(get_the_author_meta('ID'), 17)); ?>
                            </div>
                            <div class="eltdf-psc-author">
                                <span><?php esc_html_e('By','readanddigest')?></span>
                                <?php readanddigest_post_info_author(array(
                                    'author' => $display_author
                                )) ?>
                            </div>
                        </div>
                        <?php readanddigest_post_info_date(array(
                            'date' => $display_date,
                            'date_format' => $date_format
                        )) ?>
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
        </div>
    </div>
</li>