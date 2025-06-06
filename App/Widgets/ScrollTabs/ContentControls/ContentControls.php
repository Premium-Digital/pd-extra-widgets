<?php
namespace PdExtraWidgets\Widgets\ScrollTabs\ContentControls;

use Elementor\Controls_Manager;
use Elementor\Repeater;

class ContentControls {

    private $widget;

    public function __construct($widget) {
        $this->widget = $widget;
    }

    public function register() {
        $this->tabsControls();
        $this->layoutControls();
    }

    protected function tabsControls() {
        $this->widget->start_controls_section('tabs_section', [
            'label' => 'Tabs',
        ]);

        $repeater = new Repeater();
        $repeater->add_control('tab_title', [
            'label' => __( 'Title', 'pd-extra-widgets' ),
            'type' => Controls_Manager::TEXT,
            'default' => 'Tab Title',
        ]);
        $repeater->add_control('tab_description', [
            'label' => __( 'Description', 'pd-extra-widgets' ),
            'type' => Controls_Manager::TEXTAREA,
            'default' => 'Tab description here...',
        ]);
        $repeater->add_control('tab_image', [
            'label' => __( 'Image', 'pd-extra-widgets' ),
            'type' => Controls_Manager::MEDIA,
        ]);
        $this->widget->add_control('tabs', [
            'label' => __( 'Tabs', 'pd-extra-widgets' ),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [],
        ]);

        $this->widget->end_controls_section();
    }

    protected function layoutControls() {
        $this->widget->start_controls_section('layout_section', [
            'label' => __('Layout', 'pd-extra-widgets'),
            'tab'   => Controls_Manager::TAB_CONTENT,
        ]);

        $this->widget->add_responsive_control('layout', [
            'label' => __('Layout Type', 'pd-extra-widgets'),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'column' => [
                    'title' => __('One Column', 'pd-extra-widgets'),
                    'icon'  => 'eicon-column',
                ],
                'row' => [
                    'title' => __('Two Columns', 'pd-extra-widgets'),
                    'icon'  => 'eicon-columns',
                ],
            ],
            'toggle' => false,
            'selectors' => [
                '{{WRAPPER}} .scroll-tabs-widget .tabs-content' => 'flex-direction: {{VALUE}};',
                '{{WRAPPER}} .scroll-tabs-widget' => '--layout: {{VALUE}};',
            ],
        ]);

        $this->widget->add_responsive_control('tabs_direction', [
            'label' => __('Tabs Direction', 'pd-extra-widgets'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'column' => __('Vertical', 'pd-extra-widgets'),
                'row' => __('Horizontal', 'pd-extra-widgets'),
            ],
            'default' => 'vertical',
            'selectors' => [
                '{{WRAPPER}} .scroll-tabs-widget.layout-column .tabs-column' => 'flex-direction: {{VALUE}};',
                '{{WRAPPER}} .scroll-tabs-widget.layout-row .tabs-column' => 'flex-direction: {{VALUE}};',
            ],
            'condition' => [
                'layout' => 'column',
            ],
        ]);

        $this->widget->add_responsive_control('tabs_position', [
            'label'     => __('Tabs position (for Two Columns)', 'pd-extra-widgets'),
            'type'      => Controls_Manager::CHOOSE,
            'label_block' => true,
            'options'   => [
                'left'  => [
                    'title' => __('Left', 'pd-extra-widgets'),
                    'icon'  => 'eicon-h-align-left',
                ],
                'right' => [
                    'title' => __('Right', 'pd-extra-widgets'),
                    'icon'  => 'eicon-h-align-right',
                ],
            ],
            'default'   => 'left',
            'condition' => [
                'layout' => 'row',
            ],
        ]);

        $this->widget->add_responsive_control(
            'tab_gap',
            [
                'label' => __('Tab Gap', 'pd-extra-widgets'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tabs-content' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->widget->add_responsive_control(
            'tab_width',
            [
                'label' => __('Tab Width', 'pd-extra-widgets'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 600,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->widget->add_responsive_control(
            'tabs_vertical_alignment',
            [
                'label' => __('Tabs Vertical Alignment', 'pd-extra-widgets'),
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
                    '{{WRAPPER}} .scroll-tabs-widget .tabs-column' => 'align-self: {{VALUE}};',
                ],
                'condition' => [
                    'layout' => 'row',
                ],
            ]
        );

        $this->widget->add_responsive_control(
            'tabs_horizontal_alignment',
            [
                'label' => __('Tabs Horizontal Alignment', 'pd-extra-widgets'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __('Left', 'pd-extra-widgets'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'pd-extra-widgets'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', 'pd-extra-widgets'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tabs-column' => 'align-items: {{VALUE}}; justify-content: {{VALUE}};',
                ],
                'toggle' => false,
            ]
        );

        $this->widget->end_controls_section();
    }
}
