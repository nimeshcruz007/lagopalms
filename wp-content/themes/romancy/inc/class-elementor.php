<?php

class Romancy_Elementor {
	
	function __construct() { 
		// Register Header Footer Category in Pane
	    add_action( 'elementor/elements/categories_registered', array( $this, 'romancy_add_category' ) );

	    add_action( 'elementor/frontend/after_register_scripts', array( $this, 'romancy_enqueue_scripts' ) );
		
		add_action( 'elementor/widgets/register', array( $this, 'romancy_include_widgets' ) );
		
		add_filter( 'elementor/controls/animations/additional_animations', array( $this, 'romancy_add_animations'), 10 , 0 );

		add_action( 'wp_print_footer_scripts', array( $this, 'romancy_enqueue_footer_scripts' ) );

		// load icons
		add_filter( 'elementor/icons_manager/additional_tabs', array( $this, 'romancy_icons_filters_new' ), 9999999, 1 );

		//Add Arccordion customize
		add_action( 'elementor/element/accordion/section_toggle_style_content/after_section_end', array( $this, 'romancy_accordion_customize' ), 10, 2 );

		//Add Image carousel customize
		add_action( 'elementor/element/image-carousel/section_style_image/after_section_end', array( $this, 'romancy_image_carousel_customize' ), 10, 2 );

		//Add iconbox customize
		add_action( 'elementor/element/icon-box/section_style_content/after_section_end', array( $this, 'romancy_icon_box_customize' ), 10, 2 );
	}

