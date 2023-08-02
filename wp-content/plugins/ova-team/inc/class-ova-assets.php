<?php 
defined( 'ABSPATH' ) || exit();

if( !class_exists( 'OVATEAM_assets' ) ){
	class OVATEAM_assets{

		public function __construct(){

			add_action( 'wp_enqueue_scripts', array( $this, 'ovateam_enqueue_scripts' ), 10, 0 );

			/* Add JS for Elementor */
			add_action( 'elementor/frontend/after_register_scripts', array( $this, 'ova_enqueue_scripts_elementor_team' ) );

			// Add lib counter
			add_action( 'elementor/frontend/after_register_scripts', array( $this, 'ova_enqueue_scripts_appear_team' ) );
			add_action( 'elementor/frontend/after_register_scripts', array( $this, 'ova_enqueue_scripts_odometer_team' ) );
			
		}



		public function ovateam_enqueue_scripts(){

			// Init Css
			wp_enqueue_style( 'team_style', OVATEAM_PLUGIN_URI.'assets/css/style.css' );			
			
			// odometer css
			wp_enqueue_style( 'team_odometer_style', OVATEAM_PLUGIN_URI.'assets/js/lib/odometer/odometer.min.css' );


		}

		//Add JS lib 
		// Add Appear JS
		public function ova_enqueue_scripts_appear_team(){
			wp_enqueue_script( 'script-Appear-team', OVATEAM_PLUGIN_URI. 'assets/js/lib/appear/appear.js', [ 'jquery' ], false, true );
		}

		// Add odomenter JS
		public function ova_enqueue_scripts_odometer_team(){
			wp_enqueue_script( 'script-Odometer-team', OVATEAM_PLUGIN_URI. 'assets/js/lib/odometer/odometer.min.js', [ 'jquery' ], false, true );
		}

		// Add JS for elementor
		public function ova_enqueue_scripts_elementor_team(){
			wp_enqueue_script( 'script-elementor-team', OVATEAM_PLUGIN_URI. 'assets/js/script-elementor.js', [ 'jquery' ], false, true );
		}

	}
	new OVATEAM_assets();
}
