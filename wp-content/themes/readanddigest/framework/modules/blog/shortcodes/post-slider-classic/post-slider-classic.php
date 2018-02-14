<?php
namespace ReadAndDigest\Modules\Blog\Shortcodes\PostSliderClassic;

use ReadAndDigest\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class PostSliderClassic
 */
class PostSliderClassic extends ListShortcode {

	/**
	 * @var string
	 */
    private $base;
    private $css_class;
    private $shortcode_title;

	public function __construct() {
		$this->base = 'eltdf_post_slider_classic';
        $this->css_class = 'eltdf-psc';
        $this->shortcode_title = 'Elated Post Slider Classic';

        parent::__construct($this->base, $this->css_class, $this->shortcode_title);

        add_action('vc_before_init', array($this, 'vcMap'));
	}

    /**
     * Maps shortcode to Visual Composer. Hooked on vc_before_init
     *
     * add params for shortcode in next function
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
            'title_tag' => 'h1',
            'display_category' => 'yes',
            'display_date' => 'yes',
            'date_format' => 'd F Y',
            'display_author' => 'yes',
            'display_comments' => 'yes',
            'display_like' => 'yes',
            'thumb_image_size' => '',
            'thumb_image_width' => '',
            'thumb_image_height' => '',
            'full_screen' => '',
            'parallax_effect' => 'no'
		);

		$params = shortcode_atts($args, $atts);
        $params['slider_style'] = '';

        $html = '';

        if($atts['query_result']->have_posts()):
            $html .= '<ul class="eltdf-psc-slides">';

            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                if($params['full_screen'] == 'yes') {
                    $params['slider_style'] = 'background-image:url('.wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())).')';
                }

                //Get HTML from template
                $html .= readanddigest_get_list_shortcode_module_template_part('templates/post-slider-classic-template', 'post-slider-classic', '', $params);

            endwhile;

            $html .= '</ul>';
            else:
                $html .= $this->errorMessage();
        endif;

        wp_reset_postdata();

        return $html;
	}

    protected function getAdditionalClasses($params) {

        $holderClasses = array();

        if ($params['number_of_posts'] !== '') {
            $holderClasses[] = 'eltdf-psc-number-'.$params['number_of_posts'];
        }
        
        if ($params['display_navigation'] == 'yes') {
            $holderClasses[] = 'eltdf-psc-navigation';
        }

        if ($params['display_paging'] == 'yes') {
            $holderClasses[] = 'eltdf-psc-pagination';
        }

        if ($params['full_screen'] == 'yes') {
            $holderClasses[] = 'eltdf-psc-full-screen';
        }

        return $holderClasses;
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
}