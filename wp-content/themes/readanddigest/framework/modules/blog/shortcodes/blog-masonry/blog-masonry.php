<?php

namespace ReadAndDigest\Modules\Blog\Shortcodes\BlogMasonry;

use ReadAndDigest\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class BlogMasonry
 */
class BlogMasonry extends ListShortcode
{

	/**
	 * @var string
	 */
	private $base;
	private $css_class;
	private $shortcode_title;

	public function __construct() {
		$this->base = 'eltdf_blog_masonry';
		$this->css_class = 'eltdf-blog-masonry';
		$this->shortcode_title = 'Elated Blog Masonry';

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
			'title_tag' => 'h2',
			'title_length' => '',
			'display_date' => 'yes',
			'date_format' => 'd F Y',
			'display_comments' => 'yes',
			'display_featured_icon' => 'yes'
		);

		$params = shortcode_atts($args, $atts);
		$html = '';

		if($atts['query_result']->have_posts()):
			$html .= '<div class="eltdf-blog-masonry">';
			$html .= '<div class="eltdf-blog-masonry-grid-sizer"></div>';
			$html .= '<div class="eltdf-blog-masonry-grid-gutter"></div>';
			while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();
				$post_id = get_the_ID();
				$params = array_merge($params,$this->getMasonrySize($post_id));
				$html .= readanddigest_get_list_shortcode_module_template_part('templates/masonry', 'blog-masonry', '', $params);
			endwhile;
			$html .= '</div>';
		else:
			$html .= $this->errorMessage();
		endif;
		wp_reset_postdata();

		return $html;
		
	}

	protected function getAdditionalClasses($params){
		$holder_classes = array();

		$holder_classes[] = 'eltdf-blog-list-holder';

		return $holder_classes;
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

	private function getMasonrySize($id){
		$masonry_size = array();

		$size = get_post_meta($id, "eltdf_blog_masonry_dimensions", true);
		if ($size !== ''){
			$masonry_size['type'] = 'eltdf-masonry-'.$size;
			switch ($size) {
				case 'large-width':
					$masonry_size['image_size'] = 'readanddigest_large_width';
					break;
				case 'large-height':
					$masonry_size['image_size'] = 'readanddigest_large_height';
					break;
				default:
					$masonry_size['image_size'] = 'readanddigest_square';
					break;
			}
		}else{
			$masonry_size['type'] = 'eltdf-masonry-default';
			$masonry_size['image_size'] = 'readanddigest_square';
		}

		return $masonry_size;
	}
	
}
