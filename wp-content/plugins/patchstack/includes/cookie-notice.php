<?php

// Do not allow the file to be called directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class used for the cookie notice that can be enabled by the user.
 * This is turned off by default.
 */
class P_Cookie_Notice extends P_Core {

	/**
	 * Add the actions required for the cookie notice.
	 *
	 * @param Patchstack $core
	 * @return void
	 */
	public function __construct( $core ) {
		parent::__construct( $core );

		// The cookie notice feature can only be used on an activated license.
		if ( ! $this->license_is_active() || $this->get_option( 'patchstack_license_free', 0 ) == 1 || $this->is_community() ) {
			return;
		}

		// Register the actions if the cookie notice message is turned on.
		if ( $this->get_option( 'patchstack_enable_cookie_notice_message', false ) == true ) {
			add_action( 'wp_footer', array( $this, 'add_cookie_notice' ), 1000 );
			add_action( 'wp_enqueue_scripts', array( $this, 'public_styles' ) );
		}
	}

	/**
	 * Cookie notice output.
	 *
	 * @return void
	 */
	public function add_cookie_notice() {
		require_once dirname( __FILE__ ) . '/views/cookie-notice.php';
	}

	/**
	 * Register CSS and JavaScript file for the cookie notice.
	 *
	 * @return void
	 */
	public function public_styles() {
		wp_enqueue_style( 'patchstack', $this->plugin->url . 'assets/css/public.min.css', array(), $this->plugin->version );
		wp_enqueue_script( 'patchstack', $this->plugin->url . 'assets/js/public.min.js', array(), $this->plugin->version );
	}
}
