<?php
namespace ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutTwo;

use ReadAndDigest\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class PostLayoutTwo
 */
class PostLayoutTwo extends ListShortcode {

	/**
	 * @var string
	 */

    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
		$this->base = 'eltdf_post_layout_two';
        $this->css_class = 'eltdf-pl-two';
        $this->shortcode_title = 'Elated Post Layout 2';

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
	 *
     * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
            'title_tag' => 'h3',
            'title_length' => '',
            'display_date' => 'yes',
            'display_comments' => 'yes',
            'display_count' => 'no',
            'date_format' => 'd F Y',
            'display_excerpt' => 'no',
            'excerpt_length' => '20',
            'thumb_image_width' => '180',
            'thumb_image_height' => '120',
            'display_featured_icon' => 'no'
		);

		$params = shortcode_atts($args, $atts);
        $html = '';

        $params['image_style'] = $this->getImageStyle($params);

        if($atts['query_result']->have_posts()):
            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= readanddigest_get_list_shortcode_module_template_part('post-template-two', 'templates', '', $params);

            endwhile;
        else:
                $html .= $this->errorMessage();

        endif;
        wp_reset_postdata();

		return $html;
	}

    protected function getAdditionalClasses($params){
        $holder_classes = array();

        if (isset($params['skin']) && $params['skin'] !== '') {
            $holder_classes[] = $params['skin'];
        }

        return $holder_classes;
    }

    private function getImageStyle($params) {
        $style = array();

        if ($params['thumb_image_width'] !== '') {
            $style[] = 'width: '.readanddigest_filter_px($params['thumb_image_width']).'px';
        }

        return implode(';', $style);
    }
}