<?php
$arrow_color = $fa_size = $white = $white_txt = $blog_date_h = $blog_title_h = $slide_bg_color = $card_bg_color = '';
extract( vc_map_get_attributes( 'hiifps', $atts ) );

$postimg = $html = '';
$html .= '<div class="hiifps-wrap">
<div class="hiifps">';
	
$args = array(
	'posts_per_page' => 3,
    'orderby' => 'most_recent',
    'ignore_sticky_posts' => true
);

$count = 1;

$the_query = new WP_Query( $args );

while ( $the_query->have_posts() ) {
	
	$the_query->the_post();
	
	
	if ( !empty( get_the_post_thumbnail_url() ) ) { 
		$postimg = ' data-background="' . get_the_post_thumbnail_url() . '"'; 
	} 
	else { 
		$postimg = ' data-bgcolor="' . $slide_bg_color . '"'; 
	}
	
	if ( $white_txt == true ) {
		$white = 'white';
	} else {
		$white = null;
	}
	
	$html .= "<div class='hiifps-slide hiifps-slide{$count}' {$postimg}>";

	$html .= '<div class="hiifps-content" style="background-color:' . $card_bg_color . ';">';

	$html .= '<div class="hiifps-title">';
	$html .= '<' . $blog_title_h . ' class="' . $white . '"><a href="' . get_the_permalink() . '">' . get_the_title() .'</a> </' . $blog_title_h . '> ';
	$html .= '</div>';
	// END hiifps-title

	$html .= '<div class="hiifps-date">';
	$html .= '<' . $blog_date_h . ' class="' . $white . '">' . get_the_time('d M') . '</' . $blog_date_h . '>';
	$html .= '</div>';
	// END hiifps-date

	$html .= '<div class="hiifps-excerpt ' . $white . '">';
	$limit = 20;
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	    array_pop($excerpt);
	    $excerpt = implode(" ",$excerpt).'...';
	} else {
	    $excerpt = implode(" ",$excerpt);
	}
	  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	$html .= $excerpt;
	$html .= '</div>';
	// END hiifps-excerpt

	$html .= '<div class="hiifps-arrows ' . $white . '"><i class="fa fa-chevron-circle-left" style="color:' . $arrow_color . ' !important;font-size:' . $fa_size . 'px;"></i> <i class="fa fa-chevron-circle-right" style="color:' . $arrow_color . ' !important;font-size:' . $fa_size . 'px;"></i></div>';

	$html .= '</div>';
	// END hiifps-content 
	$html .= '</div>';
	// END hiifps-slide
	$count++;
}

$html .= '</div></div>';