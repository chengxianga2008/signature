<?php

if(!function_exists('readanddigest_get_button_html')) {
    /**
     * Calls button shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function readanddigest_get_button_html($params) {
        $button_html = readanddigest_execute_shortcode('eltdf_button', $params);
        $button_html = str_replace("\n", '', $button_html);
        return $button_html;
    }
}