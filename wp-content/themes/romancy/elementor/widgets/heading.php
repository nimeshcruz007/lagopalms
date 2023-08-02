<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Romancy_Elementor_Heading extends Widget_Base {

	
	public function get_name() {
		return 'romancy_elementor_heading';
	}

	
	public function get_title() {
		return esc_html__( 'Ova Heading', 'romancy' );
	}

	
	public function get_icon() {
		return 'eicon-heading';
	}

	
	public function get_categories() {
		return [ 'romancy' ];
	}

	public function get_script_depends() {
		return [ '' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'romancy' ),
			]
		);	
			
			
			$this->add_control(
				'sub_title',
				[
					'label' 	=> esc_html__( 'Sub Title', 'romancy' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> 'Sub title'
				]
			);

			$this->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'romancy' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> 'Title'
				]
			);

			$this->add_control(
				'description',
				[
					'label' 	=> esc_html__( 'Description', 'romancy' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> ''
				]
			);

			$this->add_control(
				'link_address',
				[
					'label'   		=> esc_html__( 'Link', 'romancy' ),
					'type'    		=> \Elementor\Controls_Manager::URL,
					'show_external' => false,
					'default' 		=> [
						'url' 			=> '',
						'is_external' 	=> false,
						'nofollow' 		=> false,
					],
				]
			);
			
			$this->add_control(
				'html_tag',
				[
					'label' 	=> esc_html__( 'HTML Tag', 'romancy' ),
					'type' 		=> \Elementor\Controls_Manager::SELECT,
					'default' 	=> 'h2',
					'options' 	=> [
						'h1' 		=> esc_html__( 'H1', 'romancy' ),
						'h2'  		=> esc_html__( 'H2', 'romancy' ),
						'h3'  		=> esc_html__( 'H3', 'romancy' ),
						'h4' 		=> esc_html__( 'H4', 'romancy' ),
						'h5' 		=> esc_html__( 'H5', 'romancy' ),
						'h6' 		=> esc_html__( 'H6', 'romancy' ),
						'div' 		=> esc_html__( 'Div', 'romancy' ),
						'span' 		=> esc_html__( 'span', 'romancy' ),
						'p' 		=> esc_html__( 'p', 'romancy' ),
					],
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
						'{{WRAPPER}} .ova-title' => 'text-align: {{VALUE}}',
					],
				]
			);
			

		$this->end_controls_section();
		//SECTION TAB STYLE TITLE
		//
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'romancy' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'content_typography_title',
					'label' 	=> esc_html__( 'Typography', 'romancy' ),
					'selector' 	=> '{{WRAPPER}} .ova-title .title',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title .title' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-title .title a' => 'color : {{VALUE}};',	
					],
				]
			);

			$this->add_control(
				'color_title_hover',
				[
					'label' 	=> esc_html__( 'Color hover', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title .title a:hover' => 'color : {{VALUE}};'
					],
					
				]
			);

			$this->add_responsive_control(
				'padding_title',
				[
					'label' 	 => esc_html__( 'Padding', 'romancy' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title .title ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_title',
				[
					'label' 	 => esc_html__( 'Margin', 'romancy' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		//END SECTION TAB STYLE TITLE

		//SECTION TAB STYLE SUB TITLE
		$this->start_controls_section(
			'section_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'romancy' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'content_typography_sub_title',
					'label' 	=> esc_html__( 'Typography', 'romancy' ),
					'selector' 	=> '{{WRAPPER}} .ova-title h3.sub-title',
				]
			);

			$this->add_control(
				'color_sub_title',
				[
					'label'	 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title h3.sub-title' => 'color : {{VALUE}};'
						
						
					],
				]
			);

	        $this->add_control(
                'color_bg_sub_title',
                [
                    'label'     => esc_html__( 'Background', 'romancy' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ova-title h3.sub-title' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'sub_title_border_radius',
                [
                    'label'         => esc_html__( 'Border Radius', 'romancy' ),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', '%', 'em' ],
                    'selectors'     => [
                        '{{WRAPPER}}  .ova-title h3.sub-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

			$this->add_responsive_control(
				'padding_sub_title',
				[
					'label' 	 => esc_html__( 'Padding', 'romancy' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title h3.sub-title ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_sub_title',
				[
					'label' 	 => esc_html__( 'Margin', 'romancy' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title h3.sub-title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		$this->end_controls_section();
		//END SECTION TAB STYLE SUB TITLE

		//SECTION TAB STYLE DESCRIPTION
		$this->start_controls_section(
			'section_description',
			[
				'label' => esc_html__( 'Description', 'romancy' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'content_typography_description',
					'label' 	=> esc_html__( 'Typography', 'romancy' ),
					'selector' 	=> '{{WRAPPER}} .ova-title .description',
				]
			);

			$this->add_control(
				'color_description',
				[
					'label'	 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title .description' => 'color : {{VALUE}};'		
					],
				]
			);

			$this->add_responsive_control(
				'padding_description',
				[
					'label' 	 => esc_html__( 'Padding', 'romancy' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title .description ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_description',
				[
					'label' 	 => esc_html__( 'Margin', 'romancy' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title .description ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		$this->end_controls_section();
		//END SECTION TAB STYLE DESCRIPTION
		
		//SECTION TAB STYLE LINE
		$this->start_controls_section(
			'section_line',
			[
				'label' => esc_html__( 'Line', 'romancy' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_line' => 'yes',
				]
			]
		);

		$this->add_control(
			'color_line',
			[
				'label' 	=> esc_html__( 'Color', 'romancy' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-title .title:before' => 'background-color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'line_width',
			[
				'label' 		=> esc_html__( 'Width', 'romancy' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' 	=> 0,
						'max' 	=> 200,
						'step' 	=> 1,
					]
				],
				'default' => [
					'size' => '80',
                    'unit' => 'px',
                ],
				'selectors' 	=> [
					'{{WRAPPER}} .ova-title .title:before' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_line' => 'yes',
				]
			]
		);

		$this->add_control(
			'line_height',
			[
				'label' 		=> esc_html__( 'Height', 'romancy' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' 	=> 0,
						'max' 	=> 10,
						'step' 	=> 1,
					]
				],
				'default' => [
					'size' => '2',
                    'unit' => 'px',
                ],
				'selectors' 	=> [
					'{{WRAPPER}} .ova-title .title:before' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_line' => 'yes',
				]
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
						'max' 	=> 15,
						'step' 	=> 1,
					]
				],
				'default' => [
					'size' => '9',
                    'unit' => 'px',
                ],
				'selectors' 	=> [
					'{{WRAPPER}} .ova-title .title:before' => 'top: calc(100% + {{SIZE}}{{UNIT}});',
				],
				'condition' => [
					'show_line' => 'yes',
				]
			]
		);

		$this->end_controls_section();
		//END SECTION TAB STYLE LINE
			
			
		//SECTION TAB STYLE Background
		$this->start_controls_section(
			'section_bg_styles',
			[
				'label' => esc_html__( 'First Text', 'romancy' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_bg' => 'yes',
				]
			]
		);

			$this->add_control(
				'color_first_Text',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title .title .ova-bg-text' => 'color : {{VALUE}};',
					],
				]
			);


			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> '_typography_background',
					'label' 	=> esc_html__( 'Typography Background', 'romancy' ),
					'selector' 	=> '{{WRAPPER}} .ova-title .title .bg-text',
				]
			);

			$this->add_control(
				'color_background',
				[
					'label' 	=> esc_html__( 'Background Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title .title .bg-text' => 'color : {{VALUE}};',
					],
				]
			);

			//bg-top

			$this->add_control(
				'top_background',
				[
					'label' 		=> esc_html__( 'Top', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> -100,
							'max' 	=> 50,
							'step' 	=> 1,
						]
					],
					
					'selectors' 	=> [
						'{{WRAPPER}} .ova-title .title .bg-text' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'left_background',
				[
					'label' 		=> esc_html__( 'Left', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> -100,
							'max' 	=> 50,
							'step' 	=> 1,
						]
					],
					
					'selectors' 	=> [
						'{{WRAPPER}} .ova-title .title .bg-text' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		//END SECTION TAB STYLE Background

	}

	// Render Template Here
	protected function render() {
		$settings = $this->get_settings();

		$title     		= $settings['title'];
		$sub_title 		= $settings['sub_title'];
		$description	= $settings['description']; 
		$link      		= $settings['link_address']['url'];
		$target    		= $settings['link_address']['is_external'] ? ' target="_blank"' : '';
		$html_tag  		= $settings['html_tag'];
		

		?>
		<div class="ova-title">

			<?php if($sub_title): ?>
				<h3 class="sub-title"><?php echo esc_html( $sub_title ); ?></h3>
			<?php endif; ?>

			<?php if($title): ?>
				<?php if( $link ) { ?>
				
					<<?php echo esc_attr($html_tag); ?> class="title">
						
							<a href="<?php echo esc_url( $link ); ?>"<?php printf( $target ); ?>>
								<?php echo esc_html( $title ); ?>
							</a>

					</<?php echo esc_attr($html_tag); ?>>

				<?php } else { ?>

							<<?php echo esc_attr($html_tag); ?> class="title">

								<?php
								 	echo esc_html($title);
								?>								 

							</<?php echo esc_attr($html_tag); ?>>
				<?php } ?>
			<?php endif; ?>

			<?php if($description): ?>
				<p class="description"> <?php echo esc_html($description); ?> </p>
			<?php endif; ?>

		</div> 
		 	
		<?php
	}
}

$widgets_manager->register( new Romancy_Elementor_Heading() );