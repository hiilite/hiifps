<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * HiiWaterwheel_Install
 */
class HiiFeaturePostSlider_Install {
	/**
	 * install function.
	 * 
	 * @access public
	 * @static
	 * @return void
	 */
	public static function install() {
		global $wpdb;
		
		// Redirect to setup screen for new installs
		if ( ! get_option(  'hiifeaturepostslider_version' ) ) {
			set_transient( '_hiifeaturepostslider_activation_redirect', 1, HOUR_IN_SECONDS);
		}
		
		delete_transient( 'hiifeaturepostslider_addons_html' );
		update_option( 'hiifeaturepostslider_version', HIIFEATUREPOSTSLIDER_VERSION );
	}
}