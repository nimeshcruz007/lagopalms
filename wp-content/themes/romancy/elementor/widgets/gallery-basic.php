<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Romancy_Elementor_Gallery_Basic extends Widget_Base {

	
	public function get_name() {
		return 'romancy_elementor_gallery_basic';
	}

	public function get_title() {
		return esc_html__( 'Ova Basic Gallery', 'romancy' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'romancy' ];
	}

	public function get_script_depends() {
		wp_enqueue_style('fancybox', get_template_directory_uri().'/assets/libs/fancybox/fancybox.css');
		wp_enqueue_script('fancybox', get_template_directory_uri().'/assets/libs/fancybox/fancybox.umd.js', array('jquery'),null,true);
		wp_enqueue_script('masonry', get_template_directory_uri().'/assets/libs/masonry.min.js', array('jquery'), false, true );
		
		return [''];
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
				'id_gallery_basic',
				[
					'label' => esc_html__( 'ID', 'romancy' ),
					'type' => Controls_Manager::TEXT,
					'default' => time(),
				]
			);	

			$this->add_control(
				'class_icon',
				[
					'label' => __( 'Icon', 'romancy' ),
					'type' => Controls_Manager::ICONS,
					'default' => [
						'value' => 'ovaicon ovaicon-plus',
						'library' => 'all',
					],

				]
			);

			// Add Class control
			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'caption',
				[
					'label'   => esc_html__( 'Caption Image', 'romancy' ),
					'type'    => Controls_Manager::TEXT,
					'default' => esc_html__( 'Hotel', 'romancy' ),
				]
			);

			$repeater->add_control(
				'image',
				[
					'label'   => esc_html__( 'Gallery Image', 'romancy' ),
					'type'    => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);

			$repeater->add_responsive_control(
				'image_width',
				[
					'label' 		=> esc_html__( 'Width', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ '%', 'px' ],
					'default' => [
						'unit' => '%',
						'size' => '50',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
						'size' => '100',
					],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 900,
							'step' 	=> 10,
						],
						'%' => [
							'min' 	=> 0,
							'max' 	=> 100,
							'step' 	=> 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-gallery .grid {{CURRENT_ITEM}}' => 'width: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$repeater->add_responsive_control(
				'image_height',
				[
					'label' 		=> esc_html__( 'Height( px )', 'romancy' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 220,
							'max' 	=> 850,
							'step' 	=> 10,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-gallery .grid {{CURRENT_ITEM}} img' => 'height: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$repeater->add_responsive_control(
				'image_padding',
				[
					'label'      => esc_html__( 'Padding', 'romancy' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-gallery .grid {{CURRENT_ITEM}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'tab_item',
				[
					'label'		=> esc_html__( 'Items Gallery', 'romancy' ),
					'type'		=> Controls_Manager::REPEATER,
					'fields'  	=> $repeater->get_controls(),
					'default' 	=> [
						[
							'caption' 	=>  esc_html__( 'Hotel', 'romancy' ),
						],
						[
							'caption' 	=>  esc_html__( 'Hotel', 'romancy' ),
						],
						[
							'caption' 	=>  esc_html__( 'Hotel', 'romancy' ),
						],
					],
					'title_field' => '{{{ caption }}}',
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image_style',
			[
				'label' => esc_html__( 'Image', 'romancy' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'image_padding',
				[
					'label'      => esc_html__( 'Padding', 'romancy' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-gallery .grid .grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'image_border_radius',
				[
					'label'      => esc_html__( 'Border Radius', 'romancy' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-gallery .grid .grid-item .gallery-fancybox img, {{WRAPPER}} .ova-gallery .grid .grid-item .gallery-fancybox .gallery-container:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content Overlay', 'romancy' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'content_opacity',
				[
					'label' => esc_html__( 'Opacity', 'romancy' ),
					'type' 	=> Controls_Manager::SLIDER,
					
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 1,
							'step' 	=> 0.1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-gallery .grid .grid-item:hover .gallery-fancybox .gallery-container:before' => 'opacity: {{SIZE}}',
					],
				]
			);

			$this->add_control(
				'content_bg',
				[
					'label'     => esc_html__( 'Background', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-gallery .grid .grid-item .gallery-fancybox .gallery-container:before' => 'background-color : {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Icon', 'romancy' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'icon_typography',
					'selector' => '{{WRAPPER}} .ova-gallery .grid .grid-item .gallery-fancybox .gallery-container .gallery-icon i',
				]
			);

			$this->add_control(
				'icon_color',
				[
					'label'     => esc_html__( 'Color', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-gallery .grid .grid-item .gallery-fancybox .gallery-container .gallery-icon i' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-gallery .grid .grid-item .gallery-fancybox .gallery-container .gallery-icon' => 'border-color : {{VALUE}};',
					],
				]
			);
			
			$this->add_responsive_control(
				'icon_top',
				[
					'label' => esc_html__( 'Top', 'romancy' ),
					'type' 	=> Controls_Manager::SLIDER,
					'size_units' => [ '%', 'px' ],
					'default' => [
						'unit' => 'px',
					],
					'tablet_default' => [
						'unit' => 'px',
					],
					'mobile_default' => [
						'unit' => 'px',
					],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 500,
							'step' 	=> 1,
						],
						'%' => [
							'min' 	=> 0,
							'max' 	=> 100,
							'step' 	=> 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-gallery .grid .grid-item .gallery-fancybox .gallery-container .gallery-icon' => 'top: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control(
				'icon_left',
				[
					'label' => esc_html__( 'Left', 'romancy' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ '%', 'px' ],
					'default' => [
						'unit' => 'px',
					],
					'tablet_default' => [
						'unit' => 'px',
					],
					'mobile_default' => [
						'unit' => 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-gallery .grid .grid-item .gallery-fancybox .gallery-container .gallery-icon' => 'left: {{SIZE}}{{UNIT}}',
					],
				]
			);


		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => esc_html__( 'Icon Border', 'romancy' ),
				'selector' => '{{WRAPPER}} .ova-gallery .grid .grid-item .gallery-fancybox .gallery-container .gallery-icon',
			]
		);

		$this->add_responsive_control(
				'icon_size_border',
				[
					'label' => esc_html__( 'Background Size', 'romancy' ),
					'type' 	=> Controls_Manager::SLIDER,
					'size_units' => [ '%', 'px' ],
					'default' => [
						'unit' => 'px',
					],
					'tablet_default' => [
						'unit' => 'px',
					],
					'mobile_default' => [
						'unit' => 'px',
					],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 150,
							'step' 	=> 1,
						],
						'%' => [
							'min' 	=> 0,
							'max' 	=> 100,
							'step' 	=> 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-gallery .grid .grid-item .gallery-fancybox .gallery-container .gallery-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
					],
				]
			);

		$this->end_controls_section();
	}

	// Render Template Here
	protected function render() {

		$settings 	= $this->get_settings();

		// Get list item
		$tabs 		= $settings['tab_item'];
		$group      = $settings['id_gallery_basic'];
		$icon 		= $settings['class_icon']['value'];

		?>

		<?php if ( $tabs && is_array( $tabs ) ): ?>
	        <div class="ova-gallery">
	        	<div class="grid">
	        		
	  				<?php foreach ( $tabs as $key => $items ): 
	  					$img_url 	= $items['image']['url'];
	  					if( empty($img_url) ) {
                            $img_url = Utils::get_placeholder_image_src();
	  					}
	  					$img_alt 	= isset( $items['image']['alt'] ) ? $items['image']['alt'] : $items['caption'];
	  					$caption 	= $items['caption'];
	  					$item_id 	= 'elementor-repeater-item-' . $items['_id'];

	  					if ( ! $caption ) {
	  						$caption = $img_alt;
	  					}
	  				?>
	  					<div class="grid-item <?php echo esc_attr( $item_id ); ?><?php if ( 4 == $key ) echo esc_attr(' grid-item-right'); ?>">
	  						<a class="gallery-fancybox" data-src="<?php echo esc_url( $img_url ); ?>" 
	  							data-fancybox="<?php printf($group) ; ?>" 
	  							data-caption="<?php echo esc_attr( $caption ); ?>">

	  							<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $caption ); ?>">
	  							<div class="gallery-container">
		  							<?php if ( $icon ): ?>
		  								<div class="gallery-icon">
			  								<i class="<?php echo esc_attr( $icon ); ?>"></i>
			  							</div>
		  							<?php endif; ?>
		  						</div>
	  						</a>
	  					</div>
	  				<?php endforeach; ?>
	        	</div>

			</div>
		<?php
		endif;
	}

	
}

$widgets_manager->register( new Romancy_Elementor_Gallery_Basic() );