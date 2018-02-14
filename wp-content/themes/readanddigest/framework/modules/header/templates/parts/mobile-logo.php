<?php do_action('readanddigest_before_mobile_logo'); ?>

<div class="eltdf-mobile-logo-wrapper">
    <a href="<?php echo esc_url(home_url('/')); ?>" <?php readanddigest_inline_style($logo_styles); ?>>
        <img src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_html_e('mobile-logo','readanddigest'); ?>"/>
    </a>
</div>

<?php do_action('readanddigest_after_mobile_logo'); ?>