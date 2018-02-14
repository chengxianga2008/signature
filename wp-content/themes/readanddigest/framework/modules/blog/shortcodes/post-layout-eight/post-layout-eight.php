<?php
namespace ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutEight;

use ReadAndDigest\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class PostLayoutEight
 */
class PostLayoutEight extends ListShortcode {

	/**
	 * @var string
	 */

    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
		$this->base = 'eltdf_post_layout_eight';
        $this->css_class = 'eltdf-pl-eight';
        $this->shortcode_title = 'Elated Post Layout 8';

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
            'date_format' => 'd F Y',
            'display_category' => 'no',
            'display_author' => 'no',
            'display_comments' => 'no',
            'display_like' => 'no',
            'custom_thumb_image_width' => '280',
            'custom_thumb_image_height' => '400',
            'subtitle' => '',
            'title' => '',
            'display_featured_icon' => 'no'
        );

		$params = shortcode_atts($args, $atts);
        $html = '';

		if ($params['title'] !== '' || $params['subtitle'] !== ''){
			$html .= '<div class="eltdf-pt-eight-left eltdf-post-block-part">';
			$html .= '<h6 class="eltdf-pt-eight-subtitle">'.esc_html($params['subtitle']).'</h6>';
			$html .= '<h1 class="eltdf-pt-eight-title">'.esc_html($params['title']).'</h1>';
			$html .= '</div>';
		}

        $html .= '<div class="eltdf-pt-eight-right eltdf-post-block-part">';
            $html .= '<div class="eltdf-pt-eight-right-inner">';

            if($atts['query_result']->have_posts()):
                while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                    //Get HTML from template
                    $html .= readanddigest_get_list_shortcode_module_template_part('post-template-eight', 'templates', '', $params);

                endwhile;
            else:
                    $html .= $this->errorMessage();

            endif;
            wp_reset_postdata();

            $html .= '</div>';
        $html .= '</div>';


		return $html;
	}
}