<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Romancy_Elementor_Room_List_Carousel extends Widget_Base {

	
	public function get_name() {
		return 'romancy_elementor_room_list_carousel';
	}

	
	public function get_title() {
		return esc_html__( 'Room List Carousel', 'romancy' );
	}

	
	public function get_icon() {
		return 'eicon-posts-carousel';
	}

	
	public function get_categories() {
		return [ 'romancy' ];
	}

	public function get_script_depends() {
		// Carousel
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/libs/carousel/assets/owl.carousel.min.css' );
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/libs/carousel/owl.carousel.min.js', array('jquery'), false, true );
		return [ 'romancy-elementor-room-list-carousel' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'romancy' ),
			]
		);	
			
			// Add Class control
			$args_query	= [
				'taxonomy' 	=> 'product_cat',
				'orderby' 	=> 'name',
	        	'order'   	=> 'ASC'
			];
            
            $categories            = get_categories($args_query);
            $default_category      = array( 'all' => esc_html__( 'All', 'romancy' ) );
            $categories_data       = array();
            $result                = array();      

            if ( $categories && is_array( $categories ) ) {
				foreach ( $categories as $category ) {
					$categories_data[$category->slug] = $category->cat_name;
				}
			}

			$result = array_merge( $default_category, $categories_data );

			$this->add_control(
				'template',
				[
					'label' 	=> esc_html__( 'Template', 'romancy' ),
					'type' 		=> Controls_Manager::SELECT,
					'default' 	=> 'template1',
					'options' 	=> [
						'template1' => esc_html__( 'Template 1', 'romancy' ),
						'template2' => esc_html__( 'Template 2', 'romancy' ),
					],
				]
			);

			$this->add_control(
				'visibility',
				[
					'label' 	=> esc_html__( 'Room Visibility', 'romancy' ),
					'type' 		=> Controls_Manager::SELECT,
					'default' 	=> 'public',
					'options' 	=> [
						'featured' => esc_html__( 'Featured', 'romancy' ),
						'public' 	=> esc_html__( 'Public', 'romancy' ),
					],
				]
			);

			$this->add_control(
				'categories',
				[
					'label' 	=> esc_html__( 'Select Category', 'romancy' ),
					'type' 		=> Controls_Manager::SELECT,
					'default' 	=> 'all',
					'options' 	=> $result,
				]
			);

			$this->add_control(
				'posts_per_page',
				[
					'label' 	=> esc_html__( 'Posts Per Page', 'romancy' ),
					'type' 		=> Controls_Manager::NUMBER,
					'default' 	=> 4,
				]
			);

			$this->add_control(
				'orderby',
				[
					'label' 	=> esc_html__( 'Order By', 'romancy' ),
					'type' 		=> Controls_Manager::SELECT,
					'default' 	=> 'title',
					'options' 	=> [
						'title' => esc_html__( 'Title', 'romancy' ),
						'ID' 	=> esc_html__( 'ID', 'romancy' ),
						'date' 	=> esc_html__( 'Date', 'romancy' ),
						'random' => esc_html__( 'Random', 'romancy' ),
					],
				]
			);

			$this->add_control(
				'order',
				[
					'label' 	=> esc_html__( 'Order', 'romancy' ),
					'type' 		=> Controls_Manager::SELECT,
					'default' 	=> 'DESC',
					'options' 	=> [
						'ASC' 	=> esc_html__( 'Ascending', 'romancy' ),
						'DESC' 	=> esc_html__( 'Descending', 'romancy' ),
					],
				]
			);

		$this->end_controls_section();

		/*****************************************************************
						START SECTION ADDITIONAL
		******************************************************************/

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => esc_html__( 'Additional Options', 'romancy' ),
			]
		);

		    $this->add_control(
				'margin_items',
				[
					'label'   => esc_html__( 'Margin Right Items', 'romancy' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 30,
				]
			);

			$this->add_control(
				'item_number',
				[
					'label'       => esc_html__( 'Item Number', 'romancy' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Number Item', 'romancy' ),
					'default'     => 3,
				]
			);

			$this->add_control(
				'slides_to_scroll',
				[
					'label'       => esc_html__( 'Slides to Scroll', 'romancy' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Set how many slides are scrolled per swipe.', 'romancy' ),
					'default'     => 1,
				]
			);

			$this->add_control(
				'pause_on_hover',
				[
					'label'   => esc_html__( 'Pause on Hover', 'romancy' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'romancy' ),
						'no'  => esc_html__( 'No', 'romancy' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'infinite',
				[
					'label'   => esc_html__( 'Infinite Loop', 'romancy' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'romancy' ),
						'no'  => esc_html__( 'No', 'romancy' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'autoplay',
				[
					'label'   => esc_html__( 'Autoplay', 'romancy' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'romancy' ),
						'no'  => esc_html__( 'No', 'romancy' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'autoplay_speed',
				[
					'label'     => esc_html__( 'Autoplay Speed', 'romancy' ),
					'type'      => Controls_Manager::NUMBER,
					'default'   => 3000,
					'step'      => 500,
					'condition' => [
						'autoplay' => 'yes',
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'smartspeed',
				[
					'label'   => esc_html__( 'Smart Speed', 'romancy' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 500,
				]
			);

			$this->add_control(
				'dot_control',
				[
					'label'   => esc_html__( 'Show Dots', 'romancy' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'romancy' ),
						'no'  => esc_html__( 'No', 'romancy' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'nav_control',
				[
					'label'   => esc_html__( 'Show Nav', 'romancy' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'no',
					'options' => [
						'yes' => esc_html__( 'Yes', 'romancy' ),
						'no'  => esc_html__( 'No', 'romancy' ),
					],
					'frontend_available' => true,
				]
			);

		$this->end_controls_section();

		/****************************  END SECTION ADDITIONAL *********************/

		$this->start_controls_section(
			'section_room_list_style',
			[
				'label' => esc_html__( 'Carousel Item', 'romancy' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' 		=> 'room_border',
					'label' 	=> esc_html__( 'Border', 'romancy' ),
					'selector' 	=> '{{WRAPPER}} .ova-room-list-carousel .room-content',
				]
			);

			$this->add_responsive_control(
				'room_border_radius',
				[
					'label' 		=> esc_html__( 'Border Radius', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-room-list-carousel .room-content, {{WRAPPER}} .ova-room-list-carousel .room-content .mask, {{WRAPPER}} .ova-room-list-carousel .room-content img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'room_content_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'room_bgcolor',
				[
					'label' 	=> esc_html__( 'Backgound Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content' => 'background-color: {{VALUE}}',
					],
				]
			);

		$this->end_controls_section();

        // Title room (product) style
		$this->start_controls_section(
			'section_room_title_style',
			[
				'label' => esc_html__( 'Room Title', 'romancy' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'room_title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-title',
				]
			);

			$this->add_responsive_control(
				'room_title_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'room_title_color_normal',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-title' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'room_title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-title:hover' => 'color: {{VALUE}}',
					],
				]
			);

		$this->end_controls_section();

        // Price style
		$this->start_controls_section(
			'section_room_price_style',
			[
				'label' => esc_html__( 'Room Price', 'romancy' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'room_text_before_price_color',
				[
					'label' 	=> esc_html__( 'Text Before Price Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-price .text-before' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'room_price_amount_color',
				[
					'label' 	=> esc_html__( 'Price Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-price .woocommerce-Price-amount' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'room_text_after_price_color',
				[
					'label' 	=> esc_html__( 'Text After Price Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-price .text-after' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'room_price_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-price' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'room_price_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

        // Room info crossbar
		$this->start_controls_section(
			'section_room_info_style',
			[
				'label' => esc_html__( 'Room Info', 'romancy' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'room_info_typography',
					'selector' 	=> '{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-info li',
				]
			);

			$this->add_control(
				'room_info_color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-info li' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'room_info_dots_color',
				[
					'label' 	=> esc_html__( 'Dots Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-info li:not(:last-child):before' => 'background-color: {{VALUE}}',
					],
					'condition' => [
						'template' => 'template1'
					]
				]
			);

			$this->add_control(
				'room_info_icon_color',
				[
					'label' 	=> esc_html__( 'Icon Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-info li i' => 'color: {{VALUE}}',
					],
					'condition' => [
						'template' => 'template2'
					]
				]
			);

			$this->add_control(
				'room_info_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-info' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'room_info_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'room_info_border_radius',
				[
					'label' 		=> esc_html__( 'Border Radius', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .room-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);		

		$this->end_controls_section();

		// Book now button style ( template 2 )
		$this->start_controls_section(
			'section_book_now_style',
			[
				'label' => esc_html__( 'Book Now Button', 'romancy' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'template' => 'template2'
				]
			]
		);

		    $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'text_book_now_typography',
					'selector' 	=> '{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .ova-room-book-now .text-button',
				]
			);

			$this->add_control(
				'book_now_color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .ova-room-book-now' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'book_now_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .ova-room-book-now:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'book_now_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .ova-room-book-now' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'book_now_margin',
				[
					'label' 		=> esc_html__( 'Margin', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .room-content .ova-room-book-now' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		/* Begin Nav Style */
		$this->start_controls_section(
            'nav_style',
            [
                'label' => esc_html__( 'Nav Control', 'romancy' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
					'nav_control' => 'yes',
				]
            ]
        );

			$this->add_responsive_control(
				'nav_icon_size',
				[
					'label' 	=> esc_html__( 'Icon Size', 'romancy' ),
					'type' 		=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 40,
						],
					],
					'size_units' 	=> [ 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .owl-nav button i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'nav_top_position',
				[
					'label' 	=> esc_html__( 'Top Position', 'romancy' ),
					'type' 		=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => -150,
							'max' => 450,
						],
						'%' => [
							'min' => -150,
							'max' => 150,
						],
					],
					'size_units' 	=> [ 'px', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .owl-nav button' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'nav_right_position',
				[
					'label' 	=> esc_html__( 'Right Position', 'romancy' ),
					'type' 		=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 450,
						],
						'%' => [
							'min' => 0,
							'max' => 150,
						],
					],
					'size_units' 	=> [ 'px', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-room-list-carousel .owl-carousel .owl-nav button' => 'right: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_nav_style' );

				$this->start_controls_tab(
		            'tab_nav_normal',
		            [
		                'label' => esc_html__( 'Normal', 'romancy' ),
		            ]
		        );

					$this->add_control(
			            'nav_color_normal',
			            [
			                'label' 	=> esc_html__( 'Color', 'romancy' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-room-list-carousel .owl-carousel .owl-nav button i' => 'color: {{VALUE}}',
			                ],
			            ]
			        );

			        $this->add_control(
			            'nav_bgcolor_normal',
			            [
			                'label' 	=> esc_html__( 'Background Color', 'romancy' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-room-list-carousel .owl-carousel .owl-nav button.owl-next, {{WRAPPER}} .ova-room-list-carousel .owl-carousel .owl-nav button.owl-prev' => 'background-color: {{VALUE}}',
			                ],
			            ]
			        );

				$this->end_controls_tab();

				$this->start_controls_tab(
		            'tab_nav_hover',
		            [
		                'label' => esc_html__( 'Hover', 'romancy' ),
		            ]
		        );

					$this->add_control(
			            'nav_color_hover',
			            [
			                'label' 	=> esc_html__( 'Color', 'romancy' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-room-list-carousel .owl-carousel .owl-nav button:hover i' => 'color: {{VALUE}}',
			                ],
			            ]
			        );

			        $this->add_control(
			            'nav_bgcolor_hover',
			            [
			                'label' 	=> esc_html__( 'Background Color', 'romancy' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-room-list-carousel .owl-carousel .owl-nav button.owl-next:hover, {{WRAPPER}} .ova-room-list-carousel .owl-carousel .owl-nav button.owl-prev:hover' => 'background-color: {{VALUE}}',
			                ],
			            ]
			        );

				$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_control(
	            'nav_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'romancy' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-room-list-carousel .owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
        /* End Nav Style */

		/* Begin Dots Style */
		$this->start_controls_section(
            'dots_style',
            [
                'label' => esc_html__( 'Dots', 'romancy' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
					'dot_control' => 'yes',
				]
            ]
        );

            $this->add_control(
	            'dots_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'romancy' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-room-list-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

			$this->start_controls_tabs( 'tabs_dots_style' );
				
				$this->start_controls_tab(
		            'tab_dots_normal',
		            [
		                'label' => esc_html__( 'Normal', 'romancy' ),
		            ]
		        );

		            $this->add_control(
						'dot_color',
						[
							'label' 	=> esc_html__( 'Color', 'romancy' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-room-list-carousel .owl-dots .owl-dot span' => 'background: {{VALUE}}',
							],
						]
					);

					$this->add_responsive_control(
						'dots_width',
						[
							'label' 	=> esc_html__( 'Width', 'romancy' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-room-list-carousel .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'dots_height',
						[
							'label' 	=> esc_html__( 'Height', 'romancy' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-room-list-carousel .owl-dots .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
			            'dots_border_radius',
			            [
			                'label' 		=> esc_html__( 'Border Radius', 'romancy' ),
			                'type' 			=> Controls_Manager::DIMENSIONS,
			                'size_units' 	=> [ 'px', '%' ],
			                'selectors' 	=> [
			                    '{{WRAPPER}} .ova-room-list-carousel .owl-dots .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_dots_active',
		            [
		                'label' => esc_html__( 'Active', 'romancy' ),
		            ]
		        );

		             $this->add_control(
						'dot_color_active',
						[
							'label' 	=> esc_html__( 'Color', 'romancy' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-room-list-carousel .owl-dots .owl-dot.active span' => 'background: {{VALUE}}',
							],
						]
					);

					$this->add_responsive_control(
						'dots_width_active',
						[
							'label' 	=> esc_html__( 'Width', 'romancy' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-room-list-carousel .owl-dots .owl-dot.active span' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'dots_height_active',
						[
							'label' 	=> esc_html__( 'Height', 'romancy' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-room-list-carousel .owl-dots .owl-dot.active span' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
			            'dots_border_radius_active',
			            [
			                'label' 		=> esc_html__( 'Border Radius', 'romancy' ),
			                'type' 			=> Controls_Manager::DIMENSIONS,
			                'size_units' 	=> [ 'px', '%' ],
			                'selectors' 	=> [
			                    '{{WRAPPER}} .ova-room-list-carousel .owl-dots .owl-dot.active span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();
			$this->end_controls_tabs();

        $this->end_controls_section();
        /* End Dots Style */
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();
		$template = $settings['template'];

		$args = [
			'posts_per_page' 	=> $settings['posts_per_page'],
			'orderby' 			=> $settings['orderby'],
			'order' 			=> $settings['order'],
			'category_slug'		=> $settings['categories'],
		];

		if ( $settings['visibility'] === 'featured' ) {
            $rooms =  romancy_get_featured_product( $args );
		}
		else {
			$rooms =  romancy_get_product( $args );
		}

		// carousel data option
		$data_options['items']              = $settings['item_number'];
		$data_options['slideBy']            = $settings['slides_to_scroll'];
		$data_options['margin']             = $settings['margin_items'];
		$data_options['autoplayHoverPause'] = $settings['pause_on_hover'] === 'yes' ? true : false;
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplay_speed']     = $settings['autoplay_speed'] ? $settings['autoplay_speed'] : '3000';
		$data_options['smartSpeed']         = $settings['smartspeed'] ? $settings['smartspeed'] : '500';
		$data_options['dots']               = $settings['dot_control'] === 'yes' ? true : false;
		$data_options['nav']               	= $settings['nav_control'] === 'yes' ? true : false;
		$data_options['rtl']				= is_rtl() ? true: false;
        

		?>

	    <?php if ( $rooms->have_posts() ) : 
	     	$i = 0;
	    ?>
            <div class="ova-room-list-carousel">

				<div class="room-list-carousel owl-carousel owl-theme" data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
					<?php while( $rooms->have_posts() ) : $rooms->the_post();
						$id 		= get_the_id();
						$title 		= get_the_title();
						$link 		= get_permalink( $id );
						$image_id 	= get_post_thumbnail_id();
						$image_url  = wp_get_attachment_image_url( $image_id , 'romancy_thumbnail' );
						$image_alt 	= '';

						if ( $image_id ) {
							$image_alt 		= get_post_meta( $image_id, '_wp_attachment_image_alt', true );
							if ( empty( $image_alt ) ) {
								$image_alt = get_the_title( $image_id );
							}
						}

						$price             = get_post_meta( $id, '_regular_price', true );
						$bed_number        = get_post_meta( $id, 'ovabrw_bed_number', true );
						$area_number       = get_post_meta( $id, 'ovabrw_acreage_number', true );
						$area_unit         = get_post_meta( $id, 'ovabrw_acreage_unit', true );
						$parking           = get_post_meta( $id, 'ovabrw_parking', true );

					?>

                    <?php if( $template == "template1") : ?>
	                    <div class="item room-content">
							
							<a class="room-image" href="<?php echo esc_url( $link ); ?>">
								<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
							</a>
                            
                            <?php if( !empty($bed_number) || !empty($area_number) || !empty($parking)  ) { ?>

								<ul class="room-info">

									<?php if ( ! empty( $bed_number ) ) { ?>
									    <li class="bed">
											<span>
												<?php if ( $bed_number == 1 ): ?>
													<?php echo esc_html( $bed_number ) . ' ' . esc_html__('Bed','romancy');?>
												<?php else: ?>
													<?php echo esc_html( $bed_number ) . ' ' . esc_html__('Beds','romancy');?>
												<?php endif; ?>
											</span>
										</li>
									<?php } ?>

									<?php if( !empty($area_number) ) { ?>
										<li class="square">
											<span>
												<?php echo esc_html( $area_number );?>
												<?php if ( strcasecmp($area_unit, 'sqm') == 0 ) {
													echo esc_html( $area_unit ) ; }
												else {
													echo esc_html( $area_unit ); ?><sup><?php esc_html_e( '2', 'romancy' ); ?></sup>
												<?php } ?>
											</span>
										</li>
									<?php } ?>

									<?php if( !empty($parking) ) { ?>
										<li class="parking">
											<span>
												<?php echo esc_html( $parking );?>	
											</span>
										</li>
									<?php } ?>

								</ul>

							<?php } ?>

							<a href="<?php echo esc_url( $link ); ?>">
								<h2 class="room-title">
									<?php echo esc_html( $title ); ?>
								</h2>
							</a>

		                   <div class="room-price">
								<span class="text-before">
									<?php echo esc_html__('From','romancy'); ?>
								</span>
		                    	<?php echo wc_price( $price ); ?>
		                    	<span class="text-after">
									<?php echo esc_html__('/night','romancy'); ?>
								</span>
		                    </div>	

						</div>
					<?php else : ?>
						<div class="item room-content room-content-2">
							
							<a class="room-image" href="<?php echo esc_url( $link ); ?>">
								<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
								<div class="room-price">
									<span class="text-before">
										<?php echo esc_html__('From','romancy'); ?>
									</span>
			                    	<?php echo wc_price( $price ); ?><span class="text-after"><?php echo esc_html__('/night','romancy'); ?></span>
			                    </div>	
							</a>

							<a href="<?php echo esc_url( $link ); ?>">
								<h2 class="room-title">
									<?php echo esc_html( $title ); ?>
								</h2>
							</a>
                            
                            <?php if( !empty($bed_number) || !empty($area_number) ) { ?>

								<ul class="room-info">

									<?php if( !empty($bed_number) ) { ?>
									    <li class="bed">
									    	<i aria-hidden="true" class="icomoon icomoon-bed"></i>
											<span>
												<?php echo esc_html( $bed_number );?>	
											</span>
										</li>
									<?php } ?>

									<?php if( !empty($area_number) ) { ?>
										<li class="square">
											<i aria-hidden="true" class="icomoon icomoon-measure"></i>
											<span>
												<?php echo esc_html( $area_number );?>
												<?php if ( strcasecmp($area_unit, 'sqm') == 0 ) {
													echo esc_html( $area_unit ) ; }
												else {
													echo esc_html( $area_unit ); ?><sup><?php esc_html_e( '2', 'romancy' ); ?></sup>
												<?php } ?>
											</span>
										</li>
									<?php } ?>

								</ul>

							<?php } ?>	

							<a class="ova-room-book-now" href="<?php echo esc_url( $link ); ?>">
								<span class="text-button">
									<?php echo esc_html__('Book now', 'romancy');?>
								</span>
								<i class="ovaicon ovaicon-next" aria-hidden="true"></i>
							</a>

						</div>
					<?php endif; ?>

					<?php $i++; endwhile; ?>

				</div>

			</div>

	    <?php else: ?>
		<div class="ova-rooms-not-found">
			<?php echo esc_html( 'Rooms not found', 'romancy' ); ?>
		</div>
		<?php endif; wp_reset_postdata(); ?>
		 	
		<?php
	}

	
}

$widgets_manager->register( new Romancy_Elementor_Room_List_Carousel() );