	//romancy_icon_box_customize
	function romancy_icon_box_customize ( $element, $args ) {
		/** @var \Elementor\Element_Base $element */
		$element->start_controls_section(
			'ova_icon_box',
			[
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Ova Customize', 'romancy' ),
			]
		);
			$element->add_responsive_control(
				'ova_icon_box_margin_title',
				[
					'label' => esc_html__( 'Margin Title', 'romancy' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .elementor-icon-box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$element->add_responsive_control(
				'ova_icon_box_margin_content',
				[
					'label' => esc_html__( 'Margin Content', 'romancy' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .elementor-icon-box-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$element->end_controls_section();
	}

	// romancy_image_carousel_customize
	function romancy_image_carousel_customize ( $element, $args ) {
		/** @var \Elementor\Element_Base $element */
		$element->start_controls_section(
			'ova_image_carousel',
			[
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Ova Customize', 'romancy' ),
			]
		);

		// Dots   
		$element->add_control(
			'ova_image_carousel_dots',
			[
				'label' => esc_html__( 'Dots', 'romancy' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
			$element->start_controls_tabs(
				'style_tabs'
			);

				$element->start_controls_tab(
					'style_dots_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'romancy' ),
					]
				);

					$element->add_control(
						'ova_image_carosel_dot_width',
						[
							'label' 		=> esc_html__( 'Dots width', 'romancy' ),
							'type' 			=> \Elementor\Controls_Manager::SLIDER,
							'size_units' 	=> [ 'px' ],
							'range' => [
								'px' => [
									'min' 	=> 0,
									'max' 	=> 70,
									'step' 	=> 1,
								]
							],
							'selectors' 	=> [
								'{{WRAPPER}} .swiper-pagination-bullet:not(.swiper-pagination-bullet-active)' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$element->add_control(
						'ova_image_carosel_dot_height',
						[
							'label' 		=> esc_html__( 'Dots Height', 'romancy' ),
							'type' 			=> \Elementor\Controls_Manager::SLIDER,
							'size_units' 	=> [ 'px' ],
							'range' => [
								'px' => [
									'min' 	=> 0,
									'max' 	=> 70,
									'step' 	=> 1,
								]
							],
							'selectors' 	=> [
								'{{WRAPPER}} .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$element->add_responsive_control(
						'ova_image_carosel_border_radius_dot',
						array(
							'label'      => esc_html__( 'Border Radius', 'romancy' ),
							'type'       => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => array( 'px', '%' ),
							'selectors'  => array(
								'{{WRAPPER}} .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							),
						)
					);

					$element->add_responsive_control(
						'ova_image_carosel_margin',
						[
							'label' => esc_html__( 'Margin', 'romancy' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .swiper-pagination-bullet' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$element->add_responsive_control(
						'ova_image_carosel_display',
						[
							'label' 	=> esc_html__( 'position', 'romancy' ),
							'type' 		=> \Elementor\Controls_Manager::CHOOSE,
							'options' 	=> [
								'absolute' => [
									'title' => esc_html__( 'Absolute', 'romancy' ),
									'icon' 	=> 'eicon-text-align-left',
								],
								'relative' => [
									'title' => esc_html__( 'Relative', 'romancy' ),
									'icon' 	=> 'eicon-text-align-center',
								],
								
							],
							'default' 	=> 'initial',
							'toggle' 	=> true,
							'selectors' => [
								'{{WRAPPER}} .swiper-pagination-bullets' => 'position: {{VALUE}}',
							],
						]
					);


					$element->add_responsive_control(
						'ova_image_carosel_position_bottom',
						[
							'label' 		=> esc_html__( 'Bottom', 'romancy' ),
							'type' 			=> \Elementor\Controls_Manager::SLIDER,
							'size_units' 	=> [ 'px' ],
							'range' => [
								'px' => [
									'min' 	=> 0,
									'max' 	=> 120,
									'step' 	=> 1,
								]
							],
							'selectors' 	=> [
								'{{WRAPPER}} .swiper-pagination-bullets' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'ova_image_carosel_display' =>'absolute'
							],
						]
					);


				$element->end_controls_tab();

				$element->start_controls_tab(
					'style_dots_active_tab',
					[
						'label' => esc_html__( 'Active', 'romancy' ),
					]
				);
				// 
				$element->add_control(
						'ova_image_carosel_dot_width_Active',
						[
							'label' 		=> esc_html__( 'Dots width', 'romancy' ),
							'type' 			=> \Elementor\Controls_Manager::SLIDER,
							'size_units' 	=> [ 'px' ],
							'range' => [
								'px' => [
									'min' 	=> 0,
									'max' 	=> 70,
									'step' 	=> 1,
								]
							],
							'selectors' 	=> [
								'{{WRAPPER}} .swiper-pagination-bullet ' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);

				$element->end_controls_tab();

			$element->end_controls_tabs();


		$element->end_controls_section();
	}


	// romancy_accordion_customize
	function romancy_accordion_customize ( $element, $args ) {
		/** @var \Elementor\Element_Base $element */
		$element->start_controls_section(
			'ova_accordion',
			[
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Ova Accordion', 'romancy' ),
			]
		);

			$element->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'ova_accordion_border',
					'label' => esc_html__( 'Border', 'romancy' ),
					'selector' => '{{WRAPPER}} .elementor-accordion .elementor-accordion-item',
				]
			);

			$element->add_responsive_control(
				'ova_accordion_padding_title',
				[
					'label' => esc_html__( 'Padding Title', 'romancy' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .elementor-accordion .elementor-accordion-item .elementor-tab-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);		

			$element->add_responsive_control(
				'ova_accordion_padding_content',
				[
					'label' => esc_html__( 'Padding Content', 'romancy' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .elementor-accordion .elementor-accordion-item .elementor-tab-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			// Icon   
			$element->add_control(
				'ova_accordion_icon',
				[
					'label' => esc_html__( 'Icon', 'romancy' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			
				$element->add_control(
					'ova_accordion_icon_width_height',
					[
						'label' 		=> esc_html__( 'Icon Width', 'romancy' ),
						'type' 			=> \Elementor\Controls_Manager::SLIDER,
						'size_units' 	=> [ 'px' ],
						'range' => [
							'px' => [
								'min' 	=> 0,
								'max' 	=> 20,
								'step' 	=> 1,
							]
						],
						'selectors' 	=> [
							'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title .elementor-accordion-icon i' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};display: flex;justify-content: center;align-items: center;border-radius:50%;',
						],
					]
				);

				$element->add_responsive_control(
				'ova_accordion_margin_icon',
					[
						'label' => esc_html__( 'Margin Icon', 'romancy' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
							'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title .elementor-accordion-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$element->add_control(
					'ova_accordion_icon_font_size',
					[
						'label' 		=> esc_html__( 'Size', 'romancy' ),
						'type' 			=> \Elementor\Controls_Manager::SLIDER,
						'size_units' 	=> [ 'px' ],
						'range' => [
							'px' => [
								'min' 	=> 0,
								'max' 	=> 70,
								'step' 	=> 1,
							]
						],
						'selectors' 	=> [
							'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title .elementor-accordion-icon i:before' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);

				$element->add_control(
					'ova_accordion_bg_color_icon',
					[
						'label' => esc_html__( 'Background', 'romancy' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title .elementor-accordion-icon i' => 'background-color : {{VALUE}};',
						],
					]
				);

		$element->end_controls_section();
	}
	
	function romancy_add_category() {
	    \Elementor\Plugin::instance()->elements_manager->add_category(
	        'hf',
	        [
	            'title' => __( 'Header Footer', 'romancy' ),
	            'icon' => 'fa fa-plug',
	        ]
	    );

	    \Elementor\Plugin::instance()->elements_manager->add_category(
	        'romancy',
	        [
	            'title' => __( 'Romancy', 'romancy' ),
	            'icon' => 'fa fa-plug',
	        ]
	    );
	}

	function romancy_enqueue_scripts(){
        $files = glob(get_theme_file_path('/assets/js/elementor/*.js'));
        
        foreach ($files as $file) {
            $file_name = wp_basename($file);
            $handle    = str_replace(".js", '', $file_name);
            $src       = get_theme_file_uri('/assets/js/elementor/' . $file_name);
            if (file_exists($file)) {
                wp_register_script( 'romancy-elementor-' . $handle, $src, ['jquery'], false, true );
            }
        }
	}

	function romancy_include_widgets( $widgets_manager ) {
        $files = glob(get_theme_file_path('elementor/widgets/*.php'));
        foreach ($files as $file) {
            $file = get_theme_file_path('elementor/widgets/' . wp_basename($file));
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }

    function romancy_add_animations(){
    	$animations = array(
            'Romancy' => array(
                'ova-move-up' 		=> esc_html__('Move Up', 'romancy'),
                'ova-move-down' 	=> esc_html__( 'Move Down', 'romancy' ),
                'ova-move-left'     => esc_html__('Move Left', 'romancy'),
                'ova-move-right'    => esc_html__('Move Right', 'romancy'),
                'ova-scale-up'      => esc_html__('Scale Up', 'romancy'),
                'ova-flip'          => esc_html__('Flip', 'romancy'),
                'ova-helix'         => esc_html__('Helix', 'romancy'),
                'ova-popup'			=> esc_html__( 'PopUp','romancy' )
            ),
        );

        return $animations;
    }

	function romancy_enqueue_footer_scripts(){
		 // Font Icon
	    wp_enqueue_style('ovaicon', ROMANCY_URI.'/assets/libs/ovaicon/font/ovaicon.css', array(), null);
	    wp_enqueue_style('ovaicomoon', ROMANCY_URI.'/assets/libs/icomoon/style.css', array(), null);
	}

	public function romancy_icons_filters_new( $tabs = array() ) {
		$newicons = [];

		$font_data['json_url'] = ROMANCY_URI.'/assets/libs/ovaicon/ovaicon.json';
		$font_data['name'] = 'ovaicon';

		$newicons[ $font_data['name'] ] = [
			'name'          => $font_data['name'],
			'label'         => esc_html__( 'Default', 'romancy' ),
			'url'           => '',
			'enqueue'       => '',
			'prefix'        => 'ovaicon-',
			'displayPrefix' => '',
			'ver'           => '1.0',
			'fetchJson'     => $font_data['json_url'],
			
		];

		// Icomoon
		$icomoon_data['json_url'] = ROMANCY_URI.'/assets/libs/icomoon/icomoon.json';
		$icomoon_data['name'] = 'icomoon';

		$newicons[ $icomoon_data['name'] ] = [
			'name'          => $icomoon_data['name'],
			'label'         => esc_html__( 'Icomoon', 'romancy' ),
			'url'           => '',
			'enqueue'       => '',
			'prefix'        => 'icomoon-',
			'displayPrefix' => '',
			'ver'           => '1.0',
			'fetchJson'     => $icomoon_data['json_url'],
			
		];

		return array_merge( $tabs, $newicons );
	}
}

return new Romancy_Elementor();