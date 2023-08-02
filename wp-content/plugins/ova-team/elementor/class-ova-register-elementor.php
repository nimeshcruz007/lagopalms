<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */

class Ova_Team_Register_Elementor {

    function __construct() {
            
        // Register Header Footer Category in Pane
        add_action( 'elementor/elements/categories_registered', array( $this, 'ovateam_add_category' ) );

        add_action( 'elementor/frontend/after_register_scripts', array( $this, 'ovateam_enqueue_scripts' ) );
        
        add_action( 'elementor/widgets/register', array( $this, 'ovateam_include_widgets' ) );
    }

    function ovateam_add_category( ) {
        \Elementor\Plugin::instance()->elements_manager->add_category(
            'team',
	        [
	            'title' => __( 'Team', 'ova-team' ),
	            'icon' => 'fa fa-plug',
	        ]
        );
    }

    function ovateam_enqueue_scripts() {
        $files = glob( OVATEAM_PLUGIN_PATH . 'assets/js/elementor/*.js' );
       
        foreach ($files as $file) {
            $file_name = wp_basename($file);
            $handle    = str_replace(".js", '', $file_name);
            $src       = OVATEAM_PLUGIN_URI . 'assets/js/elementor/' . $file_name;

            if (file_exists($file)) {
                wp_enqueue_script( 'ovapro-elementor-' . $handle, $src, ['jquery'], null, true );
            }
        }
    }

    function ovateam_include_widgets( $widgets_manager ) {
        $files = glob( OVATEAM_PLUGIN_PATH . 'elementor/widgets/*.php' );

        foreach ($files as $file) {
            $file = OVATEAM_PLUGIN_PATH . 'elementor/widgets/' .wp_basename($file);
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }
}

new Ova_Team_Register_Elementor();