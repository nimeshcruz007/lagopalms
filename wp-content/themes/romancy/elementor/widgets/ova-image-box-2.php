<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Romancy_Elementor_Ova_Image_Box_2 extends Widget_Base {

	
	public function get_name() {
		return 'romancy_elementor_ova_image_box_2';
	}

	
	public function get_title() {
		return esc_html__( 'Ova Image Box 2', 'romancy' );
	}

	
	public function get_icon() {
		return 'eicon-image-box';
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
			'section_heading',
			[
				'label' => esc_html__( 'General', 'romancy' ),
			]
		);	

			// Add Class control
			$this->add_control(
				'ova_image',
				[
					'label'   => esc_html__( 'Image', 'romancy' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);
			
			$this->add_control(
				'sub_title',
				[
					'label' 	=> esc_html__( 'Sub Title', 'romancy' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> 'OUR SERVICE'
				]
			);

			$this->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'romancy' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> 'Fitness Center'
				]
			);

			$this->add_control(
				'description',
				[
					'label' 	=> esc_html__( 'Description', 'romancy' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> '"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard "'
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
					'default' 	=> 'left',
					'toggle' 	=> true,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box-2 .ova-title' => 'text-align: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'ova_position_image',
				[
					'label' 	=> esc_html__( 'Position Column', 'romancy' ),
					'type' 		=> \Elementor\Controls_Manager::CHOOSE,
					'options' 	=> [
						'column-reverse' => [
							'title' => esc_html__( 'Top', 'romancy' ),
							'icon' 	=> 'eicon-v-align-top',
						],
						
						'column' => [
							'title' => esc_html__( 'Bottom', 'romancy' ),
							'icon' 	=> ' eicon-v-align-bottom',
						],
					],
					'default' 	=> 'inherit',
					'toggle' 	=> true,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box-2' => 'flex-direction: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'ova_position_image_row',
				[
					'label' 	=> esc_html__( 'Position Row', 'romancy' ),
					'type' 		=> \Elementor\Controls_Manager::CHOOSE,
					'options' 	=> [
						'row-reverse' => [
							'title' => esc_html__( 'Left', 'romancy' ),
							'icon' 	=> 'eicon-h-align-left',
						],
						
						'row' => [
							'title' => esc_html__( 'Right', 'romancy' ),
							'icon' 	=> 'eicon-h-align-right',
						],
					],
					'default' 	=> 'inherit',
					'toggle' 	=> true,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box-2' => 'flex-direction: {{VALUE}}',
					],
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
			

		$this->end_controls_section();


		//TAB STYLES
		
		$this->start_controls_section(
            'general_style',
            [
                'label' => esc_html__( 'General', 'romancy' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );
        	$this->add_responsive_control(
				'image_height',
				[
					'label' 		=> esc_html__( 'Height', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 300,
							'max' => 600,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-image-2 .ova-image' => 'min-height: {{SIZE}}{{UNIT}}; max-height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_heading',
				[
					'label' 	 => esc_html__( 'Padding Heading', 'romancy' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-image-box-2 .ova-title ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);



        	

        $this->end_controls_section();
		/* End currency style */

		//SECTION TAB STYLE TITLE
		
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
					'selector' 	=> '{{WRAPPER}} .ova-image-box-2 .ova-title .title',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box-2 .ova-title .title' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-image-box-2 .ova-title .title a' => 'color : {{VALUE}};',	
					],
				]
			);

			$this->add_control(
				'color_title_hover',
				[
					'label' 	=> esc_html__( 'Color hover', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box-2 .ova-title .title a:hover' => 'color : {{VALUE}};'
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
						'{{WRAPPER}} .ova-image-box-2 .ova-title .title ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-image-box-2 .ova-title .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selector' 	=> '{{WRAPPER}} .ova-image-box-2 .ova-title h3.sub-title',
				]
			);

			$this->add_control(
				'color_sub_title',
				[
					'label'	 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box-2 .ova-title h3.sub-title' => 'color : {{VALUE}};'
						
						
					],
				]
			);

	        $this->add_control(
                'color_bg_sub_title',
                [
                    'label'     => esc_html__( 'Background', 'romancy' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ova-image-box-2 .ova-title h3.sub-title' => 'background-color: {{VALUE}}',
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
                        '{{WRAPPER}}  .ova-image-box-2 .ova-title h3.sub-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-image-box-2 .ova-title h3.sub-title ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-image-box-2 .ova-title h3.sub-title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selector' 	=> '{{WRAPPER}} .ova-image-box-2 .ova-title .description',
				]
			);

			$this->add_control(
				'color_description',
				[
					'label'	 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box-2 .ova-title .description' => 'color : {{VALUE}};'		
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
						'{{WRAPPER}} .ova-image-box-2 .ova-title .description ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-image-box-2 .ova-title .description ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		$this->end_controls_section();
		//END SECTION TAB STYLE DESCRIPTION
		//
		
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
			\Elementor\Group_Control_Typography::get_type(),
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
					'{{WRAPPER}} .ova-image-box-2 .read-more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .ova-image-box-2 .read-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .ova-image-box-2 .read-more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);


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
						'{{WRAPPER}} .ova-image-box-2 .read-more' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bg_color_readmore',
				[
					'label' => esc_html__( 'Background', 'romancy' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box-2 .read-more' => 'background-color : {{VALUE}};',
					],
				]
			);


			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_readmore',
					'label' => esc_html__( 'Border', 'romancy' ),
					'selector' => '{{WRAPPER}} .ova-image-box-2 .read-more',
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
						'{{WRAPPER}} .ova-image-box-2 .read-more:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bg_color_readmore_hover',
				[
					'label' => esc_html__( 'Background Hover', 'romancy' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box-2 .read-more:hover' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'readmore_border_hover',
				[
					'label' => esc_html__( 'Border Color', 'romancy' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box-2 .read-more:hover' => 'border-color : {{VALUE}};',
					],
				]
			);

		$this->end_controls_tab();


	$this->end_controls_tabs();


		$this->end_controls_section();
		//END SECTION TAB STYLE READMORE
	}

	// Render Template Here
	protected function render() {

		$settings 		= $this->get_settings();
		$link 			= $settings['link_address']['url'];
		$target    		= $settings['link_address']['is_external'] ? ' target="_blank"' : '';
		
		$title     		= $settings['title'];
		$sub_title 		= $settings['sub_title'];
		$description	= $settings['description']; 
		$html_tag  		= $settings['html_tag'];
		$show_read_more = $settings['show_read_more'];
		$text_readmore 	= $settings['text_readmore'];
		?>

		<div class="ova-image-box-2">

			<div class="ova-image-2">
				<?php if($link){ ?>
					<a href="<?php echo esc_url($link); ?>" <?php printf( $target ); ?>>
				<?php } ?>

					<img src="<?php echo esc_attr( $settings['ova_image']['url'] ); ?>" class="ova-image" alt="<?php echo esc_attr( $title ); ?>">
				
				<?php if($link){ ?>
					</a>
				<?php } ?>
			</div>

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

				<?php if( $show_read_more == 'yes' ){ ?>
				    <a class="read-more" href="<?php echo esc_url($link); ?>" <?php printf( $target ); ?>>
				    	<?php  echo esc_html( $text_readmore ); ?>
				    </a>
			    <?php }?>	
			</div>
		</div>
		
		<?php
	}
}

$widgets_manager->register( new Romancy_Elementor_Ova_Image_Box_2() );