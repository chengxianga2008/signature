<?php do_action('readanddigest_before_page_header'); ?>

<header class="eltdf-page-header">
    <div class="eltdf-logo-area">
        <div class="eltdf-grid">
            <div class="eltdf-vertical-align-containers">
                <div class="eltdf-position-left">
                    <div class="eltdf-position-left-inner">
                        <?php if(!$hide_logo && $logo_position == 'left') {
                            readanddigest_get_logo();
                        } ?>
                    </div>
                </div>
                <div class="eltdf-position-center">
                    <div class="eltdf-position-center-inner">
                        <?php if(!$hide_logo && $logo_position == 'center') {
                            readanddigest_get_logo();
                        } ?>
                    </div>
                </div>
                <div class="eltdf-position-right">
                    <div class="eltdf-position-right-inner">
                        <?php if(is_active_sidebar('eltdf-right-from-logo') && $logo_position == 'left') : ?>
                            <?php dynamic_sidebar('eltdf-right-from-logo'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="eltdf-menu-area">
        <div class="eltdf-grid">
            <div class="eltdf-vertical-align-containers">
                <div class="eltdf-position-left">
                    <div class="eltdf-position-left-inner">
                        <?php readanddigest_get_main_menu(); ?>
                    </div>
                </div>
                <div class="eltdf-position-right">
                    <div class="eltdf-position-right-inner">
                        <?php if(is_active_sidebar('eltdf-right-from-main-menu')) : ?>
                            <?php dynamic_sidebar('eltdf-right-from-main-menu'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if($show_sticky) {
        readanddigest_get_sticky_header('centered');
    } ?>
</header>

<?php do_action('readanddigest_after_page_header'); ?>