<?php

/**
 * Widget that adds post layout seven
 *
 * Class PostLayoutSeven
 */
class ReadAndDigestPostLayoutSeven extends ReadAndDigestWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltdf_post_layout_seven_widget', // Base ID
            'Elated Post Layout Seven Widget' // Name
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
                'type' => 'dropdown',
                'title' => 'Style',
                'name' => 'general_style',
                'options' => array(
                    '' => 'Default',
                    'dark' => 'Dark',
                    'light' => 'Light',
                ),
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => 'Number of Posts',
                'name' => 'number_of_posts'
            ),
            array(
                'type' => 'dropdown',
                'title' => 'Number of Columns',
                'name' => 'column_number',
                'options' => array(
                    '' => 'Default',
                    1 => 'One Column',
                    2 => 'Two Columns',
                    3 => 'Three Columns',
                    4 => 'Four Columns',
                    5 => 'Five Columns'
                ),
                'description' => ''
            ),
            array(
                'type' => 'dropdown',
                'title' => 'Category',
                'name' => 'category_id',
                'options' => array_flip(readanddigest_get_post_categories_VC()),
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => 'Category Slug',
                'name' => 'category_slug',
                'description' => 'Leave empty for all or use comma for list'
            ),
            array(
                'type' => 'dropdown',
                'title' => 'Choose Author',
                'name' => 'author_id',
                'options' => array_flip(readanddigest_get_authors_VC()),
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => 'Tag Slug',
                'name' => 'tag_slug',
                'description' => 'Leave empty for all or use comma for list'
            ),
            array(
                'type' => 'textfield',
                'title' => 'Include Posts',
                'name' => 'post_in',
                'description' => 'Enter the IDs of the posts you want to display'
            ),
            array(
                'type' => 'textfield',
                'title' => 'Exclude Posts',
                'name' => 'post_not_in',
                'description' => 'Enter the IDs of the posts you want to exclude'
            ),
            array(
                'type' => 'dropdown',
                'title' => 'Sort',
                'name' => 'sort',
                'options' => array_flip(readanddigest_get_sort_array()),
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => 'Image Width (px)',
                'name' => 'thumb_image_width',
                'description' => 'Set custom image width (px)',
            ),
            array(
                'type' => 'textfield',
                'title' => 'Image Height (px)',
                'name' => 'thumb_image_height',
                'description' => 'Set custom image height (px)',
            ),
            array(
                'type' => 'dropdown',
                'title' => 'Title Tag',
                'name' => 'title_tag',
                'options' => array(
                    'h5' => 'h5',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h6' => 'h6'
                )
            ),
            array(
                'type' => 'textfield',
                'title' => 'Title Max Characters',
                'name' => 'title_length',
                'description' => 'Enter max character of title post list that you want to display'
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
            ),
            array(
                'type' => 'dropdown',
                'title' => 'Display Author',
                'name' => 'display_author',
                'options' => array(
                    'no' => 'No',
                    'yes' => 'Yes'
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => 'Display Comments',
                'name' => 'display_comments',
                'options' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => 'Display Like',
                'name' => 'display_like',
                'options' => array(
                    'no' => 'No',
                    'yes' => 'Yes',
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => 'Display Excerpt',
                'name' => 'display_excerpt',
                'options' => array(
                    'no' => 'No',
                    'yes' => 'Yes',
                )
            ),
            array(
                'type' => 'textfield',
                'title' => 'Max. Excerpt Length',
                'name' => 'excerpt_length',
                'description' => 'Enter max of words that can be shown for excerpt'
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
        $params = '';

        $instance['thumb_image_width'] = $instance['thumb_image_width'] != '' ? $instance['thumb_image_width'] : '81';
        $instance['thumb_image_height'] = $instance['thumb_image_height'] != '' ? $instance['thumb_image_height'] : '45';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key = '$value' ";
            }
        }

        echo '<div class="widget eltdf-plw-seven">';

        if (!empty($instance['widget_title']) && $instance['widget_title'] !== '') {
            echo $args['before_title'].$instance['widget_title'].$args['after_title'];
        }
        
        //finally call the shortcode
        echo do_shortcode("[eltdf_post_layout_seven $params]"); // XSS OK

        echo '</div>'; //close div.eltdf-plw-seven
    }
}