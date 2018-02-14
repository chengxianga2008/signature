<?php
/*
Template Name: Landing Page
*/
$sidebar = readanddigest_sidebar_layout();

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php
        /**
         * readanddigest_header_meta hook
         *
         * @see readanddigest_header_meta() - hooked with 10
         * @see eltd_user_scalable_meta() - hooked with 10
         */
        do_action('readanddigest_header_meta');
        ?>

        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
<div class="eltdf-wrapper">
	<div class="eltdf-wrapper-inner">
		<div class="eltdf-content">
			<div class="eltdf-content-inner">
				<?php get_template_part( 'title' ); ?>
				<?php get_template_part('slider');?>
				<div class="eltdf-full-width">
					<div class="eltdf-full-width-inner">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php if(($sidebar == 'default')||($sidebar == '')) : ?>
								<?php the_content(); ?>
								<?php do_action('readanddigest_page_after_content'); ?>
							<?php elseif($sidebar == 'sidebar-33-right' || $sidebar == 'sidebar-25-right'): ?>
								<div <?php echo readanddigest_sidebar_columns_class(); ?>>
									<div class="eltdf-column1 eltdf-content-left-from-sidebar">
										<div class="eltdf-column-inner">
											<?php the_content(); ?>
											<?php do_action('readanddigest_page_after_content'); ?>
										</div>
									</div>
									<div class="eltdf-column2">
										<?php get_sidebar(); ?>
									</div>
								</div>
							<?php elseif($sidebar == 'sidebar-33-left' || $sidebar == 'sidebar-25-left'): ?>
								<div <?php echo readanddigest_sidebar_columns_class(); ?>>
									<div class="eltdf-column1">
										<?php get_sidebar(); ?>
									</div>
									<div class="eltdf-column2 eltdf-content-right-from-sidebar">
										<div class="eltdf-column-inner">
											<?php the_content(); ?>
											<?php do_action('readanddigest_page_after_content'); ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>