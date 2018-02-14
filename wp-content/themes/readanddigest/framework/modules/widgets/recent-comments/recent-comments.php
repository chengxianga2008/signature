<?php

/**
 * Widget that adds recent comments
 *
 * Class RecentComments
 */
class ReadAndDigestRecentComments extends ReadAndDigestWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltdf_recent_comments_widget', // Base ID
            'Elated Recent Comments Widget' // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'textfield',
                'title' => 'Widget Title',
                'name' => 'widget_title'
            ),
            array(
                'type' => 'textfield',
                'title' => 'Number of Posts',
                'name' => 'number_of_posts'
            ),
            array(
                'type' => 'dropdown',
                'title' => 'Display Date',
                'name' => 'display_date',
                'options' => array(
                    'yes' => 'Yes',
                    'no' => 'No'
                )
            ),
            array(
                'type' => 'textfield',
                'title' => 'Date Format',
                'name' => 'date_format',
                'description' => 'Enter the date format that you want to display'
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        extract($args);

        //prepare variables
        $number_of_posts = 3;
        if (!empty($instance['number_of_posts']) && $instance['number_of_posts'] !== '') {
            $number_of_posts = $instance['number_of_posts'];
        }

        $display_date = true;
        if (!empty($instance['display_date']) && $instance['display_date'] === 'no') {
            $display_date = false;
        }

        $date_format = 'd M Y';
        if (!empty($instance['date_format']) && $instance['date_format'] !== '') {
            $date_format = $instance['date_format'];
        }

        $month = get_the_time('m');
        $year = get_the_time('Y');

        $comments = get_comments( 
            array(
                'number'      => $number_of_posts,
                'status'      => 'approve',
                'post_status' => 'publish'
            ) 
        );

        echo '<div class="widget eltdf-rpc-holder">';
            if (!empty($instance['widget_title']) && $instance['widget_title'] !== '') {
                echo $args['before_title'].$instance['widget_title'].$args['after_title'];
            }
            echo '<div class="eltdf-rpc-inner">';
                echo '<ul>';
                    if ( is_array( $comments ) && $comments ) {
                        foreach ( (array) $comments as $comment ) {
                            echo '<li>';
                                echo '<div class="eltdf-rpc-number-holder"><span class="icon-basic-message"></span><span class="eltdf-rpc-number">'.get_comments_number( $comment->comment_post_ID ).'</span></div>';
                                echo '<div class="eltdf-rpc-content">';
                                echo '<h4 class="eltdf-rpc-link"><a itemprop="url" href="'.esc_url( get_comment_link( $comment ) ).'">'.get_the_title( $comment->comment_post_ID ).'</a></h4>';
                                if($display_date){
                                    echo '<a class="eltdf-rpc-date" itemprop="url" href="'.get_month_link($year, $month).'">'.get_the_time($date_format, $comment->comment_post_ID).'</a>';
                                }
                                echo '</div>';
                            echo '</li>';
                        }
                    }
                echo '</ul>';
            echo '</div>';
        echo '</div>';
    }
}