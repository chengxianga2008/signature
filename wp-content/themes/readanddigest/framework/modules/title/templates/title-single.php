<?php do_action('readanddigest_before_page_title'); ?>
<?php if($show_title_area) { ?>

<div class="eltdf-grid">
    <div class="eltdf-title eltdf-breadcrumbs-type <?php echo readanddigest_title_classes(); ?>" style="<?php echo esc_attr($title_height); echo esc_attr($title_background_color); echo esc_attr($title_background_image); ?>" data-height="<?php echo esc_attr(intval(preg_replace('/[^0-9]+/', '', $title_height), 10));?>" <?php echo esc_attr($title_background_image_width); ?>>
        <div class="eltdf-title-image"><?php if($title_background_image_src != ""){ ?><img src="<?php echo esc_url($title_background_image_src); ?>" alt="&nbsp;" /> <?php } ?></div>
        <div class="eltdf-title-holder" <?php readanddigest_inline_style($title_holder_height); ?>>
            <div class="eltdf-container clearfix">
                <div class="eltdf-container-inner">
                    <div class="eltdf-title-subtitle-holder" style="<?php echo esc_attr($title_subtitle_holder_padding); ?>">
                        <div class="eltdf-title-subtitle-holder-inner">
                        	<div class="eltdf-title-cat" <?php readanddigest_inline_style($title_info_color);?>>
								<?php readanddigest_post_info_category(array(
									'category' => $display_category
								)) ?>
							</div>
                            <h1 class="eltdf-title-text" <?php readanddigest_inline_style($title_color);?>><?php readanddigest_title_text(); ?></h1>
                            <?php if (get_post_format(readanddigest_get_page_id()) == 'quote' && get_post_meta(readanddigest_get_page_id(), "eltdf_post_quote_author_meta", true) !== ''){ ?>
								<span class="eltdf-title-single-quote-name">-
									<?php echo get_post_meta(readanddigest_get_page_id(), "eltdf_post_quote_author_meta", true); ?>
								</span>
                            <?php } ?>
							<?php if ($display_author == 'yes' || $display_date == 'yes' || $display_comments == 'yes' || $display_like == "yes" || $display_count == 'yes'){ ?>
	                            <div class="eltdf-title-post-info">
									<div class="eltdf-pt-info-section clearfix" <?php readanddigest_inline_style($title_info_color.$title_border_color); ?>>
										<?php if ($display_author == 'yes'){ ?>
											<div class="eltdf-title-post-author-info">
												<div class="eltdf-title-author-image">
													<?php echo readanddigest_kses_img(get_avatar(get_the_author_meta('ID',$title_author_id), 17)); ?>
												</div>
												<div class="eltdf-title-post-author">
													<span><?php esc_html_e('By','readanddigest')?></span>
													<?php readanddigest_post_info_author(array(
														'author' => $display_author
													)) ?>
												</div>
											</div>
										<?php } ?>
										<?php readanddigest_post_info(array(
											'date' => $display_date,
											'comments' => $display_comments, 
											'like' => $display_like, 
											'count' => $display_count
										)) ?>
									</div>
	                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php do_action('readanddigest_after_page_title'); ?>