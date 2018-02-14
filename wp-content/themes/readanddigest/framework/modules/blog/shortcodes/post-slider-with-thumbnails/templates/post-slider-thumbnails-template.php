<?php
$categories = get_the_category();
$output = '';
if (!empty($categories)) {
    foreach( $categories as $category ) {
        $output .= esc_html($category->name);
        break;
    }
}
?>
<li class="eltdf-pswt-slide-thumb">
    <?php if (has_post_thumbnail()) { ?>
    <div class="eltdf-pswt-image">
        <?php
            echo get_the_post_thumbnail(get_the_ID(), readanddigest_landscape);
        ?>
    </div>
    <?php } ?>
    <div class="eltdf-pswt-thumb-content">
        <h4 class="eltdf-pswt-title">
            <?php echo esc_html(get_the_title()) ?>
        </h4>
    </div>
</li>