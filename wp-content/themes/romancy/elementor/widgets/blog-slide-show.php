<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Romancy_Elementor_Blog_Slide_Show extends Widget_Base {

	
	public function get_name() {
		return 'romancy_elementor_blog_slide_show';
	}

	
	public function get_title() {
		return esc_html__( 'Blog Slide Show', 'romancy' );
	}

	
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	
	public function get_categories() {
		return [ 'romancy' ];
	}

	public function get_script_depends() {
		
		wp_enqueue_style( 'romancy-owl-carousel', get_template_directory_uri().'/assets/libs/carousel/assets/owl.carousel.min.css' );
		wp_enqueue_script( 'romancy-owl-carousel', get_template_directory_uri().'/assets/libs/carousel/owl.carousel.min.js', array('jquery'), false, true );

		return [ 'romancy-elementor-blog-slide-show' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$args = array(
		  'orderby' => 'name',
		  'order' => 'ASC'
		  );

		$categories  	= get_categories($args);
		$cate_array 	= array();
		$arrayCateAll 	= array( 'all' => esc_html__( 'All categories', 'romancy' ) );
		
		if ($categories) {
			foreach ( $categories as $cate ) {
				$cate_array[$cate->slug] = $cate->cat_name;
			}
		} else {
			$cate_array[ esc_html__( 'No content Category found', 'romancy' ) ] = 0;
		}

		//SECTION CONTENT
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'romancy' ),
			]
		);

			$this->add_control(
				'category',
				[
					'label' => esc_html__( 'Category', 'romancy' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'all',
					'options' => array_merge($arrayCateAll,$cate_array),
				]
			);

			$this->add_control(
				'total_count',
				[
					'label' => esc_html__( 'Post Total', 'romancy' ),
					'type' => Controls_Manager::NUMBER,
					'default' => 6,
				]
			);

			$this->add_control(
				'order_by',
				[
					'label' => esc_html__('Order', 'romancy'),
					'type' => Controls_Manager::SELECT,
					'default' => 'desc',
					'options' => [
						'asc' => esc_html__('Ascending', 'romancy'),
						'desc' => esc_html__('Descending', 'romancy'),
					]
				]
			);

			$this->add_control(
				'text_readmore',
				[
					'label' => esc_html__( 'Text Read More', 'romancy' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__('Read More', 'romancy'),
					'condition' => [
						'show_read_more' => 'yes',
					],
				]
			);

			$this->add_control(
				'show_category',
				[
					'label' => esc_html__( 'Show Category', 'romancy' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'romancy' ),
					'label_off' => esc_html__( 'Hide', 'romancy' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'show_comment',
				[
					'label' => esc_html__( 'Show Comment', 'romancy' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'romancy' ),
					'label_off' => esc_html__( 'Hide', 'romancy' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'show_short_desc',
				[
					'label' => esc_html__( 'Show Short Description', 'romancy' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'romancy' ),
					'label_off' => esc_html__( 'Hide', 'romancy' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'order_text',
				[
					'label' => esc_html__( 'Description Words Total', 'romancy' ),
					'type' => Controls_Manager::NUMBER,
					'default' => 15,
					'condition' => [
						'show_short_desc' => 'yes',
					]
				]
			);


			$this->add_control(
				'show_title',
				[
					'label' => esc_html__( 'Show Title', 'romancy' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'romancy' ),
					'label_off' => esc_html__( 'Hide', 'romancy' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);


			$this->add_control(
				'show_read_more',
				[
					'label' => esc_html__( 'Show Read More', 'romancy' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'romancy' ),
					'label_off' => esc_html__( 'Hide', 'romancy' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);


		$this->end_controls_section();
		//END SECTION CONTENT


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
					'label'   => esc_html__( 'Show Dots(Mobile)', 'romancy' ),
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
				'dot_nav',
				[
					'label'   => esc_html__( 'Show Nav', 'romancy' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'romancy' ),
						'no'  => esc_html__( 'No', 'romancy' ),
					],
					'frontend_available' => true,
				]
			);

		$this->end_controls_section();

		/****************************  END SECTION ADDITIONAL *********************/


		// SECTION GENARAL 
		//SECTION TAB STYLE TITLE
		$this->start_controls_section(
			'section_general_style',
			[
				'label' => esc_html__( 'General', 'romancy' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'padding_general',
				[
					'label' => esc_html__( 'Padding', 'romancy' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-blog .item .blog-content	' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'border_radius_content',
				array(
					'label'      => esc_html__( 'Border Radius', 'romancy' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .ova-blog .item .blog-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$this->add_responsive_control(
				'border_radius_image',
				array(
					'label'      => esc_html__( 'Border Radius image', 'romancy' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .ova-blog .item .media' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);


		$this->end_controls_section();
		// END GENERAL STYLES
		

		//SECTION TAB STYLE TITLE
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'romancy' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ova-blog .post-title a',
				
			]
		);

		$this->add_control(
			'color_title',
			[
				'label' => esc_html__( 'Color Title', 'romancy' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .post-title a' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_title_hover',
			[
				'label' => esc_html__( 'Color Title Hover', 'romancy' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .post-title a:hover' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_title',
			[
				'label' => esc_html__( 'Margin', 'romancy' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog .post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		//END SECTION TAB STYLE TITLE

		// TAB DESCRIPTION
		$this->start_controls_section(
			'section_short_desc',
			[
				'label' => esc_html__( 'Short Description', 'romancy' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_short_desc' => 'yes',
				],
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'short_desc_typography',
					'selector' => '{{WRAPPER}} .ova-blog .short_desc p',
					
				]
			);

			$this->add_control(
				'color_short_desc',
				[
					'label' => esc_html__( 'Color Title', 'romancy' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog .short_desc p' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_short_desc_hover',
				[
					'label' => esc_html__( 'Color Title Hover', 'romancy' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog .short_desc p:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_short_desc',
				[
					'label' => esc_html__( 'Margin', 'romancy' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-blog .short_desc p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		//END SECTION TAB STYLE SHORT DESCRIPTION

		//  META
		$this->start_controls_section(
			'section_meta',
			[
				'label' => esc_html__( 'Meta', 'romancy' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'meta_typography',
					'selector' => '{{WRAPPER}} .ova-blog .item .blog-content .post-meta .post-comment .comment a, 
									{{WRAPPER}} .ova-blog .item .blog-content .post-meta .item-meta .category-blog a',
					
				]
			);

			$this->add_control(
				'text_color_meta',
				[
					'label' => esc_html__( 'Color', 'romancy' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog .item .blog-content .post-meta .post-comment .comment a, .ova-blog .item .blog-content .post-meta .item-meta .category-blog a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'link_color_meta_hover',
				[
					'label' => esc_html__( 'Color hover', 'romancy' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog .item .blog-content .post-meta .item-meta .category-blog a:hover' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-blog .item .blog-content .post-meta .post-comment .comment a:hover' => 'color : {{VALUE}};',
					],
				]
			);

			

			$this->add_control(
				'icon_color_meta',
				[
					'label' => esc_html__( 'Icon Color', 'romancy' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog .item .blog-content .post-meta .item-meta .category-blog i, .ova-blog .item .blog-content .post-meta .item-meta .left i' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'icon_meta_size',
				[
					'label' => esc_html__( 'Size Icon', 'romancy' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-blog .item .blog-content .post-meta .item-meta .category-blog i, .ova-blog .item .blog-content .post-meta .item-meta .left i' => 'font-size: {{SIZE}}{{UNIT}}',
					],
				]
			);

		$this->start_controls_tabs(
			'style_tabs'
		);

			$this->start_controls_tab(
			'style_category_tab',
				[
				'label' => esc_html__( 'Category', 'romancy' ),
				]
			);
				$this->add_responsive_control(
					'margin_meta_category',
					[
						'label' => esc_html__( 'Margin', 'romancy' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
							'{{WRAPPER}} .ova-blog .item .blog-content .post-meta .item-meta .category-blog' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$this->add_responsive_control(
					'padding_meta_category',
					[
						'label' => esc_html__( 'Padding', 'romancy' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
							'{{WRAPPER}} .ova-blog .item .blog-content .post-meta .item-meta .category-blog' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);


			$this->end_controls_tab();


			$this->start_controls_tab(
			'style_comment_tab',
				[
				'label' => esc_html__( 'Comment', 'romancy' ),
				]
			);
				$this->add_responsive_control(
					'margin_meta_comment',
					[
						'label' => esc_html__( 'Margin', 'romancy' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
							'{{WRAPPER}} .ova-blog .item .blog-content .post-meta .post-comment' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$this->add_responsive_control(
					'padding_meta_comment',
					[
						'label' => esc_html__( 'Padding', 'romancy' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
							'{{WRAPPER}} .ova-blog .item .blog-content .post-meta .post-comment' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

			

		$this->end_controls_section();
		// END META STYLES


		//SECTION TAB STYLE READMORE
		$this->start_controls_section(
			'section_readmore',
			[
				'label' => esc_html__( 'Read More', 'romancy' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_read_more' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'readmore_typography',
				'selector' => '{{WRAPPER}} .ova-blog .item .read-more',
				
			]
		);

		$this->add_responsive_control(
			'margin_readmore',
			[
				'label' => esc_html__( 'Margin', 'romancy' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .blog-content .read-more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding_readmore',
			[
				'label' => esc_html__( 'Padding', 'romancy' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .blog-content .read-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'border_readmore_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'romancy' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .ova-blog .item .blog-content .read-more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		// TAB READMORE
		$this->start_controls_tabs(
			'style_tabs_readmore'
		);
			//normal
			$this->start_controls_tab(
				'style_readmore_normal_tab',
				[
				'label' => esc_html__( 'Normal', 'romancy' ),
				]
			);
				$this->add_control(
					'color_readmore',
					[
						'label' => esc_html__( 'Color', 'romancy' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-blog .item .blog-content .read-more' => 'color : {{VALUE}};',
						],
					]
				);

					$this->add_control(
						'bg_color_readmore',
						[
							'label' => esc_html__( 'Background', 'romancy' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-blog .item .blog-content .read-more' => 'background-color : {{VALUE}};',
							],
						]
					);


					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'border_readmore',
							'label' => esc_html__( 'Border', 'romancy' ),
							'selector' => '{{WRAPPER}} .ova-blog .item .blog-content .read-more',
						]
					);

				$this->end_controls_tab();

				//hover
				$this->start_controls_tab(
					'style_readmore_hover_tab',
					[
					'label' => esc_html__( 'Hover', 'romancy' ),
					]
				);

					$this->add_control(
						'color_readmore_hover',
						[
							'label' => esc_html__( 'Color Hover', 'romancy' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-blog .item .blog-content .read-more:hover' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'bg_color_readmore_hover',
						[
							'label' => esc_html__( 'Background Hover', 'romancy' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-blog .item .blog-content .read-more:hover' => 'background-color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'readmore_border_hover',
						[
							'label' => esc_html__( 'Border Color', 'romancy' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-blog .item .blog-content .read-more:hover' => 'border-color : {{VALUE}};',
							],
						]
					);

				$this->end_controls_tab();
			$this->end_controls_tabs();

		$this->end_controls_section();
		//END SECTION TAB STYLE READMORE
			
		//SECTION TAB STYLE DOTS
		$this->start_controls_section(
			'section_dots',
			[
				'label' => esc_html__( 'Dots', 'romancy' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'dot_control' => 'yes',
				],
			]
		);

			$this->add_control(
				'position_bottom',
				[
					'label' 		=> esc_html__( 'Position Bottom', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 70,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-blog.owl-carousel .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);


			$this->add_control(
				'style_dots',
				[
					'label' => esc_html__( 'Dots', 'romancy' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'dot_control' => 'yes',
					],
				]
			);

			$this->add_control(
				'dot_color',
				[
					'label'     => esc_html__( 'Dot Color', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog.owl-carousel .owl-dots button' => 'background-color : {{VALUE}};',
						
					],
					'condition' => [
						'dot_control' => 'yes',
					],
				]
			);

			$this->add_control(
				'dot_width',
				[
					'label' 		=> esc_html__( 'Dots width', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 70,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-blog.owl-carousel .owl-dots button' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'dot_height',
				[
					'label' 		=> esc_html__( 'Dots Height', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 70,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-blog.owl-carousel .owl-dots button' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'border_radius_dot',
				array(
					'label'      => esc_html__( 'Border Radius', 'romancy' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .ova-blog.owl-carousel .owl-dots button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$this->add_control(
				'style_dot_active',
				[
					'label' => esc_html__( 'Dots Active', 'romancy' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'dot_control' => 'yes',
					],
				]
			);

			$this->add_control(
				'dot_color_active',
				[
					'label'     => esc_html__( 'Dot Color Active', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog.owl-carousel .owl-dots button.active' => 'background-color : {{VALUE}};',
						
					],
					'condition' => [
						'dot_control' => 'yes',
					],
				]
			);

			$this->add_control(
				'dot_width_active',
				[
					'label' 		=> esc_html__( 'Dots width active', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 70,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-blog.owl-carousel .owl-dots button.active' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		//END SECTION TAB STYLE DOTS
		

		//SECTION TAB STYLE NAV
		$this->start_controls_section(
			'section_nav',
			[
				'label' => esc_html__( 'Nav', 'romancy' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'dot_nav' => 'yes',
				],
			]
		);

			$this->add_control(
				'nav_size',
				[
					'label' 		=> esc_html__( 'Nav Size', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 70,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-blog.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_size',
				[
					'label' 		=> esc_html__( 'Icon Size', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 30,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-blog.owl-carousel .owl-nav button i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);


			$this->add_responsive_control(
				'border_radius_nav',
				array(
					'label'      => esc_html__( 'Border Radius', 'romancy' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .ova-blog.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);


			$this->add_responsive_control(
				'icon_position_bottom',
				[
					'label' 		=> esc_html__( 'Bottom', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 60,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-blog.owl-carousel .owl-nav' => 'bottom: calc(100% + {{SIZE}}{{UNIT}});',
					],
				]
			);

		$this->end_controls_section();
		// END SECTION TAB STYLE NAV

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings 		 = $this->get_settings_for_display();
		
		$category 		 = $settings['category'];
		$total_count 	 = $settings['total_count'];
		$order 			 = $settings['order_by'];

		$text_readmore 	 = $settings['text_readmore'];
		$show_title 	 = $settings['show_title'];
		$show_category 	 = $settings['show_category'];
		$show_short_desc = $settings['show_short_desc'];
		$order_text	 	 = $settings['order_text'] ? $settings['order_text'] : '20';
		$show_read_more  = $settings['show_read_more'];
		$show_comment 	 = $settings['show_comment'];


		$data_options['items']              = $settings['item_number'];
		$data_options['slideBy']            = $settings['slides_to_scroll'];
		$data_options['margin']             = $settings['margin_items'];
		$data_options['autoplayHoverPause'] = $settings['pause_on_hover'] === 'yes' ? true : false;
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplayTimeout']    = $settings['autoplay_speed'] ? $settings['autoplay_speed'] : '3000';
		$data_options['smartSpeed']         = $settings['smartspeed'] ? $settings['smartspeed'] : '500';
		$data_options['dots']               = $settings['dot_control'] === 'yes' ? true : false;
		$data_options['rtl']				= is_rtl() ? true: false;
		$data_options['nav']	 			= $settings['dot_nav'] === 'yes' ? true : false;


		$args = [];
		if ($category == 'all') {
			$args = [
				'post_type' => 'post',
				'posts_per_page' => $total_count,
				'order' => $order,
			];
		} else {
			$args = [
				'post_type' 		=> 'post', 
				'category_name' 	=> $category,
				'posts_per_page' 	=> $total_count,
				'order' 			=> $order,
				'fields'			=> 'ids'
			];
		}

		$blog = new \WP_Query($args);

		?>
		<ul class="ova-blog blog-slide-show owl-carousel owl-theme" data-options="<?php echo esc_attr( json_encode($data_options) ); ?>">
			<?php if($blog->have_posts()) : while($blog->have_posts()) : $blog->the_post(); ?>
				<li class="item">

					    <div class="media">
				        	<?php 
				        		$thumbnail = wp_get_attachment_image_url(get_post_thumbnail_id() , 'romancy_thumbnail' );
				        		$url_thumb = $thumbnail ? $thumbnail : \Elementor\Utils::get_placeholder_image_src();

				        	?>
				        	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				        		<img src="<?php echo esc_url( $url_thumb ) ?>" alt="<?php the_title(); ?>">
				        	</a>
							
				        </div>

				        <div class="blog-content">
    				        <ul class="post-meta">
						    	
						    	<?php if( $show_category == 'yes' ){ ?>
								    <li class="item-meta post-category">    
								        	<div class="category-blog">
								        		<i aria-hidden="true" class="ovaicon ovaicon-folder-1"></i>
												<?php the_category(' '); ?>
											</div>
								    </li>
							    <?php } ?>

							    <?php if($show_comment == 'yes'): ?>

									<li class="item-meta  post-comment">
										<span class="left comment">
								        	<i class="ovaicon ovaicon-comment-1"></i>
								        </span>
								        <span class="right comment">
											<?php
											comments_popup_link(
												esc_html__('0 Comments', 'romancy'), 
												esc_html__('1 Comments', 'romancy'), 
												'(%)Comments',
												'',
												esc_html__( 'Comment off', 'romancy' ) )
											; ?> 
										</span>            
									</li>

								<?php endif; ?>
								
						    </ul>

							<?php if( $show_title == 'yes' ){ ?>
					            <h2 class="post-title">
							        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							          <?php the_title(); ?>
							        </a>
							    </h2>
						    <?php } ?>

						    <?php if( $show_short_desc == 'yes' ){ ?>
							    <div class="short_desc">
							    	<p> <?php echo wp_trim_words(get_the_excerpt(), $order_text); ?> </p>
							    </div>
							<?php } ?>

						    <?php if( $show_read_more == 'yes' ){ ?>
							    <a class="read-more" href="<?php the_permalink(); ?>">
							    	<?php  echo esc_html( $text_readmore ); ?>
							    	<i class="ovaicon ovaicon-next-4"></i>

							    </a>
						    <?php }?>	

				        </div>
					
				</li>	
					
			<?php
				endwhile; endif; wp_reset_postdata();
			?>
		</ul>
			 	
		<?php
	}
}
$widgets_manager->register( new Romancy_Elementor_Blog_Slide_Show() );