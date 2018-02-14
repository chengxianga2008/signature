<?php
    /*
    Template Name: Blog: Standard Whole Post
    */
?>
<?php get_header(); ?>
<?php readanddigest_get_title(); ?>
<?php get_template_part('slider'); ?>
    <div class="eltdf-container">
        <?php do_action('readanddigest_after_container_open'); ?>
        <div class="eltdf-container-inner">
            <?php readanddigest_get_blog('standard-whole-post'); ?>
        </div>
        <?php do_action('readanddigest_before_container_close'); ?>
    </div>
<?php get_footer(); ?>