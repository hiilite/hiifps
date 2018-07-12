<?php
/*
Plugin Name: Hiilite HiiFPS Post Slider
Plugin URI: https://hiilite.com/wordpress-plugins/hiifps/
Description: A fancy post slider for wordpress
Version: 0.0.1
Author: Hiilite
Author URI: https://hiilite.com
Text Domain: hiifps
Domain Path: /languages/

------------------------------------------------------------------------
Copyright 2009-2018 Hiilite, Inc.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * HiiFeaturePostSlider class.
 * Handles core plugin hooks and action setup.
 *
 * @package hiifeaturepostslider
 * @since 1.0.0
 */
class HiiFeaturePostSlider {
	
	/**
	 * The single instance of the class.
	 *
	 * @var self
	 * @since  1.0.0
	 */
	private static $_instance = null;

	/**
	 * @var HiiFeaturePostSlider_REST_API
	 */
	private $rest_api = null;

	/**
	 * Main HiiFeaturePostSlider Instance.
	 *
	 * Ensures only one instance of HiiFeaturePostSlider is loaded or can be loaded.
	 *
	 * @since  1.0.0
	 * @static
	 * @see HIIFEATUREPOSTSLIDER()
	 * @return self Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	/**
	 * VC Support
	 */
	
	/**
	 * Constructor - get the plugin hooked in and ready
	 */
	public function __construct() {
		// Define constants
		define( 'HIIFEATUREPOSTSLIDER_VERSION', '1.0.0' );
		define( 'HIIFEATUREPOSTSLIDER_URL', untrailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );
		define( 'HIIFEATUREPOSTSLIDER_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
		
		// Includes
		include( 'includes/class-hiifeaturepostslider-install.php');
		include( 'includes/class-hiifeaturepostslider-shortcodes.php');
		
		
		if( is_admin() ) {
			include( 'includes/admin/class-hiifeaturepostslider-admin.php');
		}
		
		// Activation - works with symlinks
		register_activation_hook( basename( dirname( __FILE__ ) ) . '/'. basename( __FILE__ ), array( $this, 'activate' ) );
		
		// Actions
		add_action( 'after_setup_theme', array( $this, 'load_plugin_textdomain') );
		add_action( 'after_setup_theme', array( $this, 'include_template_functions' ), 11);
		add_action( 'widget_init', array( $this, 'widget_init'));
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_scripts' ) );
		add_action( 'admin_init', array( $this, 'updater') );
		
		add_action( 'vc_before_init', array( $this, 'vc_before_init_actions') );
	}
	
	/**
	 * Called on plugin activation
	 */
	public function activate() {
		HiiFeaturePostSlider_Install::install();
		flush_rewrite_rules();
	}
	
	/**
	 * Handle Updates
	 */
	public function updater() {
		if ( version_compare( HIIFEATUREPOSTSLIDER_VERSION, get_option( 'hiifeaturepostslider_version' ), '>' ) ) {
			HiiFeaturePostSlider_Install::install();
			flush_rewrite_rules();
		}
	}
	
	/**
	 * Localisation
	 */
	public function load_plugin_textdomain() {
		load_textdomain( 'hiifeaturepostslider', WP_LANG_DIR . 'hiifeaturepostslider/hiifeaturepostslider-' . apply_filters( 'plugin_locale', get_locale( ), 'hiifeaturepostslider' ) . '.mo' );
		load_plugin_textdomain( 'hiifeaturepostslider', false, dirname( plugin_basename( __FILE__ )) . '/languages/' );
	}
	
	/**
	 * Load functions
	 */
	public function include_template_functions() {
		include( 'hiifeaturepostslider-functions.php' );
		include( 'hiifeaturepostslider-template.php' );
	}

	/**
	 * Widgets init
	 */
	public function widgets_init() {
		include_once( 'includes/class-hiifeaturepostslider-widgets.php' );
	}
	
	/**
	 * Register and enqueue scripts, css and js
	 */
	public function frontend_scripts() {
		wp_enqueue_script( 'hiifeaturepostslider-scripts', HIIFEATUREPOSTSLIDER_URL . '/assets/js/hiifeaturepostslider-scripts.js', array('jquery'), '', null );
		wp_enqueue_style( 'hiifeaturepostslider-frontend', HIIFEATUREPOSTSLIDER_URL . '/assets/css/frontend.css' );
	}
	
	public function vc_before_init_actions() {
	    // Require new custom Element
	    require_once( HIIFEATUREPOSTSLIDER_DIR . '/extendvc/extend-vc.php');
	}
	
}

/**
 * Main instance of WP Job Manager.
 *
 * Returns the main instance of WP Job Manager to prevent the need to use globals.
 *
 * @since  1.26
 * @return WP_Job_Manager
 */
function HIIFEATUREPOSTSLIDER() {
	return HiiFeaturePostSlider::instance();
}

$GLOBALS['hiifeaturepostslider'] = new HiiFeaturePostSlider();

?>