<a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php readanddigest_inline_style($button_styles); ?> <?php readanddigest_class_attribute($button_classes); ?> <?php echo readanddigest_get_inline_attrs($button_data); ?> <?php echo readanddigest_get_inline_attrs($button_custom_attrs); ?>>
    <span class="eltdf-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo readanddigest_icon_collections()->renderIcon($icon, $icon_pack, array(
    	'icon_attributes' => array(
    		'class' => 'eltdf-btn-icon-element'
		)
    )); ?>
</a>