<?php
namespace ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutFour;

use ReadAndDigest\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class PostLayoutFour
 */
class PostLayoutFour extends ListShortcode {

	/**
	 * @var string
	 */

    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
		$this->base = 'eltdf_post_layout_four';
        $this->css_class = 'eltdf-pl-four';
        $this->shortcode_title = 'Elated Post Layout 4';

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
            'title_tag' => 'h4',
            'title_length' => '',
            'display_date' => 'yes',
            'display_comments' => 'yes',
            'date_format' => 'd F Y',
            'display_author' => 'no'
		);

		$params = shortcode_atts($args, $atts);
        $html = '';

        if($atts['query_result']->have_posts()):
            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= readanddigest_get_list_shortcode_module_template_part('post-template-four', 'templates', '', $params);

            endwhile;
        else:
                $html .= $this->errorMessage();

        endif;
        wp_reset_postdata();

		return $html;
	}

}