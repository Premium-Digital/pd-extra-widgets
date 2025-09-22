<?php
namespace PdExtraWidgets\Widgets\CopyrightText\StyleControls;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Color;

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
            'section_style',
            [
                'label' => __('Style', 'pd-extra-widgets'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Alignment
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .copyright-text' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Typography
        $this->widget->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'selector' => '{{WRAPPER}} .copyright-text',
            ]
        );

        // Text color
        $this->widget->add_control(
            'text_color',
            [
                'label' => __('Text Color', 'pd-extra-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .copyright-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Typography dla linku
        $this->widget->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_typography',
                'label' => __('Link Typography', 'pd-extra-widgets'),
                'selector' => '{{WRAPPER}} .copyright-text .premiumdigital-link',
            ]
        );

        // Kolor linku
        $this->widget->add_control(
            'link_color',
            [
                'label' => __('Link Color', 'pd-extra-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .copyright-text .premiumdigital-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->widget->add_control(
            'link_hover_color',
            [
                'label' => __('Link Hover Color', 'pd-extra-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .copyright-text .premiumdigital-link:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->widget->end_controls_section();
    }
}
