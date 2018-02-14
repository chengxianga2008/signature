<?php

/***** Get current author page ID and meta boxes options from author admin panel *****/
$author_id = readanddigest_get_current_object_id();

$blog_page_range = readanddigest_get_blog_page_range();
$max_number_of_pages = readanddigest_get_max_number_of_pages();

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

/***** Set params for posts on author page *****/

$params = '';
$params .= ' author_id="'.$author_id.'"';

$number_of_posts = 8;
$params .= ' number_of_posts="'.$number_of_posts.'"';	

$column_number = 1;
$params .= ' column_number="'.$column_number.'"';

$display_excerpt = 'no';
$params .= ' display_excerpt="'.$display_excerpt.'"';

?>

<div class="eltdf-unique-author-layout clearfix">
	<div class="eltdf-author-description">
		<div class="eltdf-author-description-inner">
			<div class="eltdf-author-description-image">
				<?php echo readanddigest_kses_img(get_avatar(get_the_author_meta( 'ID' ), 105)); ?>
			</div>
			<div class="eltdf-author-description-text-holder">
				<h5 class="eltdf-author-name vcard author">
					<?php
						if(get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
							echo esc_attr(get_the_author_meta('first_name')) . " " . esc_attr(get_the_author_meta('last_name'));
						} else {
							echo esc_attr(get_the_author_meta('display_name'));
						}
					?>
					<span><?php esc_html_e('/ Author', 'readanddigest' ); ?></span>
				</h5>
				<?php if(is_email(get_the_author_meta('email'))){ ?>
					<p class="eltdf-author-email"><?php echo sanitize_email(get_the_author_meta('email')); ?></p>
				<?php } ?>
				<?php if(get_the_author_meta('description') != "") { ?>
					<div class="eltdf-author-text">
						<p><?php echo esc_attr(get_the_author_meta('description')); ?></p>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

    <?php
    	echo do_shortcode("[eltdf_post_layout_five $params]");
	?>
	<?php
		if(readanddigest_options()->getOptionValue('pagination') == 'yes') {
			readanddigest_pagination($max_number_of_pages, $blog_page_range, $paged);
		}
	?>
</div>