<?php $sidebar = readanddigest_sidebar_layout(); ?>
<?php get_header(); ?>
<?php 
$blog_page_range = readanddigest_get_blog_page_range();
$max_number_of_pages = readanddigest_get_max_number_of_pages();

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

$enable_search_page_sidebar = true;
if(readanddigest_options()->getOptionValue('enable_search_page_sidebar') === "no"){
	$enable_search_page_sidebar = false;
}
?>
<?php readanddigest_get_title(); ?>
	<div class="eltdf-container">
		<?php do_action('readanddigest_after_container_open'); ?>
		<div class="eltdf-container-inner clearfix">
			<div class="eltdf-container">
				<?php do_action('readanddigest_after_container_open'); ?>
				<div class="eltdf-container-inner">
					<?php if($enable_search_page_sidebar) { ?>
					<div class="eltdf-two-columns-66-33 eltdf-content-has-sidebar clearfix">
						<div class="eltdf-column1 eltdf-content-left-from-sidebar">
							<div class="eltdf-column-inner">
					<?php } ?>		
								<div class="eltdf-search-page-holder">

									<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<div class="eltdf-post-content">

                                                <div class="eltdf-pt-three-item eltdf-post-item">
                                                    <div class="eltdf-pt-three-item-inner">
                                                        <div class="eltdf-pt-three-item-inner2">

                                                            <div class="eltdf-pt-three-content-holder">
                                                                <h3 class="eltdf-pt-three-title">
                                                                    <a itemprop="url" class="eltdf-pt-link" href="<?php echo esc_url(get_permalink()) ?>" target="_self"><?php echo readanddigest_get_title_substring(get_the_title(), '') ?></a>
                                                                </h3>
                                                                <?php if(get_post_type() === 'post') { ?>
                                                                    <div class="eltdf-pt-three-excerpt">
                                                                        <?php readanddigest_excerpt(15); ?>
                                                                    </div>
                                                                <?php } ?>

                                                                <div class="eltdf-pt-info-section clearfix">
                                                                    <div class="eltdf-pt-info-section-left">
                                                                        <?php readanddigest_post_info_date(array(
                                                                            'date' => 'yes',
                                                                            'date_format' => 'd M Y'
                                                                        )) ?>
                                                                    </div>
                                                                    <div class="eltdf-pt-info-section-right">
                                                                        <?php readanddigest_post_info_comments(array(
                                                                            'comments' => 'yes'
                                                                        )) ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



											</div>
										</article>
									<?php endwhile; ?>
									<?php
										if(readanddigest_options()->getOptionValue('pagination') == 'yes') {
											readanddigest_pagination($max_number_of_pages, $blog_page_range, $paged);
										}
									?>
									<?php else: ?>
									<div class="entry">
										<p><?php esc_html_e('No posts were found.', 'readanddigest'); ?></p>
									</div>
									<?php endif; ?>
								</div>
								<?php do_action('readanddigest_page_after_content'); ?>
					<?php if($enable_search_page_sidebar) { ?>			
							</div>
						</div>
						<div class="eltdf-column2">
							<?php get_sidebar(); ?>
						</div>
					</div>
					<?php } ?>
				<?php do_action('readanddigest_before_container_close'); ?>
				</div>
			</div>
		</div>
		<?php do_action('readanddigest_before_container_close'); ?>
	</div>
<?php get_footer(); ?>