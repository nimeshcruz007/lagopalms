<?php

if (!defined( 'ABSPATH' )) {
	exit;
}
if (!class_exists( 'Ova_Tema_Customize' )){

	class Ova_Tema_Customize {

		public function __construct() {
			add_action( 'customize_register', array( $this, 'ova_team_customize_register' ) );
		}

		public function ova_team_customize_register($wp_customize) {

			$this->ova_team_init( $wp_customize );

			do_action( 'ova_team_customize_register', $wp_customize );
		}


		/* Team */
		public function ova_team_init( $wp_customize ){

			$wp_customize->add_section( 'ova_team_section' , array(
				'title'      => esc_html__( 'Team', 'ova-team' ),
				'priority'   => 5,
			) );

			
			$wp_customize->add_setting( 'ova_team_total_record', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '6',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
			) );
			
			$wp_customize->add_control('ova_team_total_record', array(
				'label' => esc_html__('Number of posts per page','ova-team'),
				'section' => 'ova_team_section',
				'settings' => 'ova_team_total_record',
				'type' =>'number'
			));

					$wp_customize->add_setting( 'ova_team_archive_orderby', array(
				  		'type' 			=> 'theme_mod', // or 'option'
				  		'capability' 		=> 'edit_theme_options',
						'theme_supports' 	=> '', // Rarely needed.
						'default' 		=> 'ID',
						'transport' 		=> 'refresh', // or postMessage
						'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
						
					$wp_customize->add_control('ova_team_archive_orderby', array(
						'label' 	=> esc_html__('OrderBy','ova-sev'),
						'section' 	=> 'ova_team_section',
						'settings' 	=> 'ova_team_archive_orderby',
						'type' 		=>'select',
						'choices' 	=> array(
							'ID'     		=> __( 'ID', 'ova-sev' ),
							'title' 		=> esc_html__( 'Title', 'ova-sev' ),
							'date' 			=> esc_html__( 'Date', 'ova-sev' ),
							'rand'      	=> esc_html__( 'Rand', 'ova-sev' ),
							'short_order'  	=> esc_html__( 'Order', 'ova-sev' ),
						)
					));

					$wp_customize->add_setting( 'ova_team_archive_order', array(
					  'type' 			=> 'theme_mod', // or 'option'
					  'capability' 		=> 'edit_theme_options',
					  'theme_supports' 	=> '', // Rarely needed.
					  'default' 		=> 'ASC',
					  'transport' 		=> 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
						
					$wp_customize->add_control('ova_team_archive_order', array(
						'label' 	=> esc_html__('Order','ova-sev'),
						'section' 	=> 'ova_team_section',
						'settings' 	=> 'ova_team_archive_order',
						'type' 		=>'select',
						'choices' 	=> array(
							'ASC'     	=> __( 'ASC', 'ova-sev' ),
							'DESC' 		=> __( 'DESC', 'ova-sev' ),
							
						)
					));


			$wp_customize->add_setting( 'ova_team_layout', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'three_column',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
			$wp_customize->add_control('ova_team_layout', array(
				'label' => esc_html__('Layout','ova-team'),
				'section' => 'ova_team_section',
				'settings' => 'ova_team_layout',
				'type' =>'select',
				'choices' => array(
					'two_column'      => __( '2 column', 'ova-team' ),
					'three_column' => __( '3 column', 'ova-team' ),
					'four_column'      => __( '4 column', 'ova-team' ),
				)
			));
			

			$wp_customize->add_setting( 'header_archive_team', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('header_archive_team', array(
				'label' => esc_html__('Header Archive','ova-team'),
				'section' => 'ova_team_section',
				'settings' => 'header_archive_team',
				'type' =>'select',
				'choices' => apply_filters('romancy_list_header', '')
			));


			$wp_customize->add_setting( 'archive_footer_team', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('archive_footer_team', array(
				'label' => esc_html__('Footer Archive','ova-team'),
				'section' => 'ova_team_section',
				'settings' => 'archive_footer_team',
				'type' =>'select',
				'choices' => apply_filters('romancy_list_footer', '')
			));


			$wp_customize->add_setting( 'header_single_team', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('header_single_team', array(
				'label' => esc_html__('Header Single','ova-team'),
				'section' => 'ova_team_section',
				'settings' => 'header_single_team',
				'type' =>'select',
				'choices' => apply_filters('romancy_list_header', '')
			));


			$wp_customize->add_setting( 'single_footer_team', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('single_footer_team', array(
				'label' => esc_html__('Footer Single','ova-team'),
				'section' => 'ova_team_section',
				'settings' => 'single_footer_team',
				'type' =>'select',
				'choices' => apply_filters('romancy_list_footer', '')
			));

		}

	}

}

new Ova_Tema_Customize();






