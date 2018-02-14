<?php do_action('readanddigest_before_sticky_header'); ?>

    <div class="eltdf-sticky-header">
        <?php do_action( 'readanddigest_after_sticky_menu_html_open' ); ?>
        <div class="eltdf-sticky-holder">
            <div class=" eltdf-vertical-align-containers">
                <div class="eltdf-position-left">
                    <div class="eltdf-position-left-inner">
                        <?php if(!$hide_logo) {
                            readanddigest_get_logo('sticky');
                        } ?>
                    </div>
                </div>
                <div class="eltdf-position-center">
                    <div class="eltdf-position-center-inner">
                        <?php readanddigest_get_sticky_main_menu('eltdf-sticky-nav'); ?>
                    </div>
                </div>
                <div class="eltdf-position-right">
                    <div class="eltdf-position-right-inner">
                        <?php if(is_active_sidebar('eltdf-sticky-right')) : ?>
                            <?php dynamic_sidebar('eltdf-sticky-right'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php do_action('readanddigest_after_sticky_header'); ?>