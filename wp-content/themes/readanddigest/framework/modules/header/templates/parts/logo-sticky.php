<?php do_action('readanddigest_before_site_logo'); ?>

<div class="eltdf-logo-wrapper">
    <a href="<?php echo esc_url(home_url('/')); ?>" <?php readanddigest_inline_style($logo_styles); ?>>
        <img src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_html_e('logo','readanddigest' ); ?>"/>
    </a>
</div>

<?php do_action('readanddigest_after_site_logo'); ?>