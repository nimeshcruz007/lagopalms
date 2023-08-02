<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Romancy_Elementor_Switch_Language extends Widget_Base {

	
	public function get_name() {
		return 'romancy_elementor_switch_language';
	}

	
	public function get_title() {
		return esc_html__( 'Switch Language', 'romancy' );
	}

	
	public function get_icon() {
		return 'eicon-global-settings';
	}

	
	public function get_categories() {
		return [ 'romancy' ];
	}

	public function get_script_depends() {
		return [ 'romancy-elementor-switch-language' ];
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
				'icon',
				[
					'label' => esc_html__( 'Icon', 'romancy' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> '',
						'library' 	=> 'all',
					],
				]
			);

			$this->add_control(
				'icon_select',
				[
					'label' => esc_html__( 'Icon Select', 'romancy' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'ovaicon ovaicon-download',
						'library' 	=> 'all',
					],
				]
			);

		$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'language', [
					'label' 		=> esc_html__( 'Title', 'romancy' ),
					'type' 			=> \Elementor\Controls_Manager::TEXT,
					'default' 		=> esc_html__( 'English' , 'romancy' ),
					'label_block' 	=> true,
				]
			);

		$this->add_control(
			'list',
			[
				'label' 	=> esc_html__( 'Language', 'romancy' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'language' => esc_html__( 'English', 'romancy' ), 
					],
					[
						'language' => esc_html__( 'France', 'romancy' ),
					],
				],
				'title_field' => '{{{ language }}}',
			]
		);

		$this->add_control(
			'sub_title_font_family',
			[
				'label' 	=> esc_html__( 'Font Family', 'romancy' ),
				'type' 		=> \Elementor\Controls_Manager::FONT,
				'default' 	=> "Work Sans",
				'selectors' => [
					'{{WRAPPER}} .ova-switch-language select#ova-language' => 'font-family: {{VALUE}}',
				],
			]
		);


		$this->end_controls_section();
		
		//TAB STYLE SELECT
		$this->start_controls_section(
			'section_switch_language',
			[
				'label' => esc_html__( 'Content', 'romancy' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'typography',
					'selector' => '{{WRAPPER}} .ova-switch-language select#ova-language',
				]
			);
					
			$this->add_control(
				'color',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-switch-language select#ova-language' => 'color : {{VALUE}};',		
					],
				]
			);

			$this->add_control(
				'color_bg',
				[
					'label' 	=> esc_html__( 'Background Color', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-switch-language select#ova-language' => 'background-color : {{VALUE}};',		
					],
				]
			);		

		$this->end_controls_section();
		//END SECTION TAB STYLE SELECT
		
		//TAB STYLE OPTION
		$this->start_controls_section(
			'section_switch_language_option',
			[
				'label' => esc_html__( 'Option', 'romancy' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'typography_option',
					'selector' => '{{WRAPPER}} .ova-switch-language select#ova-language option',
				]
			);
					
			$this->add_control(
				'color_option',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-switch-language select#ova-language option' => 'color : {{VALUE}};',		
					],
				]
			);	

			$this->add_control(
				'color_bg_option',
				[
					'label' 	=> esc_html__( 'Background Color', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-switch-language select#ova-language option' => 'background-color : {{VALUE}};',		
					],
				]
			);		

		$this->end_controls_section();
		//END SECTION TAB OPTION
				
		//TAB STYLE ICON
		$this->start_controls_section(
			'section_switch_language_ICON',
			[
				'label' => esc_html__( 'Icon', 'romancy' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

				$this->add_responsive_control(
					'size_icon',
					[
						'label' 		=> esc_html__( 'Size', 'romancy' ),
						'type' 			=> Controls_Manager::SLIDER,
						'size_units' 	=> [ 'px'],
						'range' 		=> [
							'px' => [
								'min' 	=> 0,
								'max' 	=> 100,
								'step' 	=> 1,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ova-switch-language .icon' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);

				$this->add_control(
				'color_icon',
				[
					'label' 	=> esc_html__( 'Color', 'romancy' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-switch-language .icon' => 'color : {{VALUE}};',		
					],
				]
			);	
		$this->end_controls_section();
		//END SECTION TAB ICON
		
	}

	// Render Template Here
	protected function render() {

		$settings 		= $this->get_settings();
		$icon 			= $settings['icon'] ? $settings['icon'] : '';
		$icon_select 	= $settings['icon'] ? $settings['icon_select'] : '';
		$list_language  = $settings['list'];
		?>		

		<div class="ova-switch-language">
			<div class="ova-box-language">
				<?php if( $icon ){ ?>
					<div class="icon">
						<?php 
					        \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true' ] );
					    ?>
					</div>	
				<?php } ?>
			 	<select name="language" id="ova-language">
					<?php foreach( $list_language as $item ) : ?>
							<option  value="<?php echo esc_attr($item['language']); ?>"> <?php echo esc_html($item['language']); ?> </option>
					<?php endforeach; ?>
						
				</select>
				<div class="icon-select">
					<?php 
				        \Elementor\Icons_Manager::render_icon( $icon_select, [ 'aria-hidden' => 'true' ] );
				    ?>
				</div>
			</div>	
		</div>

		<?php
	}
}

$widgets_manager->register( new Romancy_Elementor_Switch_Language() );