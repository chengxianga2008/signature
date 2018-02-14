<div class="eltdf-image-with-hover-info-item">
	<?php foreach ($images as $image) { ?>
		<div class="eltdf-inital-image">
			<?php if(is_array($image_size) && count($image_size)) : ?>
				<?php echo readanddigest_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
			<?php else: ?>
				<?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
			<?php endif; ?>
		</div>
		<?php if(!empty($link) && !empty($link_text)) : ?>
		<?php endif; ?>
		<div class="eltdf-hover-holder">
			<?php if(!empty($link)) : ?>
				<a class="eltdf-image-with-hover-link" href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($target);?>"></a>
			<?php endif; ?>
			<div class="eltdf-hover-holder-inner">
				<div class="eltdf-hover-content">
					<div class="eltdf-hover-content-inner">
						<?php if(!empty($link_text)) { ?>
							<span class="eltdf-image-description-pre"><?php echo esc_attr($link_text); ?></span>
						<?php } ?>
						<?php if($title != '') { ?>
							<h6 class="eltdf-image-title"><?php echo esc_attr($title); ?></h6>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>