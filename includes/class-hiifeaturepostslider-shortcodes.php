<?php
/**
 * 
 * Generates HiiFeaturePostSlider from shortcode
 * 
 **/
function hii_fps_func( $atts ) {
    $a = shortcode_atts( array(
        'id' => '',
    ), $atts );

	include(HIIFEATUREPOSTSLIDER_DIR . '/templates/hiifeaturepostslider-basic.php');
	
    return $html;
}
add_shortcode( 'hiifps', 'hii_fps_func' );