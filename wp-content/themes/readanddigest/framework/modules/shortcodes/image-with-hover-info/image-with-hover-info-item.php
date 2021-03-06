<?php
namespace ReadAndDigest\Modules\Shortcodes\ImageWithHoverInfoItem;

use ReadAndDigest\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ImageWithHoverInfoItem
 * @package ReadAndDigest\Modules\Shortcodes\ImageWithHoverInfoItem
 */
class ImageWithHoverInfoItem implements ShortcodeInterface {

    private $base;

    /**
     * ImageWithHoverInfoItem constructor.
     */
    public function __construct() {
        $this->base = 'eltdf_image_with_hover_info_item';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base for shortcode
     *
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {

        vc_map(array(
            'name'                      => esc_html__('Elated Image With Hover Info Item', 'readanddigest'),
            'base'                      => $this->getBase(),
            'category'                  => 'by ELATED',
            'as_child' => array('only' => 'qodef_image_with_hover_info'),
            'icon'                      => 'icon-wpb-image-with-hover-info-item extended-custom-icon',
            'params'                    => array(
                array(
                    'type'          => 'attach_image',
                    'heading'       => 'Image',
                    'param_name'    => 'image',
                    'description'   => 'Select image from media library'
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => 'Image Size',
                    'param_name'    => 'image_size',
                    'description'   => 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "full" size'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => 'Title',
                    'param_name'  => 'title',
                    'value'       => '',
                    'admin_label' => true
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => 'Link',
                    'param_name'  => 'link',
                    'value'       => '',
                    'admin_label' => true
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => 'Link Text',
                    'param_name'  => 'link_text',
                    'description' => 'Default label is LAUNCH',
                    'dependency'  => array('element' => 'link', 'not_empty' => true)
                ),
                array(
                    'type'       => 'dropdown',
                    'heading'    => 'Target',
                    'param_name' => 'target',
                    'value'      => array(
                        ''      => '',
                        'Self'  => '_self',
                        'Blank' => '_blank'
                    ),
                    'dependency' => array('element' => 'link', 'not_empty' => true),
                ),
            )
        ));

    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
    public function render($atts, $content = null) {

        $args = array(
            'image'           => '',
            'image_size'      => 'full',
            'title'           => '',
            'link'            => '',
            'link_text'       => 'LAUNCH',
            'target'          => '_blank'
        );

        $params = shortcode_atts($args, $atts);
        $params['images'] = $this->getImage($params);
        $params['image_size'] = $this->getImageSize($params['image_size']);
        $params['button_parameters'] = $this->getButtonParameters($params);

        $html = readanddigest_get_shortcode_module_template_part('templates/image-with-hover-info-item-template', 'image-with-hover-info', '', $params);

        return $html;
    }

    /**
     * Return initial mage for shortcode
     *
     * @param $params
     * @return array
     */
    private function getImage($params) {
        $image_ids = array();
        $images = array();
        $i = 0;

        if ($params['image'] !== '') {
            $image_ids = explode(',', $params['image']);
        }

        foreach ($image_ids as $id) {

            $image['image_id'] = $id;
            $image_original = wp_get_attachment_image_src($id, 'full');
            $image['url'] = $image_original[0];
            $image['title'] = get_the_title($id);

            $images[$i] = $image;
            $i++;
        }

        return $images;
    }

    /**
     * Return image size or custom image size array
     *
     * @param $image_size
     * @return array
     */
    private function getImageSize($image_size) {

        $image_size = trim($image_size);
        //Find digits
        preg_match_all( '/\d+/', $image_size, $matches );
        if(in_array( $image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full'))) {
            return $image_size;
        } elseif(!empty($matches[0])) {
            return array(
                    $matches[0][0],
                    $matches[0][1]
            );
        } else {
            return 'thumbnail';
        }
    }

    private function getButtonParameters($params) {
        $button_params_array = array();

        $button_params_array['type'] = 'solid';
        $button_params_array['size'] = 'large';

        if(!empty($params['link'])) {
            $button_params_array['link'] = $params['link'];
        }
                
        if(!empty($params['target'])) {
            $button_params_array['target'] = $params['target'];
        } else {
            $button_params_array['target'] = '_blank';
        }
        
        if(!empty($params['link_text'])) {
            $button_params_array['text'] = $params['link_text'];
        }
        
        return $button_params_array;
    }
}