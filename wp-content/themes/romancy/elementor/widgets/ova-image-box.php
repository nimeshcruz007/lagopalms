<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Romancy_Elementor_Ova_Image_Box_Slider extends Widget_Base {

	
	public function get_name() {
		return 'romancy_elementor_ova_image_box_slider';
	}

	
	public function get_title() {
		return esc_html__( 'Ova List Image Box', 'romancy' );
	}

	
	public function get_icon() {
		return 'eicon-image-box';
	}

	
	public function get_categories() {
		return [ 'romancy' ];
	}

	public function get_script_depends() {
		return [ 'romancy-elementor-ova-image-box-slider' ];
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
	            'currency_symbol',
	            [
	                'label' => __( 'Currency Symbol', 'romancy' ),
	                'type' => Controls_Manager::SELECT,
	                'options' => [
	                    '' => __( 'None', 'romancy' ),
	                    'dollar' => '&#36; ' . _x(
						 'Dollar', 'Currency Symbol', 'romancy' ),
						'euro' => '&#128; ' . _x(
						 'Euro', 'Currency Symbol', 'romancy' ),
						                    'baht' => '&#3647; ' . _x(
						 'Baht', 'Currency Symbol', 'romancy' ),
						                    'franc' => '&#8355; ' . _x(
						 'Franc', 'Currency Symbol', 'romancy' ),
						                    'guilder' => '&fnof; ' . _x(
						 'Guilder', 'Currency Symbol', 'romancy' ),
						                    'krona' => 'kr ' . _x(
						 'Krona', 'Currency Symbol', 'romancy' ),
						                    'lira' => '&#8356; ' . _x(
						 'Lira', 'Currency Symbol', 'romancy' ),
						                    'peseta' => '&#8359; ' . _x(
						 'Peseta', 'Currency Symbol', 'romancy' ),
						                    'peso' => '&#8369; ' . _x(
						 'Peso', 'Currency Symbol', 'romancy' ),
						                    'pound' => '&#163; ' . _x(
						 'Pound Sterling', 'Currency Symbol', 'romancy' ),
						                    'real' => 'R$ ' . _x(
						 'Real', 'Currency Symbol', 'romancy' ),
						                    'ruble' => '&#8381; ' . _x(
						 'Ruble', 'Currency Symbol', 'romancy' ),
						                    'rupee' => '&#8360; ' . _x(
						 'Rupee', 'Currency Symbol', 'romancy' ),
						                    'indian_rupee' => '&#8377; ' . _x(
						 'Rupee (Indian)', 'Currency Symbol', 'romancy' ),
						                    'shekel' => '&#8362; ' . _x(
						 'Shekel', 'Currency Symbol', 'romancy' ),
						                    'yen' => '&#165; ' . _x(
						 'Yen/Yuan', 'Currency Symbol', 'romancy' ),
						                    'won' => '&#8361; ' . _x(
						 'Won', 'Currency Symbol', 'romancy' ),
	                    'custom' => __( 'Custom', 'romancy' ),
	                ],
	                'default' => 'dollar',
	            ]
	        );

	        $this->add_control(
	            'currency_symbol_custom',
	            [
	                'label' => __( 'Custom Symbol', 'romancy' ),
	                'type' => Controls_Manager::TEXT,
	                'condition' => [
	                    'currency_symbol' => 'custom',
	                ],
	            ]
	        );

			$this->add_responsive_control(
				'position_currency',
				[
					'label' 	=> esc_html__( 'Position', 'romancy' ),
					'type' 		=> \Elementor\Controls_Manager::CHOOSE,
					'options' 	=> [
						'row' => [
							'title' => esc_html__( 'Left', 'romancy' ),
							'icon' 	=> 'eicon-h-align-left',
						],
						
						'row-reverse' => [
							'title' => esc_html__( 'Right', 'romancy' ),
							'icon' 	=> 'eicon-h-align-right',
						],
					],
				
					'toggle' 	=> true,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box .content-box .currency_symbol' => 'flex-direction: {{VALUE}}',

					],
				]
			);


		//repeater
		$repeater = new \Elementor\Repeater();
			
			$repeater->add_control(
				'list_image',
				[
					'label'   => esc_html__( 'Image', 'romancy' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);

			$repeater->add_control(
				'list_title', [
					'label' => esc_html__( 'Title', 'romancy' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'List Title' , 'romancy' ),
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'list_desc', [
					'label' => esc_html__( 'Description', 'romancy' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'List Content' , 'romancy' ),
					'show_label' => false,
				]
			);

			$repeater->add_control(
				'list_price',
				[
					'label' 	=> esc_html__( 'Price', 'romancy' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => esc_html__( '15', 'romancy' ),
				]
			);


			
			$this->add_control(
				'list',
				[
					'label' => esc_html__( 'List', 'romancy' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'list_title' => esc_html__( 'Item #1', 'romancy' ),
							'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'romancy' ),
						],
						[
							'list_title' => esc_html__( 'Item #2', 'romancy' ),
							'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'romancy' ),
						],
					],
					'title_field' => '{{{ list_title }}}',
				]
			);

		$this->end_controls_section();

		//TAB STYLES
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
					'selector' 	=> '{{WRAPPER}} .ova-image-box .content-box .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box .content-box .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'title_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'romancy' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-image-box .content-box .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End title style */

		/* Begin description Style */
		$this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__( 'Description', 'romancy' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'description_typography',
					'selector' 	=> '{{WRAPPER}} .ova-image-box .content-box .description',
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box .content-box .description' => 'color: {{VALUE}};',
					],
				]
			);			

			$this->add_responsive_control(
	            'description_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'romancy' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-image-box .content-box .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End description style */

		/* Begin Price Symbol Style */
		$this->start_controls_section(
            'price_style',
            [
                'label' => esc_html__( 'Price', 'romancy' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'price_typography',
					'selector' 	=> '{{WRAPPER}} .ova-image-box .content-box .currency_symbol',
				]
			);

			$this->add_control(
				'price_color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box .content-box .currency_symbol' => 'color: {{VALUE}};',
					],
				]
			);			

			$this->add_responsive_control(
	            'price_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'romancy' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-image-box .content-box .currency_symbol' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End Price style */

		/* Begin Currency Symbol Style */
		$this->start_controls_section(
            'currency_style',
            [
                'label' => esc_html__( 'Currency Symbol', 'romancy' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'currency_typography',
					'selector' 	=> '{{WRAPPER}} .ova-image-box .content-box .currency_symbol .symbol',
				]
			);

			$this->add_control(
				'currency_color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box .content-box .currency_symbol .symbol' => 'color: {{VALUE}};',
					],
				]
			);			

			$this->add_responsive_control(
	            'currency_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'romancy' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-image-box .content-box .currency_symbol .symbol' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End currency style */
		
	}

	// Render Template Here
	protected function render() {

		$settings 		= $this->get_settings();
		$currency 		= $settings['currency_symbol'];
		$tab_item     	= $settings['list'];

		if($currency == 'dollar'){
			$currency = '&#36;';
		} elseif ($currency == 'euro'){
			$currency = '&#128;';
		} elseif ($currency == 'baht'){
			$currency = '&#3647;';
		}elseif ($currency == 'franc'){
			$currency = '&#8355;';
		}elseif ($currency == 'guilder'){
			$currency = '&fnof;';
		}elseif ($currency == 'krona'){
			$currency = 'kr';
		}elseif ($currency == 'lira'){
			$currency = '&#8356;';
		}elseif ($currency == 'peseta'){
			$currency = '&#8359;';
		}elseif ($currency == 'peso'){
			$currency = '&#8369;';
		}elseif ($currency == 'pound'){
			$currency = '&#163;';
		}elseif ($currency == 'real'){
			$currency = 'R$';
		}elseif ($currency == 'ruble'){
			$currency = '&#8381;';
		}elseif ($currency == 'rupee'){
			$currency = '&#8360;';
		}elseif ($currency == 'indian_rupee'){
			$currency = '&#8377;';
		}elseif ($currency == 'shekel'){
			$currency = '&#8362;';
		}elseif ($currency == 'yen'){
			$currency = '&#165;';
		}elseif ($currency == 'won'){
			$currency = '&#8361;';
		}else{
			$currency = $settings['currency_symbol_custom'];
		}

		?>

		<div class="ova-image-box">
			<?php if(!empty($tab_item)) : foreach ($tab_item as $item) : ?>
				<?php 

					$image_url 	= $item['list_image']['url'];
					$title 		= $item['list_title'];
					$desc 		= $item['list_desc'];
					$price 		= $item['list_price'];
				?>
				<div class="item-slider">
					<img src="<?php echo esc_attr( $image_url ); ?>" class="ova-image" alt="<?php esc_attr( $title ); ?>">
					<div class="content-box">
						<?php if( $title != '' ): ?>
							<h4 class="title"> <?php echo esc_html($title); ?> </h4>
						<?php endif; ?>

						<?php if( $desc != '' ): ?>
							<p class="description"> <?php echo esc_html($desc); ?> </p>
						<?php endif; ?>
							<span class="currency_symbol">
								<span class="symbol">
									<?php echo esc_html($currency); ?>
								</span>
								<span class="price">
									<?php echo esc_html( $price ); ?>
								</span>
							</span>
					</div>
				</div>
			
			<?php endforeach; endif; ?>
			
		</div>
		 	
		 	
		<?php
	}
}

$widgets_manager->register( new Romancy_Elementor_Ova_Image_Box_Slider() );