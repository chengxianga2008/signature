<?php
namespace ReadAndDigest\Modules\Blog\Shortcodes\PostCarousel;

use ReadAndDigest\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class PostCarousel
 */
class PostCarousel extends ListShortcode
{

    /**
     * @var string
     */
    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'eltdf_post_carousel';
        $this->css_class = 'eltdf-pc';
        $this->shortcode_title = 'Elated Post Carousel';

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
        	'carousel_title' => '',
            'slider_layout' => '',
            'title_tag' => 'h3',
            'title_length' => '',
            'display_date' => 'yes',
            'date_format' => 'd F Y',
            'display_category' => 'no',
            'display_author' => 'no',
            'display_comments' => 'no',
            'display_like' => 'no',
            'display_excerpt' => 'yes',
            'excerpt_length' => '20',
            'thumb_image_size' => '',
            'thumb_image_width' => '',
            'thumb_image_height' => '',
            'display_post_type_icon' => '',
            'display_featured_icon' => 'no'
        );

        $params = shortcode_atts($args, $atts);
        $params_non_featured = $this->setParams($params);

        $html = '';

        $html .= '<div class="eltdf-pc-title-nav-holder">';

		if ($params['carousel_title'] != '') {
			$html .= '<span class="eltdf-pc-title">'.$params['carousel_title'].'</span>';
		}

        $html .= '</div>';

        if ($atts['query_result']->have_posts()):

            $html .= '<ul class="eltdf-carousel-holder">';

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                $html .= '<li class="eltdf-carousel-item">';

                //Get HTML from template
                $html .= readanddigest_get_list_shortcode_module_template_part('post-template-one', 'templates', '', $params);

                $html .= '</li>'; // close eltdf-carousel-item

            endwhile;

            $html .= '</ul>'; // eltdf-carousel-holder

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

    private function setParams($params){

        $params_non_featured = $params;

        switch($params_non_featured['title_tag']){
            case 'h1' : $params_non_featured['title_tag'] = 'h2';
                break;
            case 'h2' : $params_non_featured['title_tag'] = 'h3';
                break;
            case 'h3' : $params_non_featured['title_tag'] = 'h4';
                break;
            case 'h4' : $params_non_featured['title_tag'] = 'h5';
                break;
            case 'h5' : $params_non_featured['title_tag'] = 'h6';
                break;
            default : break;
        }


        return $params_non_featured;
    }

}