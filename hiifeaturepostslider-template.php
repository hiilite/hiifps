<?php
/**
 * Template Functions
 *
 * Template functions specifically created for job listings
 *
 * @author 		Hiilite
 * @category 	Core
 * @package 	HiiFeaturePostSlider/Template
 * @version     1.0.0
 */

/**
 * Gets and includes template files.
 *
 * @since 1.0.0
 * @param mixed  $template_name
 * @param array  $args (default: array())
 * @param string $template_path (default: '')
 * @param string $default_path (default: '')
 */
function get_featurepostslider_template( $template_name, $args = array(), $template_path = 'hiifeaturepostslider', $default_path = '' ) {
	if ( $args && is_array( $args ) ) {
		extract( $args );
	}
	include( locate_featurepostslider_template( $template_name, $template_path, $default_path ) );
}
/**
 * Locates a template and return the path for inclusion.
 *
 * This is the load order:
 *
 *		yourtheme		/	$template_path	/	$template_name
 *		yourtheme		/	$template_name
 *		$default_path	/	$template_name
 *
 * @since 1.0.0
 * @param string      $template_name
 * @param string      $template_path (default: 'hiifeaturepostslider')
 * @param string|bool $default_path (default: '') False to not load a default
 * @return string
 */
function locate_featurepostslider_template( $template_name, $template_path = 'hiifeaturepostslider', $default_path = '' ) {
	// Look within passed path within the theme - this is priority
	$template = locate_template(
		array(
			trailingslashit( $template_path ) . $template_name,
			$template_name
		)
	);

	// Get default template
	if ( ! $template && $default_path !== false ) {
		$default_path = $default_path ? $default_path : HIIFEATUREPOSTSLIDER_DIR . '/templates/';
		if ( file_exists( trailingslashit( $default_path ) . $template_name ) ) {
			$template = trailingslashit( $default_path ) . $template_name;
		}
	}
	// Return what we found
	return apply_filters( 'hiifeaturepostslider_locate_template', $template, $template_name, $template_path );
}


/**
 * Gets template part (for templates in loops).
 *
 * @since 1.0.0
 * @param string      $slug
 * @param string      $name (default: '')
 * @param string      $template_path (default: 'hiifeaturepostslider')
 * @param string|bool $default_path (default: '') False to not load a default
 */
function get_featurepostslider_template_part( $slug, $name = '', $template_path = 'hiifeaturepostslider', $default_path = '' ) {
	$template = '';

	if ( $name ) {
		$template = locate_featurepostslider_template( "{$slug}-{$name}.php", $template_path, $default_path );
		
	}

	// If template file doesn't exist, look in yourtheme/slug.php and yourtheme/job_manager/slug.php
	if ( ! $template ) {
		$template = locate_featurepostslider_template( "{$slug}.php", $template_path, $default_path );
	}

	if ( $template ) {
		load_template( $template, false );
	}
}

/**
 * Adds custom body classes.
 *
 * @since 1.0.0
 * @param  array $classes
 * @return array
 */
function featurepostslider_body_class( $classes ) {
	$classes   = (array) $classes;
	$classes[] = sanitize_title( wp_get_theme() );

	return array_unique( $classes );
}

add_filter( 'body_class', 'featurepostslider_body_class' );