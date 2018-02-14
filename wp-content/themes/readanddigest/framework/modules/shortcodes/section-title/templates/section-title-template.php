<?php
/**
 * Section Table shortcode template
 */
?>
<div class="eltdf-section-title-holder clearfix">
    <?php if($title !== '') { ?>
        <?php echo '<'.esc_html($title_tag) ?> class="eltdf-st-title">
        <?php echo esc_attr($title); ?>
        <?php echo '</'.esc_html($title_tag) ?>>
    <?php } ?>
</div>