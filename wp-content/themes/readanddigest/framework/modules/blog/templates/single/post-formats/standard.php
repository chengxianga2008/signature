<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="eltdf-post-content">
		<div class="eltdf-post-text">
			<div class="eltdf-post-text-inner clearfix">
        
        <h1 class="eltdf-title-text newtitle"> <?php the_title();?></h1>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<?php do_action('readanddigest_before_blog_article_closed_tag'); ?>
</article>