<?php
namespace PdExtraWidgets\Widgets\SlideMenu\StyleControls;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class StyleControls
{
    private $widget;

    public function __construct($widget)
    {
        $this->widget = $widget;
    }

    public function register()
    {
        $this->widget->start_controls_section(
            'menu_style',
            [
                'label' => __('Menu', 'pd-extra-widgets'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->widget->add_responsive_control(
            'alignment',
            [
                'label' => __('Alignment', 'pd-extra-widgets'),
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
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} li.menu-item ' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->widget->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_menu',
                'selector' => '{{WRAPPER}} .menu > li.menu-item a',
            ]
        );

        $this->widget->add_control(
            'menu_link_color',
            [
                'label' => __('Color', 'pd-extra-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu > li.menu-item a' => 'color: {{VALUE}};',
                ],
                'default' => '#000000',
            ]
        );

        $this->widget->add_responsive_control(
            'menu_link_padding',
            [
                'label' => __('Links padding', 'pd-extra-widgets'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .menu > li.menu-item' => 'padding: {{TOP}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .menu > li.menu-item a' => 'padding-right:{{RIGHT}}{{UNIT}}',
                ],
                'default' => [
                    'top' => '10',
                    'right' => '15',
                    'bottom' => '10',
                    'left' => '15',
                    'unit' => 'px',
                ],
            ]
        );


        $this->widget->end_controls_section();

        $this->widget->start_controls_section(
            'submenu_style',
            [
                'label' => __('Submenu', 'pd-extra-widgets'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->widget->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_submenu',
                'selector' => '{{WRAPPER}} .sub-menu-slide > li.menu-item a',
            ]
        );

        $this->widget->add_control(
            'submenu_link_color',
            [
                'label' => __('Color', 'pd-extra-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu > li.menu-item a' => 'color: {{VALUE}};',
                ],
                'default' => '#000000',
            ]
        );

        $this->widget->add_control(
            'bg_color',
            [
                'label' => __('Background color', 'pd-extra-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .submenu-wrapper ' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->widget->add_responsive_control(
            'submenu_link_padding',
            [
                'label' => __('Submenu links padding', 'pd-extra-widgets'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .sub-menu-slide > li.menu-item' => 'padding: {{TOP}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sub-menu-slide > li.menu-item a' => 'padding-right:{{RIGHT}}{{UNIT}}',
                ],
                'default' => [
                    'top' => '10',
                    'right' => '15',
                    'bottom' => '10',
                    'left' => '15',
                    'unit' => 'px',
                ],
            ]
        );

        $this->widget->end_controls_section();

    }
}
