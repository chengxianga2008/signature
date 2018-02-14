<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="eltdf-post-content">
		<div class="eltdf-post-image-holder">
			<?php readanddigest_get_module_template_part('templates/parts/audio', 'blog'); ?>
		</div>

		<?php readanddigest_get_module_template_part('templates/lists/parts/title', 'blog'); ?>

		<?php the_content(); ?>

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
		
	</div>
	<?php do_action('readanddigest_before_blog_list_article_closed_tag'); ?>
</article>