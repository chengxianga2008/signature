<?php do_action('readanddigest_before_mobile_header'); ?>

<header class="eltdf-mobile-header">
    <div class="eltdf-mobile-header-inner">
        <?php do_action( 'readanddigest_after_mobile_header_html_open' ) ?>
        <div class="eltdf-mobile-header-holder">
            <div class="eltdf-grid">
                <div class="eltdf-vertical-align-containers">
                    <?php if($show_logo) : ?>
                        <div class="eltdf-position-left">
                            <div class="eltdf-position-left-inner">
                                <?php readanddigest_get_mobile_logo(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="eltdf-position-right">
                        <div class="eltdf-position-right-inner">
                            <?php if(is_active_sidebar('eltdf-right-from-mobile-logo')) {
                                dynamic_sidebar('eltdf-right-from-mobile-logo');
                            } ?>
                            <?php if($show_navigation_opener) : ?>
                                <div class="eltdf-mobile-menu-opener">
                                    <a href="javascript:void(0)">
                                        <span class="eltdf-mobile-opener-icon-holder">
                                            <span class="eltdf-line line1"></span>
                                            <span class="eltdf-line line2"></span>
                                            <span class="eltdf-line line3"></span>
                                            <span class="eltdf-line line4"></span>
                                            <span class="eltdf-line line5"></span>
                                        </span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div> <!-- close .eltdf-vertical-align-containers -->
            </div>
        </div>
        <?php readanddigest_get_mobile_nav(); ?>
    </div>

</header> <!-- close .eltdf-mobile-header -->

<?php do_action('readanddigest_after_mobile_header'); ?>