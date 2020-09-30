<?php

namespace PrimeSlider\Modules\Dragon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Css_Filter;
use Elementor\Utils;
use Elementor\Repeater;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class dragon extends Widget_Base {

	public function get_name() {
		return 'prime-slider-dragon';
	}

	public function get_title() {
		return BDTPS . esc_html__('Dragon', 'bdthemes-prime-slider');
	}

	public function get_icon() {
		return 'bdt-widget-icon ps-wi-dragon bdt-new';
	}

	public function get_categories() {
		return ['prime-slider'];
	}

	public function get_keywords() {
		return [ 'prime slider', 'slider', 'Dragon', 'prime' ];
	}

	public function get_style_depends() {
		return ['ps-dragon'];
	}

	protected function _register_controls() {
		$this->register_query_section_controls();
	}

	private function register_query_section_controls() {

		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__('Layout', 'bdthemes-prime-slider'),
			]
		);

		$this->add_control(
			'slider_size_ratio',
			[
				'label'       => esc_html__('Size Ratio', 'bdthemes-prime-slider'),
				'type'        => Controls_Manager::IMAGE_DIMENSIONS,
				'description' => 'Slider ratio to widht and height, such as 16:9',
				'separator'	  => 'before',
			]
		);

		$this->add_control(
			'slider_min_height',
			[
				'label' => esc_html__('Minimum Height', 'bdthemes-prime-slider'),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 1024,
					],
				],
			]
		);

		$this->add_control(
			'show_title',
			[
				'label'   => esc_html__('Show Title', 'bdthemes-prime-slider'),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_sub_title',
			[
				'label'   => esc_html__('Show Sub Title', 'bdthemes-prime-slider'),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_button_text',
			[
				'label'   => esc_html__('Show Button', 'bdthemes-prime-slider'),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_excerpt',
			[
				'label'   => esc_html__('Show Excerpt', 'bdthemes-prime-slider'),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_social_icon',
			[
				'label'   => esc_html__('Show Social Icon', 'bdthemes-prime-slider'),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_navigation_dots',
			[
				'label'   => esc_html__('Show Dots', 'bdthemes-prime-slider'),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'title_html_tag',
			[
				'label'   => __( 'Title HTML Tag', 'bdthemes-element-pack' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h1',
				'options' => [
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				],
				'condition' => [
					'show_title' => 'yes'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_sliders',
			[
				'label' => esc_html__('Sliders', 'bdthemes-prime-slider'),
			]
		);

		$this->add_control(
			'slides',
			[
				'label'   => esc_html__('Slider Items', 'bdthemes-prime-slider'),
				'type'    => Controls_Manager::REPEATER,
				'default' => [
					[
						'sub_title' => esc_html__('Addons For Elementor', 'bdthemes-prime-slider'),
						'title' => esc_html__('Prime Slider', 'bdthemes-prime-slider'),
						'image' => ['url' => BDTPS_ASSETS_URL . 'images/slider1.jpg']
					],
					[
						'sub_title' => esc_html__('Addons For Elementor', 'bdthemes-prime-slider'),
						'title' => esc_html__('Element Pack', 'bdthemes-prime-slider'),
						'image' => ['url' => BDTPS_ASSETS_URL . 'images/slider2.jpg']
					],
					[
						'sub_title' => esc_html__('Discover your Talents', 'bdthemes-prime-slider'),
						'title' => esc_html__('On Elementor', 'bdthemes-prime-slider'),
						'image' => ['url' => BDTPS_ASSETS_URL . 'images/slider3.jpg']
					],
				],
				'fields' => [

					[
						'name'        => 'sub_title',
						'label'       => esc_html__('Sub Title', 'bdthemes-prime-slider'),
						'type'        => Controls_Manager::TEXT,
						'label_block' => true,
						'dynamic'     => ['active' => true],
					],

					[
						'name'        => 'title',
						'label'       => esc_html__('Title', 'bdthemes-prime-slider'),
						'type'        => Controls_Manager::TEXT,
						'default'     => esc_html__('Slide Title', 'bdthemes-prime-slider'),
						'label_block' => true,
						'dynamic'     => ['active' => true],
					],

					[
						'name'          => 'title_link',
						'label'         => esc_html__('Title Link', 'bdthemes-prime-slider'),
						'type'          => Controls_Manager::URL,
						'default'       => ['url' => ''],
						'show_external' => false,
						'dynamic'       => ['active' => true],
						'condition'     => [
							'title!' => ''
						]
					],

					[
						'name'        => 'slide_button_text',
						'label'       => esc_html__('Button Text', 'bdthemes-prime-slider'),
						'type'        => Controls_Manager::TEXT,
						'default'     => esc_html__('Details', 'bdthemes-prime-slider'),
						'label_block' => true,
						'dynamic'     => ['active' => true],
					],

					[
						'name'          => 'button_link',
						'label'         => esc_html__('Button Link', 'bdthemes-prime-slider'),
						'type'          => Controls_Manager::URL,
						'default'       => ['url' => ''],
						'dynamic'       => ['active' => true],
						'condition'     => [
							'title!' => '',
						]
					],

					[
						'name'        => 'excerpt',
						'label'       => esc_html__('Excerpt', 'bdthemes-prime-slider'),
						'type'        => Controls_Manager::WYSIWYG,
						'default'     => esc_html__('Sed ut perspiciatis unde omnis iste natus error sit voluptatem, totam rem aperiam, eaque ipsa quae ab illo inventore et quasi architecto beatae vitae dicta sunt explicabo.', 'bdthemes-prime-slider'),
						'label_block' => true,
						'dynamic'     => ['active' => true],
					],

					[
						'name'      => 'image',
						'label'     => esc_html__('Image', 'bdthemes-prime-slider'),
						'type'      => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'dynamic'     => ['active' => true],
					],

				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'         => 'thumbnail_size',
				'label'        => esc_html__( 'Image Size', 'bdthemes-prime-slider' ),
				'exclude'      => [ 'custom' ],
				'default'      => 'full',
				'prefix_class' => 'bdt-prime-slider-thumbnail-size-',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_social_link',
			[
				'label' 	=> __('Social Share', 'bdthemes-prime-slider'),
				'condition' => [
					'show_social_icon' => 'yes',
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'social_link_title',
			[
				'label'   => __('Title', 'bdthemes-prime-slider'),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Facebook',
			]
		);

		$repeater->add_control(
			'social_link',
			[
				'label'   => __('Link', 'bdthemes-prime-slider'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('http://www.facebook.com/bdthemes/', 'bdthemes-prime-slider'),
			]
		);

		$this->add_control(
			'social_link_list',
			[
				'type'    => Controls_Manager::REPEATER,
				'fields'  => array_values($repeater->get_controls()),
				'default' => [
					[
						'social_link'       => __('http://www.facebook.com/bdthemes/', 'bdthemes-prime-slider'),
						'social_link_title' => 'Facebook',
					],
					[
						'social_link'       => __('http://www.twitter.com/bdthemes/', 'bdthemes-prime-slider'),
						'social_link_title' => 'Twitter',
					],
					[
						'social_link'       => __('http://www.instagram.com/bdthemes/', 'bdthemes-prime-slider'),
						'social_link_title' => 'Instagram',
					],
				],
				'title_field' => '{{{ social_link_title }}}',
			]
		);

		$this->end_controls_section();

		
		$this->start_controls_section(
			'section_content_animation',
			[
				'label' => esc_html__('Animation', 'bdthemes-prime-slider'),
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'   => esc_html__('Autoplay', 'bdthemes-prime-slider'),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay_interval',
			[
				'label'     => esc_html__('Autoplay Interval', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 7000,
				'condition' => [
					'autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'pause_on_hover',
			[
				'label'     => esc_html__('Pause on Hover', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::SWITCHER,
			]
		);

		$this->end_controls_section();


		//Style Start
		$this->start_controls_section(
			'section_style_sliders',
			[
				'label'     => esc_html__('Sliders', 'bdthemes-prime-slider'),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'overlay',
			[
				'label'   => esc_html__('Overlay', 'bdthemes-prime-slider'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none'       => esc_html__('None', 'bdthemes-prime-slider'),
					'background' => esc_html__('Background', 'bdthemes-prime-slider'),
					'blend'      => esc_html__('Blend', 'bdthemes-prime-slider'),
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'overlay_color',
			[
				'label'     => esc_html__('Overlay Color', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'overlay' => ['background', 'blend'],
				],
				'selectors' => [
					'{{WRAPPER}} .bdt-slideshow .bdt-overlay-default' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'blend_type',
			[
				'label'     => esc_html__('Blend Type', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'multiply',
				'options'   => prime_slider_blend_options(),
				'condition' => [
					'overlay' => 'blend',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .bdt-prime-slider-dragon .bdt-ps-dragon-bg img',
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs('slider_item_style');

		$this->start_controls_tab(
			'slider_title_style',
			[
				'label' 	=> __('Title', 'bdthemes-prime-slider'),
				'condition' => [
					'show_title' => ['yes'],
				],
			]
		);

		$this->add_responsive_control(
			'title_width',
			[
				'label' => esc_html__('Title Width', 'bdthemes-prime-slider'),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 220,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-prime-slider-wrapper .bdt-prime-slider-content' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_title' => ['yes'],
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__('Color', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider .bdt-prime-slider-content .bdt-main-title .bdt-title-tag' => 'color: {{VALUE}};',
				],
				'condition' => [
					'show_title' => ['yes'],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => esc_html__('Typography', 'bdthemes-prime-slider'),
				'selector' => '{{WRAPPER}} .bdt-prime-slider .bdt-prime-slider-content .bdt-main-title .bdt-title-tag',
				'condition' => [
					'show_title' => ['yes'],
				],
			]
		);

		$this->add_responsive_control(
			'prime_slider_title_spacing',
			[
				'label' => esc_html__('Title Spacing', 'bdthemes-prime-slider'),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider .bdt-prime-slider-content .bdt-main-title .bdt-title-tag' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_title' => ['yes'],
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'slider_sub_title_style',
			[
				'label' 	=> __('Sub Title', 'bdthemes-prime-slider'),
				'condition' => [
					'show_sub_title' => ['yes'],
				],
			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label'     => esc_html__('Color', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider .bdt-prime-slider-content h4' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'sub_title_typography',
				'label'    => esc_html__('Typography', 'bdthemes-prime-slider'),
				'selector' => '{{WRAPPER}} .bdt-prime-slider .bdt-prime-slider-content h4',
			]
		);

		$this->add_responsive_control(
			'prime_slider_sub_title_spacing',
			[
				'label' => esc_html__('Sub Title Spacing', 'bdthemes-prime-slider'),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider .bdt-prime-slider-content .bdt-sub-title h4' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_sub_title' => ['yes'],
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'slider_style_excerpt',
			[
				'label'     => esc_html__('Excerpt', 'bdthemes-prime-slider'),
				'condition' => [
					'show_excerpt' => ['yes'],
				],
			]
		);

		$this->add_control(
			'excerpt_color',
			[
				'label'     => esc_html__('Color', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider .bdt-slider-excerpt' => 'color: {{VALUE}};',
				],
			]
		);

		if ( $this->get_skins() ) {
			$this->add_control(
				'excerpt_background_color',
				[
					'label'     => esc_html__('Background', 'bdthemes-prime-slider'),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .bdt-prime-slider-skin-slice .bdt-slide-text-btn-area' => 'background: {{VALUE}};',
					],
					'condition' => [
						'_skin'  => ['slice'],
					],
				]
			);
		} else {
			$this->add_control(
				'excerpt_background_color',
				[
					'label'     => esc_html__('Background', 'bdthemes-prime-slider'),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .bdt-prime-slider-skin-slice .bdt-slide-text-btn-area' => 'background: {{VALUE}};',
					],
					'condition' => [
						'_skin'  => [''],
					],
				]
			);
		}

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'excerpt_typography',
				'label'    => esc_html__('Typography', 'bdthemes-prime-slider'),
				'selector' => '{{WRAPPER}} .bdt-prime-slider .bdt-slider-excerpt',
			]
		);

		$this->add_responsive_control(
			'excerpt_width',
			[
				'label' 	 	 => __('Width (px)', 'bdthemes-prime-slider'),
				'type' 			 => Controls_Manager::SLIDER,
				'default' 		 => [
					'unit' => 'px',
				],
				'tablet_default' => [
					'unit' => 'px',
				],
				'mobile_default' => [
					'unit' => 'px',
				],
				'size_units' 	 => ['px'],
				'range' 		 => [
					'px' => [
						'min' => 100,
						'max' => 800,
					],
				],
				'selectors'  	 => [
					'{{WRAPPER}} .bdt-prime-slider .bdt-slider-excerpt' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'prime_slider_excerpt_spacing',
			[
				'label' 	=> esc_html__('Excerpt Spacing', 'bdthemes-prime-slider'),
				'type'  	=> Controls_Manager::SLIDER,
				'range' 	=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider .bdt-slider-excerpt' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_excerpt'  => ['yes'],
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'slider_button_style',
			[
				'label' 	=> __('Button', 'bdthemes-prime-slider'),
				'condition' => [
					'show_button_text' => 'yes',
				],
			]
		);

		$this->add_control(
			'slider_button_style_normal',
			[
				'label' 	=> esc_html__('Normal', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'slide_button_text_color',
			[
				'label' 	=> __('Text Color', 'bdthemes-prime-slider'),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-ps-dragon-button .bdt-ps-button-text' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'slide_button_icon_color',
			[
				'label' 	=> __('Icon Color', 'bdthemes-prime-slider'),
				'type' 	 	=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-ps-dragon-button .bdt-ps-button-arrow, {{WRAPPER}} .bdt-prime-slider-dragon .bdt-ps-dragon-button .bdt-ps-button-small-circle' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-ps-dragon-button .bdt-ps-button-arrow:after' => 'border-left-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'slide_button_circle_color',
			[
				'label' 	=> __('Circle Color', 'bdthemes-prime-slider'),
				'type' 	 	=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-ps-dragon-button .bdt-ps-button-border-circle' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'slide_button_typography',
				'selector'  => '{{WRAPPER}} .bdt-prime-slider-dragon .bdt-ps-dragon-button .bdt-ps-button-text',
			]
		);

		$this->add_control(
			'slider_button_style_hover',
			[
				'label' 	=> esc_html__('Hover', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'slide_button_hover_text_color',
			[
				'label' 	=> __('Text Color', 'bdthemes-prime-slider'),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-ps-dragon-button:hover .bdt-ps-button-text' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'slide_button_hover_circle_color',
			[
				'label' 	=> __('Circle Color', 'bdthemes-prime-slider'),
				'type' 	 	=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-ps-dragon-button:hover .bdt-ps-button-border-circle' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_social_icon',
			[
				'label'     => esc_html__('Social Icon', 'bdthemes-prime-slider'),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_social_icon' => 'yes',
				],
			]
		);

		$this->start_controls_tabs('tabs_social_icon_style');

		$this->start_controls_tab(
			'tab_social_icon_normal',
			[
				'label' => esc_html__('Normal', 'bdthemes-prime-slider'),
			]
		);

		$this->add_control(
			'social_icon_color',
			[
				'label'     => esc_html__('Text Color', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-prime-slider-social-icon a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'social_icon_cirlce_color',
			[
				'label'     => esc_html__('Circle Color', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-prime-slider-social-icon a:before' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'social_icon_spacing',
			[
				'label' => esc_html__('Spacing', 'bdthemes-prime-slider'),
				'type'  => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-prime-slider-social-icon a'    => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'social_icon_typography',
				'selector'  => '{{WRAPPER}} .bdt-prime-slider-dragon .bdt-prime-slider-social-icon a',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_social_icon_hover',
			[
				'label' => esc_html__('Hover', 'bdthemes-prime-slider'),
			]
		);

		$this->add_control(
			'social_icon_hover_color',
			[
				'label'     => esc_html__('Text Color', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-prime-slider-social-icon a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_navigation',
			[
				'label'     => __('Navigation', 'bdthemes-prime-slider'),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'navigation_number_color',
			[
				'label'     => __('Color', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-dotnav li:after' => 'color: {{VALUE}}',
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-dotnav li:before' => 'background: {{VALUE}}',
				],
				'condition' => [
					'show_navigation_dots' => ['yes'],
				],
			]
		);

		$this->add_control(
			'navigation_number_hover_color',
			[
				'label'     => __('Hover Color', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-dotnav li:hover:after' => 'color: {{VALUE}}',
				],
				'condition' => [
					'show_navigation_dots' => ['yes'],
				],
			]
		);

		$this->add_control(
			'navigation_number_active_color',
			[
				'label'     => __('Active Color', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-dotnav li.bdt-active:after' => 'color: {{VALUE}}',
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-dotnav li.bdt-active:before' => 'background: {{VALUE}}',
				],
				'condition' => [
					'show_navigation_dots' => ['yes'],
				],
			]
		);

		$this->add_responsive_control(
			'navigation_number_size',
			[
				'label'     => __('Size', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-dotnav li:after' => 'font-size: {{SIZE}}px',
				],
				'condition' => [
					'show_navigation_dots' => ['yes'],
				],
			]
		);

		$this->add_responsive_control(
			'navigation_line_width',
			[
				'label'     => __('Line Width', 'bdthemes-prime-slider'),
				'type'      => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .bdt-prime-slider-dragon .bdt-dotnav li.bdt-active:before' => 'width: {{SIZE}}px',
				],
				'condition' => [
					'show_navigation_dots' => ['yes'],
				],
			]
		);

		$this->end_controls_section();
	}

	public function render_header($skin_name = 'dragon') {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute('slider', 'class', 'bdt-prime-slider-' . $skin_name);

		$ratio = ($settings['slider_size_ratio']['width'] && $settings['slider_size_ratio']['height']) ? $settings['slider_size_ratio']['width'] . ":" . $settings['slider_size_ratio']['height'] : '16:9';

		$this->add_render_attribute(
			[
				'slideshow' => [
					'bdt-slideshow' => [
						wp_json_encode([
							"animation"         => 'fade',
							"ratio"             => $ratio,
							"min-height"        => ($settings["slider_min_height"]["size"]) ? $settings["slider_min_height"]["size"] : 480,
							"autoplay"          => ($settings["autoplay"]) ? true : false,
							"autoplay-interval" => $settings["autoplay_interval"],
							"pause-on-hover"    => ("yes" === $settings["pause_on_hover"]) ? true : false,
						])
					]
				]
			]
		);

		?>
			<div class="bdt-prime-slider">
				<div <?php echo $this->get_render_attribute_string('slider'); ?>>

				<div class="bdt-position-relative bdt-visible-toggle" <?php echo $this->get_render_attribute_string('slideshow'); ?>>

					<ul class="bdt-slideshow-items">
		<?php
	}

    public function render_navigation_dots() {
        $settings = $this->get_settings_for_display();

        ?>
            <?php if ($settings['show_navigation_dots']) : ?>

                <ul class="bdt-dotnav bdt-dotnav-vertical">

                    <?php $slide_index = 1; foreach ( $settings['slides'] as $slide ) : ?>
                    <li bdt-slideshow-item="<?php echo ($slide_index - 1); ?>" data-label="<?php echo str_pad( $slide_index, 2, '0', STR_PAD_LEFT); ?>" ><a href="#"></a></li>
                    <?php $slide_index++;  endforeach; ?>
                    
                </ul>

            <?php endif; ?>

        <?php
    }

    public function render_footer() {

        ?>

                </ul>

                <?php $this->render_navigation_dots(); ?>
				
            </div>
			<?php $this->render_social_link(); ?>
		</div>
        <?php
	}

	public function render_social_link($class = []) {
		$settings  = $this->get_active_settings();

		if ('' == $settings['show_social_icon']) {
			return;
		}

		$this->add_render_attribute('social-icon', 'class', 'bdt-prime-slider-social-icon');
		$this->add_render_attribute('social-icon', 'class', $class);

		?>

			<div <?php echo $this->get_render_attribute_string('social-icon'); ?>>

				<?php foreach ($settings['social_link_list'] as $link) : ?>

					<a href="<?php echo esc_url($link['social_link']); ?>" target="_blank">
						<span class="bdt-social-share-title">
							<?php echo esc_html($link['social_link_title']); ?>
						</span>
					</a>
					
				<?php endforeach; ?>

			</div>

		<?php
	}
	
	public function rendar_item_image($item, $alt = '') {
		$settings = $this->get_settings_for_display();
		
		$image_src = Group_Control_Image_Size::get_attachment_image_src($item['image']['id'], 'thumbnail_size', $settings);

		if ( $image_src ) {
			$image_final_src = $image_src;
		} elseif ( $item['image']['url'] ) {
			$image_final_src = $item['image']['url'];
		} else {
			return;
		}
		?>

		<img src="<?php echo esc_url($image_final_src); ?>" alt="<?php echo esc_html($alt); ?>" bdt-cover>

		<?php
	}

	public function render_button($content) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute('slider-button', 'class', 'bdt-ps-dragon-button', true);

		if ($content['button_link']['url']) {
			$this->add_render_attribute('slider-button', 'href', $content['button_link']['url'], true);

			if ($content['button_link']['is_external']) {
				$this->add_render_attribute('slider-button', 'target', '_blank', true);
			}

			if ($content['button_link']['nofollow']) {
				$this->add_render_attribute('slider-button', 'rel', 'nofollow', true);
			}
		} else {
			$this->add_render_attribute('slider-button', 'href', '#', true);
		}

		?>

		<?php if ($content['slide_button_text'] && ('yes' == $settings['show_button_text'])) : ?>

			<a <?php echo $this->get_render_attribute_string('slider-button'); ?>>

				<?php

					$this->add_render_attribute([
						'content-wrapper' => [
							'class' => 'bdt-prime-slider-button-wrapper',
						],
						'text' => [
							'class' => 'bdt-prime-slider-button-text bdt-flex bdt-flex-middle bdt-flex-inline',
						],
					], '', '', true);

				?>
				
				<div class="bdt-ps-button">
					<div class="bdt-ps-button-text"><?php echo wp_kses($content['slide_button_text'], prime_slider_allow_tags('title')); ?></div>
					
					<div class="bdt-ps-button-wrapper">
						<div class="bdt-ps-button-arrow"></div>
						<div class="bdt-ps-button-border-circle"></div>
						<div class="bdt-ps-button-mask-circle">
						<div class="bdt-ps-button-small-circle"></div>
						</div>
					</div>
				</div>

			</a>
		<?php endif;
	}

	public function render_item_content($slide_content) {
        $settings = $this->get_settings_for_display();

        ?>
			<div class="bdt-prime-slider-wrapper">
				<div class="bdt-prime-slider-content">

					<?php if ($slide_content['sub_title'] && ('yes' == $settings['show_sub_title'])) : ?>
						<div class="bdt-sub-title">
							<h4 bdt-slideshow-parallax="x: 100,-100; opacity: 1,1,0">
								<?php echo wp_kses_post($slide_content['sub_title']); ?>
							</h4>
						</div>
					<?php endif; ?>

					<?php if ($slide_content['title'] && ('yes' == $settings['show_title'])) : ?>
						<div class="bdt-main-title">
							<<?php echo esc_html($settings['title_html_tag']); ?> class="bdt-title-tag"  bdt-slideshow-parallax="x: 200,-200; opacity: 1,1,0">
								<?php if ('' !== $slide_content['title_link']['url']) : ?>
									<a href="<?php echo esc_url($slide_content['title_link']['url']); ?>">
									<?php endif; ?>
									<?php echo prime_slider_first_word($slide_content['title']); ?>
									<?php if ('' !== $slide_content['title_link']['url']) : ?>
									</a>
								<?php endif; ?>
							</<?php echo esc_html($settings['title_html_tag']); ?>>
						</div>
					<?php endif; ?>

					<?php if ($slide_content['excerpt'] && ('yes' == $settings['show_excerpt'])) : ?>
						<div class="bdt-slider-excerpt" bdt-slideshow-parallax="x: 300,-300; opacity: 1,1,0">
							<?php echo wp_kses_post($slide_content['excerpt']); ?>
						</div>
					<?php endif; ?>

					<div bdt-slideshow-parallax="x: 400,-400; opacity: 1,1,0">
						<?php $this->render_button($slide_content); ?>
					</div>
						
				</div>
			</div>

        <?php
    }

    public function render_slides_loop() {
        $settings = $this->get_settings_for_display();

        foreach ($settings['slides'] as $slide) : ?>

            <li class="bdt-slideshow-item bdt-flex bdt-flex-middle elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>">

				<div class="bdt-ps-dragon-bg">
					<?php $this->rendar_item_image($slide, $slide['title']); ?>
				</div>

				<div class="bdt-ps-dragon-slide-image">
					<?php $this->rendar_item_image($slide, $slide['title']); ?>
				</div>

				<?php if ('none' !== $settings['overlay']) :
					$blend_type = ('blend' == $settings['overlay']) ? ' bdt-blend-' . $settings['blend_type'] : ''; ?>
					<div class="bdt-overlay-default bdt-position-cover<?php echo esc_attr($blend_type); ?>"></div>
				<?php endif; ?>
				
				<?php $this->render_item_content($slide); ?>

            </li>

        <?php endforeach;
    }

    public function render() {
		
        $this->render_header();

        $this->render_slides_loop();

        $this->render_footer();
    }
}