<?php
/**
 * @package    OVA TEAM by ovatheme
 * @author     Ovatheme
 * @copyright  Copyright (C) 2022 Ovatheme All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */


use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_team extends Widget_Base {

	public function get_name() {
		return 'ova_team';
	}

	public function get_title() {
		return esc_html__( 'Our Team', 'ova-team' );
	}

	public function get_icon() {
		return 'eicon-user-circle-o';
	}

	public function get_categories() {
		return [ 'team' ];
	}

	public function get_script_depends() {
		
		return [ 'script-elementor' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'ova-team' ),
			]
		);

		$args = array(
           'taxonomy' => 'cat_team',
           'orderby' => 'name',
           'order'   => 'ASC'
       	);
	
		$categories = get_categories($args);
		$catAll = array( 'all' => 'All categories');
		$cate_array = array();
		if ($categories) {
			foreach ( $categories as $cate ) {
				$cate_array[$cate->slug] = $cate->cat_name;
			}
		} else {
			$cate_array["No content Category found"] = 0;
		}

		$this->add_control(
			'category',
			[
				'label'   => esc_html__( 'Category', 'ova-team' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'all',
				'options' => array_merge( $catAll, $cate_array )
			]
		);

		$this->add_control(
			'total_count',
			[
				'label'   => esc_html__( 'Total', 'ova-team' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 8,
			]
		);

		$this->add_control(
			'number_column',
			[
				'label' => esc_html__( 'Number Of Column', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'three_column',
				'options' => [
					'two_column'   => esc_html__( '2 Columns', 'ova-team' ),
					'three_column' => esc_html__( '3 Columns', 'ova-team' ),
					'four_column'  => esc_html__( '4 Columns', 'ova-team' ),
				],
			]
		);

		$this->add_control(
			'orderby_post',
			[
				'label' => esc_html__( 'OrderBy Post', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ID',
				'options' => [
					'ID'  => esc_html__( 'ID', 'ova-team' ),
					'title'  => esc_html__( 'Title', 'ova-team' ),
					'ova_team_met_order_team' => esc_html__( 'Custom Order', 'ova-team' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC'  => esc_html__( 'Ascending', 'ova-team' ),
					'DESC'  => esc_html__( 'Descending', 'ova-team' ),
				],
			]
		);

		$this->add_control(
			'show_social',
			[
				'label' => esc_html__( 'Show Social', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ova-team' ),
				'label_off' => esc_html__( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_name',
			[
				'label' => esc_html__( 'Show Name', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ova-team' ),
				'label_off' => esc_html__( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_job',
			[
				'label' => esc_html__( 'Show Job', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ova-team' ),
				'label_off' => esc_html__( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_link_to_detail',
			[
				'label' => esc_html__( 'Show Link to Detail', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ova-team' ),
				'label_off' => esc_html__( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->end_controls_section();

		// General Tab Style
		$this->start_controls_section(
			'section_team_general_info',
			[
				'label' => esc_html__( 'General', 'ova-team' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background_team_general',
					'label' => esc_html__( 'Background', 'ova-team' ),
					'types' => [ 'classic', 'gradient',  ],
					'selector' => '{{WRAPPER}} .ova-team .content .item-team .info',
				]
			);

			$this->add_responsive_control(
	            'padding_team_general',
	            [
	                'label' 		=> esc_html__( 'Padding', 'ova-team' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-team .content .item-team .info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

		$this->end_controls_section();

		// Info Tab Style
		$this->start_controls_section(
			'section_style_info',
			[
				'label' => esc_html__( 'Info', 'ova-team' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'Style Info' );

		$this->start_controls_tab(
			'info_normal',
			[
				'label' => esc_html__( 'Normal', 'ova-team' ),
			]
		);

			
			$this->add_control(
				'color_name',
				[
					'label' => esc_html__( 'Color Name', 'ova-team' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team .content .item-team .info .name-job .name, {{WRAPPER}} .ova-team .content .item-team .info .name-job .name a' => 'color : {{VALUE}};'
					],
				]
			);

			$this->add_control(
				'color_job',
				[
					'label' => esc_html__( 'Color Job', 'ova-team' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team .content .item-team .info .name-job .job' => 'color : {{VALUE}};',
					],
				]
			);
			
		$this->end_controls_tab();

		$this->start_controls_tab(
			'info_hover',
			[
				'label' => esc_html__( 'Hover', 'ova-team' ),
			]
		);
				
			$this->add_control(
				'color_name_hover',
				[
					'label' => esc_html__( 'Color Name', 'ova-team' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team .content .item-team:hover .info .name-job .name, {{WRAPPER}} .ova-team .content .item-team:hover .info .name-job .name a' => 'color : {{VALUE}};',
					],
				]
			);		

		$this->end_controls_tab();

	    $this->end_controls_tabs();
		    
		$this->end_controls_section();

		// ICON Tab
        $this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__( 'Icons Social', 'ova-team' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->start_controls_tabs( 'Style Icons' );

				$this->start_controls_tab(
					'icon_normal',
					[
						'label' => esc_html__( 'Normal', 'ova-team' ),
					]
				);
					$this->add_control(
						'color_icon',
						[
							'label' => esc_html__( 'Background', 'ova-team' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-team .content .item-team .list-icon .box-list-icon .item i' => 'color : {{VALUE}};',
							],
						]
					);

                    
					
				$this->end_controls_tab();

				$this->start_controls_tab(
					'icon_hover',
					[
						'label' => esc_html__( 'Hover', 'ova-team' ),
					]
				);
					$this->add_control(
						'color_social_icons_hover',
						[
							'label' => esc_html__( 'Background', 'ova-team' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-team .content .item-team .list-icon .item:hover i' => 'color : {{VALUE}};',
							],
						]
					);
					

                $this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();

		

	}


	protected function render() {

		$settings = $this->get_settings();

		$template = apply_filters( 'el_elementor_ova_team', 'elementor/ova_team.php' );

		ob_start();
		ovateam_get_template( $template, $settings );
		echo ob_get_clean();
		
	}
}
$widgets_manager->register( new ova_team() );