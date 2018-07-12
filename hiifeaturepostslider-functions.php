<?php
/**
 * 
 * Add shortcode column to featurepostslider in dashboard
 * 
 **/
function hii_featurepostslider_shortcode_column($columns) {
  $new = array();
  foreach($columns as $key => $title) {
    if ($key=='date') // Put the Thumbnail column before the Author column
      $new['shortcode'] = 'Shortcode';
    $new[$key] = $title;
  }
  return $new;
}
add_filter('manage_featurepostslider_posts_columns', 'hii_featurepostslider_shortcode_column');


function hii_featurepostslider_shortcode($column_name, $post_id) {
    if ($column_name == 'shortcode') {
       return '[hiifps id="'.$post_id.'"]';
    }
}
add_action('manage_featurepostslider_posts_custom_column', 'hii_featurepostslider_shortcode', 10, 2);