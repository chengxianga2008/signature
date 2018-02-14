<?php
namespace ReadAndDigest\Modules\Blog\Shortcodes\PostCarouselSwipe;

use ReadAndDigest\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class PostCarouselSwipe
 */
class PostCarouselSwipe extends ListShortcode
{

    /**
     * @var string
     */
    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'eltdf_post_carousel_swipe';
        $this->css_class = 'eltdf-pcs';
        $this->shortcode_title = 'Elated Post Swipe Carousel';

        parent::__construct($this->base, $this->css_class, $this->shortcode_title);

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Maps shortcode to Visual Composer. Hooked on vc_before_init
     *
     * add params for shortcode in next function
     * function gets $base for each shortcode
     *
     * @see readanddigest_get_shortcode_params()
     */

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @return string
     */
    public function render($atts, $content = null) {

        $args = array(
            'slider_layout' => '',
            'title_tag' => 'h1',
            'title_length' => '',
            'display_date' => 'yes',
            'date_format' => 'd F Y',
            'display_category' => 'yes',
            'display_author' => 'no',
            'display_comments' => 'yes',
            'display_like' => 'no',
            'display_excerpt' => 'no',
            'excerpt_length' => '20',
            'custom_thumb_image_width' => '660',
            'custom_thumb_image_height' => '625',
            'display_featured_icon' => 'no'
        );

        $params = shortcode_atts($args, $atts);

        $params['thumb_image_size'] = 'custom_size';
        $params['thumb_image_width'] = $params['custom_thumb_image_width'] != '' ? $params['custom_thumb_image_width'] : 660; 
        $params['thumb_image_height'] = $params['custom_thumb_image_height'] != '' ? $params['custom_thumb_image_height'] : 625;

        $html = '';

        if ($atts['query_result']->have_posts()):

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                $html .= '<div class="eltdf-pcs-item">';

                //Get HTML from template
                $html .= readanddigest_get_list_shortcode_module_template_part('post-template-five', 'templates', '', $params);

                $html .= '</div>'; // close eltdf-pcs-item

            endwhile;

        else:
            $html .= $this->errorMessage();
        endif;

        wp_reset_postdata();

        return $html;
    }

    /**
     * Enabling inner holder in shortcode if layout is used,
     * because block has its own inner holder
     *
     * @return boolean
     */
    protected function isBlockElement() {
        return true;
    }

    protected function getAdditionalClasses($params){
        $holder_classes = array();

        if (isset($params['carousel_layout']) && $params['carousel_layout'] !== '') {
            $holder_classes[] = $params['carousel_layout'];
        }

        return $holder_classes;
    }

}