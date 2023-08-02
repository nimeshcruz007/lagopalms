<?php if (!defined( 'ABSPATH' )) exit;

if( !class_exists('Romancy_Shortcode') ){
    
    class Romancy_Shortcode {

        public function __construct() {

            add_shortcode( 'romancy-elementor-template', array( $this, 'romancy_elementor_template' ) );
            
        }

        public function romancy_elementor_template( $atts ){

            $atts = extract( shortcode_atts(
            array(
                'id'  => '',
            ), $atts) );

            $args = array(
                'id' => $id
                
            );

            if( did_action( 'elementor/loaded' ) ){
                return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id );    
            }
            return;

            
        }

        

    }
}



return new Romancy_Shortcode();

