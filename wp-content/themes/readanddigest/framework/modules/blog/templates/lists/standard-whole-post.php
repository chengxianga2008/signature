<div class="eltdf-blog-holder eltdf-blog-type-standard">
	<?php
		if($blog_query->have_posts()) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
      

			readanddigest_get_post_format_html($blog_type);
		endwhile;
		else:
			readanddigest_get_module_template_part('templates/parts/no-posts', 'blog');
		endif;
	?>
</div>
<?php
	if(readanddigest_options()->getOptionValue('pagination') == 'yes') {
		readanddigest_pagination($blog_query->max_num_pages, $blog_page_range, $paged);
	}
?>