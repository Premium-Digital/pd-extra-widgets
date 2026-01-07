<?php
namespace PdExtraWidgets\Widgets\ScrollTabs\StyleControls;

use Elementor\Controls_Manager;

class StyleControls {

    private $widget;

    public function __construct($widget) {
        $this->widget = $widget;
    }

    public function register() {
        $this->contentStyleControls();
        $this->tabsStyleControls();
        $this->tabIconStyleControls();
        $this->tabItemStyleControls();
    }

    protected function contentStyleControls() {
        $this->widget->start_controls_section(
            'content_style_section',
            [
                'label' => __('Content', 'pd-extra-widgets'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->widget->add_responsive_control(
            'tab_text_alignment',
            [
                'label' => __('Tab Text Alignment', 'pd-extra-widgets'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'pd-extra-widgets'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'pd-extra-widgets'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'pd-extra-widgets'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->widget->add_control(
            'tab_title_color',
            [
                'label' => __('Title Color', 'pd-extra-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->widget->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tab_title_typography',
                'label' => __('Title Typography', 'pd-extra-widgets'),
                'selector' => '{{WRAPPER}} .scroll-tabs-widget .tab-item h3',
            ]
        );

        $this->widget->add_control(
            'tab_description_color',
            [
                'label' => __('Description Color', 'pd-extra-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->widget->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => __('Description Typography', 'pd-extra-widgets'),
                'name' => 'tab_description_typography',
                'selector' => '{{WRAPPER}} .scroll-tabs-widget .tab-item p',
            ]
        );

        $this->widget->add_responsive_control(
            'tab_image_border_radius',
            [
                'label' => __('Image Border Radius', 'pd-extra-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-image, {{WRAPPER}} .scroll-tabs-widget .tab-image-wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->widget->add_responsive_control(
            'tab_image_max_width',
            [
                'label' => __('Image Max Width', 'pd-extra-widgets'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 800,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-image, {{WRAPPER}} .scroll-tabs-widget .tab-image-wrapper img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->widget->add_responsive_control(
            'tab_image_max_height',
            [
                'label' => __('Image Max Height', 'pd-extra-widgets'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'vh'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-image, {{WRAPPER}} .scroll-tabs-widget .tab-image-wrapper img' => 'max-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->widget->add_responsive_control(
            'tab_image_alignment',
            [
                'label' => __('Image Alignment', 'pd-extra-widgets'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __('Left', 'pd-extra-widgets'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'pd-extra-widgets'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', 'pd-extra-widgets'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-image-wrapper' => 'display: flex; justify-content: {{VALUE}};',
                    '{{WRAPPER}} .scroll-tabs-widget .image-column' => 'display: flex; justify-content: {{VALUE}};',
                ],
            ]
        );
        
        $this->widget->add_responsive_control(
            'tab_image_vertical_alignment',
            [
                'label' => __('Tab Image Vertical Alignment', 'pd-extra-widgets'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'start' => [
                        'title' => __('Top', 'pd-extra-widgets'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => __('Middle', 'pd-extra-widgets'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'end' => [
                        'title' => __('Bottom', 'pd-extra-widgets'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'start',
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .image-column' => 'align-self: {{VALUE}};',
                ],
                'condition' => [
                    'layout' => 'row',
                ],
            ]
        );

        $this->widget->end_controls_section();
    }

    protected function tabIconStyleControls() {
        $this->widget->start_controls_section(
            'tab_icon_style_section',
            [
                'label' => __('Tab icon', 'pd-extra-widgets'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->widget->add_control('tab_icon_position', [
            'label' => __('Icon Position', 'pd-extra-widgets'),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'top' => __('Top', 'pd-extra-widgets'),
                'left' => __('Left', 'pd-extra-widgets'),
                'right' => __('Right', 'pd-extra-widgets'),
            ],
            'default' => 'top',
            'selectors' => [
                '{{WRAPPER}} .scroll-tabs-widget .tab-item-inner.icon-top' => 'display:flex; flex-direction: column;',
                '{{WRAPPER}} .scroll-tabs-widget .tab-item-inner.icon-left' => 'display:flex; flex-direction: row;',
                '{{WRAPPER}} .scroll-tabs-widget .tab-item-inner.icon-right' => 'display:flex; flex-direction: row-reverse;',
            ],
        ]);

        $this->widget->add_responsive_control(
            'tab_icon_width',
            [
                'label' => __('Icon Width', 'pd-extra-widgets'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => ['min' => 8, 'max' => 200],
                ],
                'default' => ['size' => 32, 'unit' => 'px'],
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item .tab-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->widget->add_responsive_control(
            'tab_icon_margin',
            [
                'label' => __('Icon Margin', 'pd-extra-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item .tab-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->widget->add_control('tab_icon_alignment', [
            'label' => __('Icon Alignment', 'pd-extra-widgets'),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'flex-start' => ['title' => __('Left', 'pd-extra-widgets'), 'icon' => 'eicon-text-align-left'],
                'center' => ['title' => __('Center', 'pd-extra-widgets'), 'icon' => 'eicon-text-align-center'],
                'flex-end' => ['title' => __('Right', 'pd-extra-widgets'), 'icon' => 'eicon-text-align-right'],
            ],
            'default' => 'center',
            'selectors' => [
                '{{WRAPPER}} .scroll-tabs-widget .tab-item .tab-icon-wrapper' => 'display:flex; justify-content: {{VALUE}};',
            ],
        ]);

        $this->widget->add_responsive_control(
            'tab_icon_vertical_alignment',
            [
                'label' => __('Icon Vertical Alignment', 'pd-extra-widgets'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [ 'title' => __('Top', 'pd-extra-widgets'), 'icon' => 'eicon-v-align-top' ],
                    'center' => [ 'title' => __('Middle', 'pd-extra-widgets'), 'icon' => 'eicon-v-align-middle' ],
                    'flex-end' => [ 'title' => __('Bottom', 'pd-extra-widgets'), 'icon' => 'eicon-v-align-bottom' ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item .tab-item-inner' => 'align-items: {{VALUE}};',
                    '{{WRAPPER}} .scroll-tabs-widget.icon-top .tab-item .tab-icon-wrapper' => 'align-self: {{VALUE}};',
                ],
            ]
        );

        $this->widget->add_responsive_control(
            'tab_icon_content_gap',
            [
                'label' => __('Gap Between Icon and Content', 'pd-extra-widgets'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 100],
                    'em' => ['min' => 0, 'max' => 5, 'step' => 0.1],
                ],
                'default' => ['size' => 12, 'unit' => 'px'],
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item .tab-item-inner' => 'gap: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .scroll-tabs-widget.icon-top .tab-item' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->widget->end_controls_section();
    }

    protected function tabsStyleControls() {
        $this->widget->start_controls_section(
            'tabs_style_section',
            [
                'label' => __('Tabs', 'pd-extra-widgets'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->widget->add_responsive_control(
        'tab_item_gap',
            [
                'label' => __('Gap Between Tab Items', 'pd-extra-widgets'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tabs-column' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->widget->add_responsive_control(
            'tab_item_padding',
            [
                'label' => __('Tab Padding', 'pd-extra-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->widget->add_control(
            'image_animation',
            [
                'label' => __('Image Animation', 'pd-extra-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'none' => __('None', 'pd-extra-widgets'),
                    'fade-in' => __('Fade In', 'pd-extra-widgets'),
                    'slide-up' => __('Slide Up', 'pd-extra-widgets'),
                    'zoom-in' => __('Zoom In', 'pd-extra-widgets'),
                ],
                'default' => 'fade-in',
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget' => '--image-animation: {{VALUE}};',
                ],
            ]
        );

        $this->widget->add_control(
            'image_animation_duration',
            [
                'label' => __('Animation Duration (ms)', 'pd-extra-widgets'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 600,
                'min' => 100,
                'max' => 5000,
                'step' => 100,
                'selectors' => [
                '{{WRAPPER}} .scroll-tabs-widget' => '--animation-duration: {{VALUE}};',
            ],
            ]
        );

        $this->widget->end_controls_section();
    }

    public function tabItemStyleControls() {
        $this->widget->start_controls_section(
            'tab_item_style_section',
            [
                'label' => __('Tab Item', 'pd-extra-widgets'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->widget->start_controls_tabs('tab_item_style_tabs');

        $this->widget->add_responsive_control(
            'tab_item_description_visibility',
            [
                'label' => esc_html__('Description Visibility', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'active',
                'options' => [
                    'normal' => esc_html__('Always visible', 'plugin-name'),
                    'hover' => esc_html__('On hover', 'plugin-name'),
                    'active' => esc_html__('Only active', 'plugin-name'),
                    'hover_active' => esc_html__('On hover and active', 'plugin-name'),
                ],
                'default' => 'normal',
            ]
        );

        $this->widget->start_controls_tab('tab_item_style_normal', [
            'label' => __('Normal', 'pd-extra-widgets'),
        ]);
        
        $this->widget->add_responsive_control(
        'tab_item_opacity_normal',
            [
                'label' => __('Tab opacity', 'pd-extra-widgets'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->widget->add_control('tab_item_bg_color_normal', [
            'label' => __('Background Color', 'pd-extra-widgets'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tab-item' => 'background-color: {{VALUE}};',
            ],
        ]);

        $this->widget->add_control('tab_item_border_color_normal', [
            'label' => __('Border Color', 'pd-extra-widgets'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tab-item' => 'border-color: {{VALUE}};',
            ],
        ]);

        $this->widget->add_control('tab_item_border_style_normal', [
            'label' => __('Border Style', 'pd-extra-widgets'),
            'type' => Controls_Manager::SELECT,
            'default' => 'solid',
            'options' => [
                'none' => __('None', 'pd-extra-widgets'),
                'solid' => __('Solid', 'pd-extra-widgets'),
                'dashed' => __('Dashed', 'pd-extra-widgets'),
                'dotted' => __('Dotted', 'pd-extra-widgets'),
                'double' => __('Double', 'pd-extra-widgets'),
            ],
            'selectors' => [
                '{{WRAPPER}} .tab-item' => 'border-style: {{VALUE}};',
            ],
        ]);

        $this->widget->add_control('tab_item_border_width_normal', [
            'label' => __('Border Width', 'pd-extra-widgets'),
            'type' => Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .tab-item' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->widget->add_responsive_control('tab_item_border_radius_normal', [
            'label' => __('Border Radius', 'pd-extra-widgets'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .tab-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->widget->end_controls_tab();

        $this->widget->start_controls_tab('tab_item_style_hover', [
            'label' => __('Hover', 'pd-extra-widgets'),
        ]);

        $this->widget->add_responsive_control(
        'tab_item_opacity_hover',
            [
                'label' => __('Tab opacity', 'pd-extra-widgets'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item:hover' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->widget->add_control('tab_item_bg_color_hover', [
            'label' => __('Background Color', 'pd-extra-widgets'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tab-item:hover' => 'background-color: {{VALUE}};',
            ],
        ]);

        $this->widget->add_control('tab_item_border_color_hover', [
            'label' => __('Border Color', 'pd-extra-widgets'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tab-item:hover' => 'border-color: {{VALUE}};',
            ],
        ]);

        $this->widget->add_control('tab_item_border_style_hover', [
            'label' => __('Border Style', 'pd-extra-widgets'),
            'type' => Controls_Manager::SELECT,
            'default' => 'solid',
            'options' => [
                'none' => __('None', 'pd-extra-widgets'),
                'solid' => __('Solid', 'pd-extra-widgets'),
                'dashed' => __('Dashed', 'pd-extra-widgets'),
                'dotted' => __('Dotted', 'pd-extra-widgets'),
                'double' => __('Double', 'pd-extra-widgets'),
            ],
            'selectors' => [
                '{{WRAPPER}} .tab-item:hover' => 'border-style: {{VALUE}};',
            ],
        ]);

        $this->widget->add_control('tab_item_border_width_hover', [
            'label' => __('Border Width', 'pd-extra-widgets'),
            'type' => Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .tab-item:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->widget->add_responsive_control('tab_item_border_radius_hover', [
            'label' => __('Border Radius', 'pd-extra-widgets'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .tab-item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->widget->end_controls_tab();

        $this->widget->start_controls_tab('tab_item_style_active', [
            'label' => __('Active', 'pd-extra-widgets'),
        ]);

        $this->widget->add_responsive_control(
        'tab_item_opacity_active',
            [
                'label' => __('Tab opacity', 'pd-extra-widgets'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
                'default' => [
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item.active' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->widget->add_control('tab_item_bg_color_active', [
            'label' => __('Background Color', 'pd-extra-widgets'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tab-item.active' => 'background-color: {{VALUE}};',
            ],
        ]);

        $this->widget->add_control('tab_item_border_color_active', [
            'label' => __('Border Color', 'pd-extra-widgets'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tab-item.active' => 'border-color: {{VALUE}};',
            ],
        ]);

        $this->widget->add_control('tab_item_border_style_active', [
            'label' => __('Border Style', 'pd-extra-widgets'),
            'type' => Controls_Manager::SELECT,
            'default' => 'solid',
            'options' => [
                'none' => __('None', 'pd-extra-widgets'),
                'solid' => __('Solid', 'pd-extra-widgets'),
                'dashed' => __('Dashed', 'pd-extra-widgets'),
                'dotted' => __('Dotted', 'pd-extra-widgets'),
                'double' => __('Double', 'pd-extra-widgets'),
            ],
            'selectors' => [
                '{{WRAPPER}} .tab-item.active' => 'border-style: {{VALUE}};',
            ],
        ]);

        $this->widget->add_control('tab_item_border_width_active', [
            'label' => __('Border Width', 'pd-extra-widgets'),
            'type' => Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .tab-item.active' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->widget->add_responsive_control('tab_item_border_radius_active', [
            'label' => __('Border Radius', 'pd-extra-widgets'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .tab-item.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->widget->end_controls_tab();

        $this->widget->end_controls_tabs();
        $this->widget->end_controls_section();
    }
}
