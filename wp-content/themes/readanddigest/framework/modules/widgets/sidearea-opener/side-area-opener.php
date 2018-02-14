<?php

class ReadAndDigestSideAreaOpener extends ReadAndDigestWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_side_area_opener', // Base ID
            'Elated Side Area Opener' // Name
        );

        $this->setParams();
    }

    protected function setParams() {

		$this->params = array(
			array(
				'name'			=> 'side_area_opener_icon_color',
				'type'			=> 'textfield',
				'title'			=> 'Icon Color',
				'description'	=> 'Define color for Side Area opener icon'
			),
            array(
                'name'			=> 'side_area_opener_label',
                'type'			=> 'textfield',
                'title'			=> 'Icon Label',
                'description'	=> 'Define color for Side Area opener icon'
            )
		);

    }


    public function widget($args, $instance) {
		
		$sidearea_icon_styles = array();

		if ( !empty($instance['side_area_opener_icon_color']) ) {
			$sidearea_icon_styles[] = 'color: ' . $instance['side_area_opener_icon_color'];
		}
		
		$icon_size = '';
		if ( readanddigest_options()->getOptionValue('side_area_predefined_icon_size') ) {
			$icon_size = readanddigest_options()->getOptionValue('side_area_predefined_icon_size');
		}
		?>
        <a class="eltdf-side-menu-button-opener <?php echo esc_attr( $icon_size ); ?>" <?php readanddigest_inline_style($sidearea_icon_styles) ?> href="javascript:void(0)">
            <?php echo readanddigest_get_side_menu_icon_html(); ?>
            <?php if ( !empty($instance['side_area_opener_label']) ) {
                echo '<span>'.esc_html($instance['side_area_opener_label']).'</span>';
             } ?>
        </a>

    <?php }

}