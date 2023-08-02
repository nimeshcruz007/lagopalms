<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Romancy_Elementor_Ova_Counter extends Widget_Base {

	
	public function get_name() {
		return 'romancy_elementor_ova_counter';
	}

	
	public function get_title() {
		return esc_html__( 'Ova Counter', 'romancy' );
	}

	
	public function get_icon() {
		return 'eicon-counter';
	}

	
	public function get_categories() {
		return [ 'romancy' ];
	}

	public function get_script_depends() {
		// appear js
		wp_enqueue_script( 'romancy-appear', get_theme_file_uri('/assets/libs/appear/appear.js'), array('jquery'), false, true);
		// Odometer for counter
		wp_enqueue_style( 'odometer', get_template_directory_uri().'/assets/libs/odometer/odometer.min.css' );
		wp_enqueue_script( 'odometer', get_template_directory_uri().'/assets/libs/odometer/odometer.min.js', array('jquery'), false, true );

		return [ 'romancy-elementor-ova-counter' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Ova Counter', 'romancy' ),
			]
		);	
			
			// Add Class control
			
			$this->add_control(
				'version',
				[
					'label' => esc_html__( 'Version', 'romancy' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'version_1',
					'options' => [
						'version_1' => esc_html__( 'Version 1', 'romancy' ),
						'version_2' => esc_html__( 'Version 2', 'romancy' ),
						'version_3' => esc_html__( 'Version 3', 'romancy' ),
					]
				]
			);

		    $this->add_control(
				'icon',
				[
					'label' 	=> __( 'Icon', 'romancy' ),
					'type' 		=> Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'icomoon icomoon-checked-outline',
						'library' 	=> 'icomoon',
					],
					'condition' => ['version' => 'version_3'],
				]
			);

		    $this->add_control(
				'number',
				[
					'label' 	=> esc_html__( 'Number', 'romancy' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => esc_html__( '120', 'romancy' ),
				]
			);

			$this->add_control(
				'prefix',
				[
					'label'  => esc_html__( 'Prefix', 'romancy' ),
					'type'   => Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Plus', 'romancy' ),
					'default' => '',
					'condition' => ['version' => 'version_3'],
				]
			);

			$this->add_control(
				'suffix',
				[
					'label'  => esc_html__( 'Suffix', 'romancy' ),
					'type'   => Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Plus', 'romancy' ),
					'default' => '+',
				]
			);

			$this->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'romancy' ),
					'type' 	=> Controls_Manager::TEXT,
					'default' => esc_html__( 'Podcast Shows', 'romancy' ),
				]
			);

			$this->add_responsive_control(
				'text_align',
				[
					'label' 	=> esc_html__( 'Alignment', 'romancy' ),
					'type' 		=> Controls_Manager::CHOOSE,
					'options' 	=> [
						'left' 	=> [
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
					'selectors' => [
						'{{WRAPPER}} .ova-counter' => 'text-align: {{VALUE}};',
					],
				]
			);
			
		$this->end_controls_section();

		/* Begin Counter Style */
		$this->start_controls_section(
            'counter_style',
            [
               'label' => esc_html__( 'Ova Counter', 'romancy' ),
               'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

			$this->add_control(
				'counter_bgcolor',
				[
					'label' 	=> esc_html__( 'Background', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'counter_bgcolor_hover',
				[
					'label' 	=> esc_html__( 'Background Hover', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter:hover' => 'background: {{VALUE}};',
					],
				]
			);

		    $this->add_responsive_control(
	            'counter_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'romancy' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'romancy' ),
					'selector' => '{{WRAPPER}} .ova-counter',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' 		=> 'border_icon',
					'label' 	=> esc_html__( 'Border', 'romancy' ),
					'selector' 	=> '{{WRAPPER}} .ova-counter',
					'condition' => [
						'version' =>[ 'version_1'],
					]
				]
			);

			$this->add_control(
				'item_heading',
				[
					'label' => esc_html__( 'Item', 'romancy' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'version' =>[ 'version_1'],
					]
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' 		=> 'border_item',
					'label' 	=> esc_html__( 'Border Item', 'romancy' ),
					'selector' 	=> '{{WRAPPER}} .ova-counter .counter-version_1',
					'condition' => [
						'version' =>[ 'version_1'],
					]
				]
			);


			$this->add_responsive_control(
				'item_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-counter .counter-version_1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'item_margin',
				[
					'label' 		=> esc_html__( 'Margin', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-counter .counter-version_1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);



        $this->end_controls_section();
		/* End counter style */
        
        /* Begin icon Style */
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'romancy' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'version' =>[ 'version_3'],
				]
			]
		);

			$this->add_control(
				'icon_fontsize',
				[
					'label' 		=> esc_html__( 'Size', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 90,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-counter .icon' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter .icon' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-counter .icon i::before' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'icon_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter:hover .icon' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'icon_margin',
				[
					'label' 		=> esc_html__( 'Margin', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-counter .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'icon_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'romancy' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-counter .icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section(); 
		// End Style tab Icon

		/* Begin number (odometer) Style */
		$this->start_controls_section(
            'number_style',
            [
                'label' => esc_html__( 'Number', 'romancy' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

			 $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'number_typography',
					'selector' 	=> '{{WRAPPER}} .ova-counter .odometer',
				]
			);

			$this->add_control(
				'number_color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter .odometer' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'number_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter:hover .odometer' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'number_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'romancy' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-counter.version_2 .counter-version_2 .odometer.odometer-auto-theme' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	                'condition' 	=> [
	                	'version' => 'version_2',
	                ],
	            ]
	        );

			

        $this->end_controls_section();
		/* End number style */

		/* Begin Prefix Style */
		$this->start_controls_section(
            'prefix_style',
            [
                'label' => esc_html__( 'Prefix', 'romancy' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => ['version' => 'version_3'],
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'prefix_typography',
					'selector' 	=> '{{WRAPPER}} .ova-counter .prefix',
				]
			);

			$this->add_control(
				'prefix_color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter .prefix' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'prefix_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter:hover .prefix' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'prefix_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'romancy' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-counter .prefix' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );


			$this->add_responsive_control(
				'prefix_vertical-align',
				[
					'label' 	=> esc_html__( 'Vertical Align', 'romancy' ),
					'type' 		=> \Elementor\Controls_Manager::CHOOSE,
					'options' 	=> [
						'top' => [
							'title' => esc_html__( 'top', 'romancy' ),
							'icon' 	=> ' eicon-align-stretch-v',
						],
						'text-bottom' => [
							'title' => esc_html__( 'text bottom', 'romancy' ),
							'icon' 	=> ' eicon-align-end-v',
						],
						
					],
					'toggle' 	=> true,
					'selectors' => [
						'{{WRAPPER}} .ova-counter.version_3 .prefix' => 'vertical-align: {{VALUE}}',
					]
				]
			);

        $this->end_controls_section();
		/* End prefix style */

		/* Begin suffix Style */
		$this->start_controls_section(
            'suffix_style',
            [
                'label' => esc_html__( 'Suffix', 'romancy' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'suffix_typography',
					'selector' 	=> '{{WRAPPER}} .ova-counter .suffix',
				]
			);

			$this->add_control(
				'suffix_color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter .suffix' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'suffix_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter:hover .suffix' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'suffix_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'romancy' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-counter .suffix' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'suffix_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'romancy' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-counter .suffix' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );


			$this->add_responsive_control(
				'suffix_vertical-align',
				[
					'label' 	=> esc_html__( 'Vertical Align', 'romancy' ),
					'type' 		=> \Elementor\Controls_Manager::CHOOSE,
					'options' 	=> [
						'top' => [
							'title' => esc_html__( 'top', 'romancy' ),
							'icon' 	=> ' eicon-align-stretch-v',
						],
						'text-bottom' => [
							'title' => esc_html__( 'text bottom', 'romancy' ),
							'icon' 	=> ' eicon-align-end-v',
						],
						
					],
					'toggle' 	=> true,
					'selectors' => [
						'{{WRAPPER}} .ova-counter.version_3 .suffix' => 'vertical-align: {{VALUE}}',
						'{{WRAPPER}} .ova-counter.version_2 .suffix' => 'vertical-align: {{VALUE}}',
					],
				]
			);

        $this->end_controls_section();
		/* End suffix style */

		/* Begin title Style */
		$this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__( 'Title', 'romancy' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-counter .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter:hover .title' => 'color: {{VALUE}};',
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
	                    '{{WRAPPER}} .ova-counter .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End title style */
		
	}

	// Render Template Here
	protected function render() {

		$settings 	= $this->get_settings();
		$version 	= $settings['version'];

		$class_icon = $settings['icon'];
		$number     = isset( $settings['number'] ) ? $settings['number'] : '100';
		$prefix     = $settings['prefix'];
		$suffix     = $settings['suffix'];
		$title      = $settings['title'];

		?>
		
	    <div class="ova-counter <?php echo esc_html($version); ?>" data-count="<?php echo esc_attr( $number ); ?>">
	    	<?php if(!empty( $class_icon ) && $version==='version_3') : ?>
            	<div class="icon">
					<?php 
			        	\Elementor\Icons_Manager::render_icon( $class_icon, [ 'aria-hidden' => 'true' ] );
			    	?>
				</div>
			<?php endif; ?>
	    	<div class="counter-<?php echo esc_html($version); ?>">
	    		<?php if( !empty( $prefix ) && $version == 'version_3'): ?>
	    			<span class="prefix">
	    				<?php echo esc_html( $prefix ); ?>
	    			</span>
	    		<?php endif; ?>
				<div class="odometer">0</div>
				<span class="suffix">
					<?php echo esc_html( $suffix ); ?>
		        </span>
				
	      	     <?php if (!empty( $title )): ?>
					<h4 class="title">
						<?php echo esc_html( $title ); ?>
					</h4>
				<?php endif;?>
			</div>
       </div>
	
	<?php
	}
}

$widgets_manager->register( new Romancy_Elementor_Ova_Counter() );