<?php

/*
	Layouts - shortcodes
*/
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutOne\PostLayoutOne;
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutTwo\PostLayoutTwo;
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutThree\PostLayoutThree;
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutFour\PostLayoutFour;
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutFive\PostLayoutFive;
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutSix\PostLayoutSix;
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutSeven\PostLayoutSeven;
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutEight\PostLayoutEight;

/*
	Blocks - combinations of several layouts
*/
use ReadAndDigest\Modules\Blog\Shortcodes\BlockOne\BlockOne;
use ReadAndDigest\Modules\Blog\Shortcodes\BlockTwo\BlockTwo;


if(!function_exists('readanddigest_list_ajax')) {
    function readanddigest_list_ajax()
    {

        $params = ($_POST);

        $prefix_block = 'eltdf_block_';
        $prefix_layout = 'eltdf_post_layout_';

        switch($params['base']){
            case 'eltdf_block_one' : {
                $newShortcode = new BlockOne();
            }   break;
            case 'eltdf_block_two' : {
                $newShortcode = new BlockTwo();
            }   break;
            case 'eltdf_post_layout_one' : {
                $newShortcode = new PostLayoutOne();
            }   break;
            case 'eltdf_post_layout_two' : {
                $newShortcode = new PostLayoutTwo();
            }   break;
            case 'eltdf_post_layout_three' : {
                $newShortcode = new PostLayoutThree();
            }   break;
            case 'eltdf_post_layout_four' : {
                $newShortcode = new PostLayoutFour();
            }   break;
            case 'eltdf_post_layout_five' : {
                $newShortcode = new PostLayoutFive();
            }   break;
            case 'eltdf_post_layout_six' : {
                $newShortcode = new PostLayoutSix();
            }   break;
            case 'eltdf_post_layout_seven' : {
                $newShortcode = new PostLayoutSeven();
            }   break;
            case 'eltdf_post_layout_eight' : {
                $newShortcode = new PostLayoutEight();
            }   break;
        }

        $params['query_result'] = $newShortcode->generatePostsQuery($params);
        $html_response = $newShortcode->render($params);

        $show_next_page = true;
        if ($params['paged'] < 1 || $params['paged'] > $params['query_result']->max_num_pages) {
            $show_next_page = false;
        }


        $return_obj = array(
            'html' => $html_response,
            'showNextPage' => $show_next_page,
            'pagedResult' => $params['paged']
        );

        echo json_encode($return_obj); exit;
    }

    add_action('wp_ajax_readanddigest_list_ajax', 'readanddigest_list_ajax');
    add_action('wp_ajax_nopriv_readanddigest_list_ajax', 'readanddigest_list_ajax');
}