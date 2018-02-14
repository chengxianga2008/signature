<?php
$blog_archive_pages_classes = readanddigest_blog_archive_pages_classes(readanddigest_get_default_blog_list());
?>
<?php get_header(); ?>
<?php readanddigest_get_title(); ?>
<div class="<?php echo esc_attr($blog_archive_pages_classes['holder']); ?>">
<?php do_action('readanddigest_after_container_open'); ?>
	<div class="<?php echo esc_attr($blog_archive_pages_classes['inner']); ?>">
		<?php readanddigest_get_blog(readanddigest_get_default_blog_list()); ?>
	</div>
<?php do_action('readanddigest_before_container_close'); ?>
</div>
<?php get_footer(); ?>