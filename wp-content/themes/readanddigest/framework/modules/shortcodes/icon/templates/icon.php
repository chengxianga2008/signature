<?php if($icon_animation_holder) : ?>
    <span class="eltdf-icon-animation-holder" <?php readanddigest_inline_style($icon_animation_holder_styles); ?>>
<?php endif; ?>

    <span <?php readanddigest_class_attribute($icon_holder_classes); ?> <?php readanddigest_inline_style($icon_holder_styles); ?> <?php echo readanddigest_get_inline_attrs($icon_holder_data); ?>>
        <?php if($link !== '') : ?>
            <a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
        <?php endif; ?>

        <?php echo readanddigest_icon_collections()->renderIcon($icon, $icon_pack, $icon_params); ?>

        <?php if($link !== '') : ?>
            </a>
        <?php endif; ?>
    </span>

<?php if($icon_animation_holder) : ?>
    </span>
<?php endif; ?>
