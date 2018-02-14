<?php
namespace ReadAndDigest\Modules\Blog\Shortcodes\BlockThree;

use ReadAndDigest\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class BlockThree
 */
class BlockThree extends ListShortcode
{

	/**
	 * @var string
	 */
	private $base;
	private $css_class;
	private $shortcode_title;

	public function __construct() {
		$this->base = 'eltdf_block_three';
		$this->css_class = 'eltdf-pb-three';
		$this->shortcode_title = 'Elated Block 3';

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

		$args_featured = array(
			'featured_title_tag' => 'h1',
			'featured_title_length' => '',
			'featured_display_category' => 'yes',
			'featured_display_author' => 'yes',
			'featured_display_excerpt' => 'yes',
			'featured_excerpt_length' => '20',
			'featured_custom_thumb_image_width' => '895',
			'featured_custom_thumb_image_height' => '605'
		);

		$args = array(
			'title_tag' => 'h4',
			'title_length' => '',			
            'title' => '' //title from general options
		);

		$params = shortcode_atts($args, $atts);
		$params_featured = shortcode_atts($args_featured, $atts);

		$params_featured_filtered = readanddigest_get_filtered_params($params_featured, 'featured');
		$nonf_class = $this->getNonFClasses($params,$atts);

		$html = '';

		if ($atts['query_result']->have_posts()):

			$html .= '<div class="eltdf-bnl-inner">';
			$html .= '<div class="eltdf-post-block-part eltdf-pb-three-featured">';
			$html .= '<div class="eltdf-pbr-featured">';
			while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

				//Get HTML from template
				$html .= '<div class="eltdf-post-block-part-inner">';
				$html .= readanddigest_get_list_shortcode_module_template_part('post-block-three-template', 'templates', '', $params_featured_filtered);
				$html .= '</div>'; // close eltdf-post-block-part-inner


			endwhile;
			$html .= '</div>'; // close eltdf-pbr-featured
			$html .= '</div>'; // close eltdf-pb-three-featured

			$html .= '<div class="eltdf-post-block-part eltdf-pb-three-non-featured '.implode(' ', $nonf_class).'">';
			if ($params['title'] !== ''){
				$html .='<h3 class="eltdf-pb-three-nonf-title">'.esc_html($params['title']).'</h3>';
			}
			$html .= '<div class="eltdf-pb-three-non-featured-inner">';
			$html .= '<div class="eltdf-pbr-non-featured">';
			while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

				$html .= '<div class="eltdf-pb-three-item eltdf-post-item">';
				$html .= '<div class="eltdf-pb-three-item-inner">';

				$html .= '<'.esc_html($params['title_tag']).' class="eltdf-pbtnf-title">';
				$html .= '<a itemprop="url" class="eltdf-pbtnf-link" href="'.esc_url(get_permalink()).'" target="_self">'.readanddigest_get_title_substring(get_the_title(), $params['title_length']).'</a>';
				$html .= '</'.esc_html($params['title_tag']).'>';

				$html .= '</div>';
				$html .= '</div>'; //close eltdf-pb-three-item

			endwhile;
			$html .= '</div>'; // close eltdf-pbr-non-featured
			$html .= '</div>'; // close eltdf-pb-three-non-featured-inner

			if ($atts['number_of_posts'] > 5){
				$html .= '<div class="eltdf-pb-three-nav">';
				$html .= '<a class="eltdf-pbt-prev" href="#"><span class="icon-arrows-down"></span></a>';
				$html .= '<a class="eltdf-pbt-next" href="#"><span class="icon-arrows-up"></span></a>';
				$html .= '</div>';
			}

			$html .= '</div>'; // close eltdf-pb-three-non-featured

			$html .= '</div>'; // close eltdf-bnl-inner

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

		$holder_classes[] = 'eltdf-block-revealing';

		if (isset($params['block_proportion']) && $params['block_proportion'] !== '') {
			$holder_classes[] = $params['block_proportion'];
		}

		return $holder_classes;
	}

	protected function getNonFClasses($params,$atts){
		$nonf_classes = array();


		if ($params['title'] !== ''){
			$nonf_classes[] = 'eltdf-nonf-has-title';
		}

		if ($atts['number_of_posts'] > 5){
			$nonf_classes[] = 'eltdf-nonf-has-nav';
		}

		return $nonf_classes;
	}
}