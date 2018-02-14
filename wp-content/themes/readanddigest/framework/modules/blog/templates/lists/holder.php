<?php if(($sidebar == 'default')||($sidebar == '')) : ?>
	<?php readanddigest_get_blog_type($blog_type); ?>
<?php elseif($sidebar == 'sidebar-33-right' || $sidebar == 'sidebar-25-right'): ?>
	<div <?php echo readanddigest_sidebar_columns_class(); ?>>
		<div class="eltdf-column1 eltdf-content-left-from-sidebar">
			<div class="eltdf-column-inner">
        
				<?php readanddigest_get_blog_type($blog_type); ?>
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
				<?php readanddigest_get_blog_type($blog_type); ?>
			</div>
		</div>
	</div>
<?php endif; ?>

