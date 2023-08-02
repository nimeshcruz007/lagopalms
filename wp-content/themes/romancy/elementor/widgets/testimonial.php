<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
// use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Romancy_Elementor_Testimonial extends Widget_Base {

	public function get_name() {
		return 'romancy_elementor_testimonial';
	}

	public function get_title() {
		return esc_html__( 'Ova Testimonial', 'romancy' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'romancy' ];
	}

	public function get_script_depends() {
		// Carousel
		wp_enqueue_style( 'slick-carousel', get_template_directory_uri().'/assets/libs/slick/slick.css' );
		wp_enqueue_style( 'slick-carousel-theme', get_template_directory_uri().'/assets/libs/slick/slick-theme.css' );
		wp_enqueue_script( 'slick-carousel', get_template_directory_uri().'/assets/libs/slick/slick.min.js', array('jquery'), false, true );

		return [ 'romancy-elementor-testimonial' ];
	}

	protected function register_controls() {


		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'romancy' ),
			]
		);

			$this->add_control(
				'version',
				[
					'label' => esc_html__( 'Version', 'romancy' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'version_1',
					'options' => [
						'version_1' => esc_html__( 'Version 1', 'romancy' ),
						'version_2' => esc_html__( 'Version 2', 'romancy' ),
					]
				]
			);

		    $this->add_control(
				'sub_title',
				[
					'label' 	=> esc_html__( 'Sub Title', 'romancy' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'Testimonials', 'romancy' ),
				]
			);

			$this->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'romancy' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( "GUEST FEEDBACK", 'romancy' ),
				]
			);

			$this->add_responsive_control(
				'align_heading',
				[
					'label' 	=> esc_html__( 'Alignment', 'romancy' ),
					'type' 		=> \Elementor\Controls_Manager::CHOOSE,
					'options' 	=> [
						'left' => [
							'title' => esc_html__( 'Left', 'romancy' ),
							'icon' 	=> 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'romancy' ),
							'icon' 	=> 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'romancy' ),
							'icon' 	=> 'eicon-text-align-right',
						],
					],
					'default' 	=> 'center',
					'toggle' 	=> true,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .box-title ' => 'text-align: {{VALUE}}',
					],
				]
			);
			
            $this->add_control(
				'class_icon',
				[
					'label' => esc_html__( 'Icon Quote', 'romancy' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'ovaicon ovaicon-close',
						'library' 	=> 'all',
					],
					'condition' 	=>[
						'version' => [
							'version_2'
						],
					],
				]
			);

			// Add Class control
			$repeater = new \Elementor\Repeater();

				$repeater->add_control(
					'name_author',
					[
						'label'   => esc_html__( 'Author Name', 'romancy' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
					]
				);

				$repeater->add_control(
					'job',
					[
						'label'   => esc_html__( 'Job', 'romancy' ),
						'type'    => \Elementor\Controls_Manager::TEXT,

					]
				);

				$repeater->add_control(
					'image_author',
					[
						'label'   => esc_html__( 'Author Image', 'romancy' ),
						'type'    => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					]
				);

				$repeater->add_control(
					'testimonial',
					[
						'label'   => esc_html__( 'Testimonial ', 'romancy' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( ' "I will be pet i will be pet and then i will hiss sit in box get scared by doggo also cucumerro yet the best thing in the call universe is a cardboard box."', 'romancy' ),
					]
				);

				$this->add_control(
					'tab_item',
					[
						'label'       => esc_html__( 'Items Testimonial', 'romancy' ),
						'type'        => Controls_Manager::REPEATER,
						'fields'      => $repeater->get_controls(),
						'default' => [
							[
								'name_author' => esc_html__('Jonh Smith', 'romancy'),
								'job' => esc_html__('CTO Themeforest', 'romancy'),
								'testimonial' => esc_html__('"I will be pet i will be pet and then i will hiss sit in box get scared by doggo also cucumerro yet the best thing in the call universe is a cardboard box."', 'romancy'),
							],
							[
								'name_author' => esc_html__('Annette Black', 'romancy'),
								'job' => esc_html__('CEO Themforest', 'romancy'),
								'testimonial' => esc_html__('"I will be pet i will be pet and then i will hiss sit in box get scared by doggo also cucumerro yet the best thing in the call universe is a cardboard box."', 'romancy'),
							],
							[
								'name_author' => esc_html__('Jacob Jones', 'romancy'),
								'job' => esc_html__('CTO Booking', 'romancy'),
								'testimonial' => esc_html__('"I will be pet i will be pet and then i will hiss sit in box get scared by doggo also cucumerro yet the best thing in the call universe is a cardboard box."', 'romancy'),
							],
							[
								'name_author' => esc_html__('Ralph Edwards', 'romancy'),
								'job' => esc_html__('CEO Themforest', 'romancy'),
								'testimonial' => esc_html__('"I will be pet i will be pet and then i will hiss sit in box get scared by doggo also cucumerro yet the best thing in the call universe is a cardboard box."', 'romancy'),
							],
						],
						'title_field' => '{{{ name_author }}}',
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
				'items_v1',
				[
					'label'     => esc_html__( 'Item', 'romancy' ),
					'type'      => Controls_Manager::NUMBER,
					'default'   => 1,
					'frontend_available' => true,
					'condition' 	=>[
						'version' => [
							'version_1'
						],
					],
				]
			);

			$this->add_control(
				'items_v2',
				[
					'label'     => esc_html__( 'Item', 'romancy' ),
					'type'      => Controls_Manager::NUMBER,
					'default'   => 3,
					'frontend_available' => true,
					'condition' 	=>[
						'version' => [
							'version_2'
						],
					],
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
					'default' => 'no',
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
					'default' => 300,
				]
			);

			$this->add_control(
				'arrows',
				[
					'label'   => esc_html__( 'Arrows', 'romancy' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'romancy' ),
						'no'  => esc_html__( 'No', 'romancy' ),
					],
					'frontend_available' => true,
					'condition' 	=>[
						'version' => [
							'version_1'
						],
					],
				]
			);

			$this->add_control(
				'dots',
				[
					'label'   => esc_html__( 'Dots', 'romancy' ),
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

		/* Begin General Style */
		$this->start_controls_section(
			'section_general_style',
			[
				'label' 	=> esc_html__( 'Sub Title', 'romancy' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'version' => 'version_2',
				]
			]
		);
			$this->add_responsive_control(
				'general_v2_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .client-info .info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'general_border',
					'label' => esc_html__( 'Border', 'romancy' ),
					'selector' => '{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .client-info',
				]
			);

			$this->add_responsive_control(
				'general_border_radius',
				array(
					'label'      => esc_html__( 'Border Radius', 'romancy' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .client-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

		$this->end_controls_section();
		/* End General Style */


		/* Begin Sub Title Style */
		$this->start_controls_section(
			'section_sub_title_style',
			[
				'label' 	=> esc_html__( 'Sub Title', 'romancy' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'sub_title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-testimonial .info .sub-title',
				]
			);

			$this->add_control(
				'sub_title_color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .info .sub-title' => 'color: {{VALUE}}',
					],
				]
			);


			$this->add_responsive_control(
				'sub_title_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-testimonial .info .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		/* End Sub Title Style */

		/* Begin Title Style */
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'romancy' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-testimonial .info .title',
				]
			);


			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .info .title' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'title_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-testimonial .info .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		/* End Title Style */

		/* Begin icon quote Style */
		$this->start_controls_section(
            'icon_style',
            [
                'label' => esc_html__( 'Icon', 'romancy' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' 	=>[
					'version' => [
						'version_2'
					],
				],
            ]
        );
            
			$this->add_responsive_control(
				'size_icon',
				[
					'label' 		=> esc_html__( 'Size', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 60,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .client-info .info .info-avatar .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);
                     
             $this->add_control(
				'icon_color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .client-info .info .info-avatar .icon i' => 'color: {{VALUE}};',
					],
				]
			);


	        $this->add_responsive_control(
	            'icon_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'romancy' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .client-info .info .info-avatar .icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End icon quote style */

		/*************  SECTION NAME JOB AUTHOR. *******************/
		$this->start_controls_section(
			'section_author_name_job',
			[
				'label' => esc_html__( 'Author Name - Job', 'romancy' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		    $this->add_responsive_control(
				'name_job_padding',
				[
					'label'      => esc_html__( 'Padding', 'romancy' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info .name-job' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			// line top
			$this->add_control(
				'line_top',
				[
					'label' => esc_html__( 'Line top', 'romancy' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
	                	'version' 	=> 'version_1'
	                ],
				]
			);

			$this->add_responsive_control(
				'line_top_width',
				[
					'label' => esc_html__( 'Width line(px)', 'romancy' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 150,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info .name-job:before' => 'width: {{SIZE}}{{UNIT}}',
					],
					'condition' => [
	                	'version' 	=> 'version_1'
	                ],
				]
			);

			$this->add_responsive_control(
				'line_top_height',
				[
					'label' => esc_html__( 'Height line(px)', 'romancy' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 5,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info .name-job:before' => 'height: {{SIZE}}{{UNIT}}',
					],
					'condition' => [
	                	'version' 	=> 'version_1'
	                ],
				]
			);

			$this->add_control(
				'line_top_color',
				[
					'label'     => esc_html__( 'Color', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'
						{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info .name-job:before' => 'background-color : {{VALUE}};',
					],
					'condition' => [
	                	'version' 	=> 'version_1'
	                ],
				]
			);


		    $this->add_control(
				'author_name_heading',
				[
					'label'     => esc_html__( 'Author Name', 'romancy' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before'
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'author_name_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info .name-job .name',
				]
			);

			$this->add_control(
				'author_name_color',
				[
					'label'     => esc_html__( 'Color', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'
						{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info .name-job .name' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'job_heading',
				[
					'label'     => esc_html__( 'Job', 'romancy' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before'
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'job_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info .name-job .job',
				]
			);

			$this->add_control(
				'job_color',
				[
					'label'     => esc_html__( 'Color', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'
						{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info .name-job .job' => 'color : {{VALUE}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section name job author  ###############


		/*************  SECTION content testimonial  *******************/
		$this->start_controls_section(
			'section_content_testimonial',
			[
				'label' => esc_html__( 'Content Testimonial', 'romancy' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'content_testimonial_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info p.ova-evaluate',
				]
			);

			$this->add_control(
				'content_color',
				[
					'label'     => esc_html__( 'Color', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info p.ova-evaluate' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_padding',
				[
					'label'      => esc_html__( 'Padding', 'romancy' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info p.ova-evaluate' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section content testimonial  ###############

		/* Begin Nav Arrow Style */
		$this->start_controls_section(
            'nav_style',
            [
                'label' => esc_html__( 'Arrows Control', 'romancy' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
                	'arrows' 	=> 'yes',
                	'version' 	=> 'version_1'
                ]

            ]
        );
            
            $this->add_responsive_control(
				'size_nav_icon',
				[
					'label' 		=> esc_html__( 'Icon Size', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 30,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .slick-next:before, {{WRAPPER}} .ova-testimonial .slide-testimonials .slick-prev:before' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			 $this->add_control(
				'color_nav_icon',
				[
					'label' => esc_html__( 'Color', 'romancy' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .slick-next:before, {{WRAPPER}} .ova-testimonial .slide-testimonials .slick-prev:before' => 'color : {{VALUE}};',
					],
				]
			);


            $this->add_control(
				'color_nav_icon_hover',
				[
					'label' => esc_html__( 'Color Hover', 'romancy' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .slick-next:hover:before, {{WRAPPER}} .ova-testimonial .slide-testimonials .slick-prev:hover:before' => 'color : {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
        /* End Nav Arrow Style */
		
		//SECTION TAB STYLE DOTS
		$this->start_controls_section(
			'section_dots',
			[
				'label' => esc_html__( 'Dots', 'romancy' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'dots' => 'yes',
				],
			]
		);

			$this->add_responsive_control(
				'position_bottom',
				[
					'label' 		=> esc_html__( 'Position Bottom', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> -50,
							'max' 	=> 0,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

$this->start_controls_tabs(
		'style_tabs_dots'
	);
		//normal
		$this->start_controls_tab(
			'style_dots_tab',
			[
			'label' => esc_html__( 'Normal', 'romancy' ),
			]
		);

			$this->add_control(
				'style_dots',
				[
					'label' => esc_html__( 'Dots', 'romancy' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					
				]
			);

			$this->add_control(
				'dot_color',
				[
					'label'     => esc_html__( 'Dot Color', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .slick-dots button ' => 'background-color : {{VALUE}};',
						
					]
					
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
							'max' 	=> 20,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .slick-dots button' => 'width: {{SIZE}}{{UNIT}};',
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
							'max' 	=> 10,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .slick-dots button' => 'height: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .slick-dots button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

		$this->end_controls_tab();

		//active
		$this->start_controls_tab(
			'style_dots_active_tab',
			[
			'label' => esc_html__( 'Active', 'romancy' ),
			]
		);
			$this->add_control(
				'style_dot_active',
				[
					'label' => esc_html__( 'Dots Active', 'romancy' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					
				]
			);

			$this->add_control(
				'dot_color_active',
				[
					'label'     => esc_html__( 'Dot Color Active', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .slick-dots li.slick-active button' => 'background-color : {{VALUE}};',
						
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
							'max' 	=> 30,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .slick-dots li.slick-active button' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_tab();
	$this->end_controls_tabs();


		$this->end_controls_section();
		//END SECTION TAB STYLE DOTS
	}

	// Render Template Here
	protected function render() {

		$settings     = $this->get_settings();

		$version 	  =    $settings['version'];
		$tab_item     =    $settings['tab_item'];
		$title 		  =    $settings['title'];
		$sub_title 	  =    $settings['sub_title'];
		$class_icon   =    $settings['class_icon']['value'];
		
		//carousel data option
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplay_speed']     = $settings['autoplay_speed'];
		$data_options['smartSpeed']         = $settings['smartspeed'];
		$data_options['rtl']				= is_rtl() ? true: false;
		$data_options['dots']				= $settings['dots'] === 'yes' ? true : false;
		

		if ($version == 'version_1') {
			// code...
			$data_options['items']			= $settings['items_v1'];
			$data_options['arrows']			= $settings['arrows'] === 'yes' ? true : false;
			$data_options['navfor']			= '.slide-for';
			
		} else {

			$data_options['items']			= $settings['items_v2'];
			$data_options['arrows']		    = false;
			$data_options['padding']		= 30;
		}

		?>
         
        <div class="ova-testimonial <?php echo esc_html($version); ?>">
         	<div class="info box-title">

				<?php if ( $sub_title ): ?>
					<h2 class="sub-title">
						<?php echo esc_html( $sub_title ); ?>
					</h2>	
				<?php endif; ?>

	            <?php if ( $title ): ?>
				    <h3 class="title">
					   <?php echo esc_html( $title ); ?>
					</h3>
				<?php endif; ?>

			</div>

			<?php if($version == 'version_1'): ?>

	            <div class="slide-for">
	            	<?php if(!empty($tab_item)) : foreach ($tab_item as $k => $item) :  if ($k >= 3) break; ?>
	            		<?php $alt = isset($item['name_author']) && $item['name_author'] ? $item['name_author'] : esc_html__( 'testimonial','romancy' ); ?>
		         	    <div class="small-img">
							<img src="<?php echo esc_attr($item['image_author']['url']); ?>" alt="<?php echo esc_attr( $alt ); ?>">
						</div>	
					<?php endforeach; endif; ?>
				</div>

			<?php endif; ?>

			<div class="slide-testimonials slider-<?php echo esc_html($version); ?>"  data-options="<?php echo esc_attr(json_encode($data_options)) ; ?>">

				<?php if(!empty($tab_item)) : foreach ($tab_item as $item) : ?>
					<?php $alt = isset($item['name_author']) && $item['name_author'] ? $item['name_author'] : esc_html__( 'testimonial','romancy' ); ?>
					<div class="item">
						<div class="client-info">

							<div class="info">

								<?php if( $item['testimonial'] != '' ) : ?>
									<p class="ova-evaluate">
										<?php echo esc_html($item['testimonial']) ; ?>
									</p>
								<?php endif; ?>

								<div class="info-avatar">
									<?php if ( $version === 'version_2'): ?>
										<div class="small-img">
											<img src="<?php echo esc_attr($item['image_author']['url']); ?>" alt="<?php echo esc_attr( $alt ); ?>">
										</div>
									<?php endif; ?>

									<div class="name-job">
										<?php if( $item['name_author'] != '' ) { ?>
											<p class="name second_font">
												<?php echo esc_html($item['name_author']) ; ?>
											</p>
										<?php } ?>

										<?php if( $item['job'] != '' ) { ?>
											<p class="job">
												<?php echo esc_html($item['job'])  ; ?>
											</p>
										<?php } ?>

										
									</div>

									<?php if (!empty( $class_icon ) && $version === 'version_2'): ?>

						            	<div class="icon">
						            		<i class="<?php echo esc_attr( $class_icon ); ?>"></i>
						            	</div>

						            <?php endif;?>

								</div>	

							</div><!-- end info -->

						</div>
					</div>
	
				<?php endforeach; endif; ?>
			</div>

		</div>
		 
		<?php
	}
}

$widgets_manager->register( new Romancy_Elementor_Testimonial() );

