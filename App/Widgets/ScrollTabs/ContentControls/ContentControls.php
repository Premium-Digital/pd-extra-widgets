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
            'label'   => __('Layout Type', 'pd-extra-widgets'),
            'type'    => Controls_Manager::SELECT,
            'default' => 'two-columns',
            'options' => [
                'one-column'  => __('One Column', 'pd-extra-widgets'),
                'two-columns' => __('Two Columns', 'pd-extra-widgets'),
            ],
        ]);

        $this->widget->add_responsive_control('image_position', [
            'label'     => __('Image Position (for Two Columns)', 'pd-extra-widgets'),
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
            'default'   => 'right',
            'condition' => [
                'layout' => 'two-columns',
            ],
        ]);

        $this->widget->add_responsive_control(
            'tabs_vertical_alignment',
            [
                'label' => __('Vertical Alignment', 'pd-extra-widgets'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'top' => [
                        'title' => __('Top', 'pd-extra-widgets'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => __('Middle', 'pd-extra-widgets'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'bottom' => [
                        'title' => __('Bottom', 'pd-extra-widgets'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'top',
                'condition' => [
                    'layout' => 'two-columns',
                ],
            ]
        );

        $this->widget->end_controls_section();
    }
}
