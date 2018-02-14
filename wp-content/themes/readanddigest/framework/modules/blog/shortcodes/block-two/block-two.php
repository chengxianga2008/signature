<?php
namespace ReadAndDigest\Modules\Blog\Shortcodes\BlockTwo;

use ReadAndDigest\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class BlockTwo
 */
class BlockTwo extends ListShortcode
{

    /**
     * @var string
     */
    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
        $this->base = 'eltdf_block_two';
        $this->css_class = 'eltdf-pb-two';
        $this->shortcode_title = 'Elated Block 2';

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
            'featured_title_tag' => 'h2',
            'featured_title_length' => '',
            'featured_display_date' => 'yes',
            'featured_date_format' => 'd F Y',
            'featured_display_category' => 'yes',
            'featured_display_author' => 'no',
            'featured_display_comments' => 'yes',
            'featured_display_like' => 'no',
            'featured_display_excerpt' => 'no',
            'featured_excerpt_length' => '20',
            'featured_thumb_image_size' => '',
            'featured_thumb_image_width' => '',
            'featured_thumb_image_height' => ''
        );

        $args = array(
            'title_tag' => 'h4',
            'title_length' => '',
            'display_date' => 'yes',
            'display_comments' => 'no',
            'date_format' => 'd F Y',
            'display_author' => 'no',
            'featured_icon' => 'no'
        );

        $params = shortcode_atts($args, $atts);
        $params_featured = shortcode_atts($args_featured, $atts);

        $params_featured_filtered = readanddigest_get_filtered_params($params_featured, 'featured');
        $params_featured_filtered['display_featured_icon'] = 'no';

        $html = '';

        if ($atts['query_result']->have_posts()):

            $html .= '<div class="eltdf-bnl-inner">';
            $html .= '<div class="eltdf-post-block-part eltdf-pb-two-featured eltdf-pbr-featured">';
            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= '<div class="eltdf-post-block-part-inner">';
				if ($params['featured_icon'] == 'yes'){
					$html .= '<span class="eltdf-bnl-featured-icon"><span class="icon_star_alt"></span></span>';
				}
                $html .= readanddigest_get_list_shortcode_module_template_part('post-template-five', 'templates', '', $params_featured_filtered);
                $html .= '</div>'; // close eltdf-post-block-part-inner


            endwhile;
            $html .= '</div>'; // close eltdf-pb-two-featured

            $html .= '<div class="eltdf-post-block-part eltdf-pb-two-non-featured eltdf-pbr-non-featured">';
            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

               //Get HTML from template
                $html .= readanddigest_get_list_shortcode_module_template_part('post-template-four', 'templates', '', $params);

            endwhile;
            $html .= '</div>'; // close eltdf-pb-two-non-featured

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
}