<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * HiiWaterwheel_Admin class.
 */
class HiiFeaturePostSlider_Admin {
	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		include_once( 'class-hiifeaturepostslider-settings.php' );
		include_once( 'class-hiifeaturepostslider-writepanels.php' );
		//include_once( 'class-hiiwaterwheel-setup.php' );

		//$this->settings_page = new HiiWaterwheel_Settings();

		add_action( 'admin_menu', array( $this, 'admin_menu' ), 12 );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}
	/**
	 * admin_enqueue_scripts function.
	 *
	 * @access public
	 * @return void
	 */
	public function admin_enqueue_scripts() {
		global $wp_scripts;

		$screen = get_current_screen();		
		wp_enqueue_style( 'hiifeaturepostslider_admin_css', HIIFEATUREPOSTSLIDER_URL . '/assets/css/admin.css', array(), HIIFEATUREPOSTSLIDER_VERSION );
	}
	/**
	 * admin_menu function.
	 *
	 * @access public
	 * @return void
	 */
	public function admin_menu() {
		global $menu;
		
	}
	/**
	 * Init the settings page
	 */
	public function settings_page() {
		
	}

}
new HiiFeaturePostSlider_Admin();