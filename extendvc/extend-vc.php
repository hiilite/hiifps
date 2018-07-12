<?php
if (!defined('WPB_VC_VERSION')) {
	return;
}

// Map the block with vc_map()
vc_map(
    array(
        'name' => __('HiiFPS', 'hiifps'),
        'base' => 'hiifps',
        'description' => __('Hiilite Featured Posts Slider', 'hiifps'),
        'category' => __('by Hiilite'),
        'icon' => HIIFEATUREPOSTSLIDER_URL . '/assets/images/vc-icon.png',
        'allowed_container_element' => 'vc_row',
        'params' => array(
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Blog Title Heading",
				"param_name" => "blog_title_h",
				'value' => array(
						__( 'Default', 'hiifps' ) => 'h2',
						'H1' => 'h1',
						'H2' => 'h2',
						'H3' => 'h3',
						'H4' => 'h4',
						'H5' => 'h5',
						'H6' => 'h6',
						
				),
				"description" => __( "Choose the heading style of the blog title", "hiifps" )
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Blog Date Heading",
				"param_name" => "blog_date_h",
				'value' => array(
						__( 'Default', 'hiifps' ) => 'h5',
						'H1' => 'h1',
						'H2' => 'h2',
						'H3' => 'h3',
						'H4' => 'h4',
						'H5' => 'h5',
						'H6' => 'h6',
						
				),
				"description" => __( "Choose the heading style of the date", "hiifps" )
			),
			array(
                "type"        => "colorpicker",
                "class" => "",
				"heading" => __( "Slide Background Color", "hiifps" ),
				"param_name" => "slide_bg_color",
				"value" => '#efeff0',
				"description" => __( "Choose default slide background color", "hiifps" )
            ),
            array(
                "type"        => "colorpicker",
                "class" => "",
				"heading" => __( "Content Area Background Color", "hiifps" ),
				"param_name" => "card_bg_color",
				"value" => '#ffffff',
				"description" => __( "Choose the content area background color", "hiifps" )
            ),
			array(
				"type" => "textfield",
				"heading" => "Arrow Size",
				"param_name" => "fa_size",
				'value' => '20',
				"description" => "Arrow Size (px)"
			),
			array(
                "type"        => "colorpicker",
                "class" => "",
				"heading" => __( "Arrow Color", "hiifps" ),
				"param_name" => "arrow_color",
				"value" => '#333333',
				"description" => __( "Choose arrow color", "hiifps" )
            ),
            array(
				"type" => "checkbox",
				"holder" => "div",
				"class" => "",
				"heading" => "White Text",
				"param_name" => "white_txt",
				"description" => __( "Make all the text white", "hiifps" )
			),
        ),
    )
);
?>