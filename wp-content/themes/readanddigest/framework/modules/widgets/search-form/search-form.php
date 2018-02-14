<?php

/**
 * Widget that adds search form
 *
 * Class ReadAndDigestSearchForm
 */
class ReadAndDigestSearchForm extends ReadAndDigestWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltdf_search_form', // Base ID
            'Elated Search Form' // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(

        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        ?>


            <form class="eltdf-search-menu-holder" id="searchform-<?php echo rand();?>" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                <div class="eltdf-form-holder">
                    <div class="eltdf-column-left">
                        <input type="text" placeholder="<?php esc_html_e('Search Here', 'readanddigest'); ?>" name="s" class="eltdf-search-field" autocomplete="off" />
                    </div>
                    <div class="eltdf-column-right">
                        <button class="eltdf-search-submit" type="submit" value="Search"><span class="ion-ios-search"></span></button>
                    </div>
                </div>
            </form>

    <?php }
}