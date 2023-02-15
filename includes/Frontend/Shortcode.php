<?php

namespace Kausar94\HastechAcademy\Frontend;

/**
 * Shortcode handeler class
 */

class Shortcode {

    /**
     * inilize class
     */
    function __construct(){
        add_shortcode('hastech-academy', [$this, 'render_shortcode']);
    }

    /**
     * Shortcode hnadelker class
     * 
     * @param array $atts
     * @param string $content
     * 
     * @return string
    */
    public function render_shortcode( $atts, $content='' ){
        return 'Hello from shortcode';
    }

}