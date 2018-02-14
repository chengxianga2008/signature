<?php

if(!function_exists('readanddigest_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function readanddigest_is_responsive_on() {
        return readanddigest_options()->getOptionValue('responsiveness') !== 'no';
    }
}