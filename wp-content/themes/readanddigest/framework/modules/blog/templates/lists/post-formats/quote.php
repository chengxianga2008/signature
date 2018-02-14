<?php
$featured_image = '';
if ( has_post_thumbnail() ) {
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
	$featured_image = "background-image: url('".$thumb_url[0]."');";
} 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="eltdf-post-content" <?php readanddigest_inline_style($featured_image); ?>>
		<div class="eltdf-post-text">
			<div class="eltdf-post-text-inner clearfix">
				<div class="eltdf-post-title">
					<h2 class="eltdf-quote-text">"<?php the_title(); ?>"</h2>
					<?php if (get_post_meta(get_the_ID(), "eltdf_post_quote_author_meta", true) !== '') { ?>
						<span class="eltdf-quote-author">-<?php echo esc_html(get_post_meta(get_the_ID(), "eltdf_post_quote_author_meta", true)); ?></span>
					<?php } ?>
				</div>

				<?php if($display_date == 'yes' || $display_author == 'yes' || $display_category == 'yes' || $display_comments == 'yes' || $display_like == 'yes' || $display_share == 'yes'){ ?>
				<div class="eltdf-post-info clearfix">
					<div class="eltdf-post-info-left">
						<?php
						readanddigest_post_info_date(array(
							'date' => $display_date
						));
						readanddigest_post_info_author(array(
							'author' => $display_author
						));
						readanddigest_post_info_category(array(
							'category' => $display_category
						));
						?>
					</div>
					<div class="eltdf-post-info-right">
						<?php
						readanddigest_post_info_comments(array(
							'comments' => $display_comments
						));
						readanddigest_post_info_like(array(
							'like' => $display_like
						));				
						readanddigest_post_info_share(array(
							'share' => $display_share
						));
						?>
					</div>
				</div>
				<?php } ?>
				<a itemprop="url" class="eltdf-post-quote-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
			</div>
		</div>
	</div>
	<?php do_action('readanddigest_before_blog_list_article_closed_tag'); ?>
</article>