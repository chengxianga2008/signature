<div class="eltdf-bnl-navigation-holder">
    <div data-rel="<?php echo esc_attr($params['query_result']->max_num_pages) ?> " class="eltdf-btn eltdf-bnl-load-more eltdf-load-more eltdf-btn-solid">
        <?php echo get_next_posts_link( esc_html__('Show More', 'readanddigest'), $params['query_result']->max_num_pages ) ?>
    </div>
    <div class="eltdf-btn eltdf-bnl-load-more-loading eltdf-btn-solid">
        <a href="javascript: void(0)" class="">
            <?php echo esc_html__('LOADING...', 'readanddigest') ?>
        </a>
    </div>
</div>