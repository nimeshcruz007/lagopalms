<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Romancy_Elementor_Ova_Video extends Widget_Base {

	
	public function get_name() {
		return 'romancy_elementor_ova_video';
	}

	
	public function get_title() {
		return esc_html__( 'Ova Video', 'romancy' );
	}

	
	public function get_icon() {
		return 'eicon-play-o';
	}

	
	public function get_categories() {
		return [ 'romancy' ];
	}

	public function get_script_depends() {
		return [ 'romancy-elementor-ova-video' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		/* Begin section icon */
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Icon', 'romancy' ),
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
					]
				]
			);


			$this->add_control(
				'icon_class',
				[
					'label' 	=> esc_html__( 'Icon Class', 'romancy' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> 'icomoon icomoon-play-button',
				]
			);


			$this->add_control(
				'icon_url_video',
				[
					'label' 	=> esc_html__( 'URL Video', 'romancy' ),
					'type' 		=> Controls_Manager::TEXT,
					'placeholder' 	=> esc_html__( 'Enter your URL', 'romancy' ) . ' (YouTube)',
					'default' 		=> 'https://www.youtube.com/watch?v=XHOmBV4js_E',
				]
			);

			$this->add_control(
	            'link',
	            [
	                'label' 	=> esc_html__( 'Link', 'romancy' ),
	                'type' 		=> Controls_Manager::URL,
	                'dynamic' 	=> [
	                    'active' => true,
	                ],
	                'condition' => [
	                	'icon_url_video' => '',
	                ],
	            ]
	        );

	        $this->add_control(
				'video_options',
				[
					'label' 	=> esc_html__( 'Video Options', 'romancy' ),
					'type' 		=> Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'autoplay_video',
				[
					'label' 	=> esc_html__( 'Autoplay', 'romancy' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'romancy' ),
					'label_off' => esc_html__( 'No', 'romancy' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'mute_video',
				[
					'label' 	=> esc_html__( 'Mute', 'romancy' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'romancy' ),
					'label_off' => esc_html__( 'No', 'romancy' ),
					'default' 	=> 'no',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'loop_video',
				[
					'label' 	=> esc_html__( 'Loop', 'romancy' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'romancy' ),
					'label_off' => esc_html__( 'No', 'romancy' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'player_controls_video',
				[
					'label' 	=> esc_html__( 'Player Controls', 'romancy' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'romancy' ),
					'label_off' => esc_html__( 'No', 'romancy' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'modest_branding_video',
				[
					'label' 	=> esc_html__( 'Modest Branding', 'romancy' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'romancy' ),
					'label_off' => esc_html__( 'No', 'romancy' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'show_info_video',
				[
					'label' 	=> esc_html__( 'Show Info', 'romancy' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'romancy' ),
					'label_off' => esc_html__( 'No', 'romancy' ),
					'default' 	=> 'no',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

		$this->end_controls_section();
		/* End section icon */

		/* Begin section icon style */
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'romancy' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'icon_width',
				[
					'label' 	=> esc_html__( 'Width', 'romancy' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 400,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-video .icon-content-view .content' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);

			$this->add_responsive_control(
				'icon_height',
				[
					'label' 	=> esc_html__( 'Height', 'romancy' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 400,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-video .icon-content-view .content' => 'height: {{SIZE}}{{UNIT}}; min-height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'icon_typography',
					'selector' 	=> '{{WRAPPER}} .ova-video .icon-content-view .content i',
				]
			);

			$this->start_controls_tabs( 'tabs_icon_style' );
				$this->start_controls_tab(
		            'tab_icon_normal',
		            [
		                'label' => esc_html__( 'Normal', 'romancy' ),
		            ]
		        );

		        	$this->add_control(
			            'icon_color_normal',
			            [
			                'label' 	=> esc_html__( 'Color', 'romancy' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video .icon-content-view .content i' => 'color: {{VALUE}};',
			                ],
			            ]
			        );

			        $this->add_control(
			            'icon_background_normal',
			            [
			                'label' 	=> esc_html__( 'Background', 'romancy' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video .icon-content-view .content' => 'background-color: {{VALUE}};',
			                ],
			            ]
			        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'icon_bg_gradient_normal',
							'label' 	=> esc_html__( 'Background Gradient', 'romancy' ),
							'types' 	=> [ 'gradient' ],
							'selector' 	=> '{{WRAPPER}} .ova-video .icon-content-view .content',
						]
					);

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_icon_hover',
		            [
		                'label' => esc_html__( 'Hover', 'romancy' ),
		            ]
		        );

		        	$this->add_control(
			            'icon_color_hover',
			            [
			                'label' 	=> esc_html__( 'Color', 'romancy' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video .icon-content-view .content:hover i' => 'color: {{VALUE}};',
			                ],
			            ]
			        );

		        	$this->add_control(
			            'icon_background_hover',
			            [
			                'label' 	=> esc_html__( 'Background', 'romancy' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video .icon-content-view .content:hover' => 'background-color: {{VALUE}};',
			                ],     
			            ]
			        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'icon_bg_gradient_hover',
							'label' 	=> esc_html__( 'Background Gradient', 'romancy' ),
							'types' 	=> [ 'gradient' ],
							'selector' 	=> '{{WRAPPER}} .ova-video .icon-content-view .content:hover',
						]
					);

					$this->add_control(
			            'icon_border_color_hover',
			            [
			                'label' 	=> esc_html__( 'Border', 'romancy' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video .icon-content-view .content:hover:before' => 'border-color: {{VALUE}};',
			                ],     
			            ]
			        );

		        $this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_group_control(
	            Group_Control_Border::get_type(), [
	                'name' 		=> 'icon_before_border',
	                'selector' 	=> '{{WRAPPER}} .ova-video .icon-content-view .content:before',
	                'separator' => 'before',  
	            ]
	        );

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' 		=> 'icon_box_shadow',
					'label' 	=> esc_html__( 'Box Shadow', 'romancy' ),
					'selector' 	=> '{{WRAPPER}} .ova-video .icon-content-view .content',
				]
			);


	        $this->add_responsive_control(
	            'content_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'romancy' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-video .icon-content-view .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );		

	    $this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings 	= $this->get_settings();
		$version  	= $settings['version'];

		$icon_class = $settings['icon_class'];
		$url_video 	= $settings['icon_url_video'];
		$link 		= $settings['link']['url'];
		$tg_blank 	= '';

		if ( $settings['link']['is_external'] == 'on' ) {
			$tg_blank = 'target="_blank"';
		}

		if ( ! $link ) {
			$url = $link;
		}

		$autoplay 	= $settings['autoplay_video'];
		$mute 		= $settings['mute_video'];
		$loop 		= $settings['loop_video'];
		$controls 	= $settings['player_controls_video'];
		$modest 	= $settings['modest_branding_video'];
		$show_info 	= $settings['show_info_video'];

		?>
         
        <div class="ova-video <?php echo esc_html($version); ?>">
         	
			<div class="icon-content-view video_active">
				
				<?php if ( ! empty( $url_video ) ) : ?>
					<div class="content video-btn" 
							data-src="<?php echo esc_url( $url_video ); ?>" 
							data-autoplay="<?php echo esc_attr( $autoplay ); ?>" 
							data-mute="<?php echo esc_attr( $mute ); ?>" 
							data-loop="<?php echo esc_attr( $loop ); ?>" 
							data-controls="<?php echo esc_attr( $controls ); ?>" 
							data-modest="<?php echo esc_attr( $modest ); ?>" 
							data-show_info="<?php echo esc_attr( $show_info ); ?> 
							">
						<i class="<?php echo esc_attr( $icon_class ); ?>"></i>
					</div>
				<?php else: ?>
					<div class="content">
						<i class="<?php echo esc_attr( $icon_class ); ?>"></i>
					</div>
				<?php endif; ?>
			</div>
			<div class="modal-container">
				<div class="modal">
					<i class="ovaicon-cancel"></i>
					<iframe class="modal-video" allow="autoplay"></iframe>
				</div>
			</div>
		</div>

		<?php
	}
}

$widgets_manager->register( new Romancy_Elementor_Ova_Video() );