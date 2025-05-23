<?php

namespace PdExtraWidgets\Widgets\ReadMore\ContentControls;

use Elementor\Controls_Manager;

class ButtonControls
{
    private $widget;

    public function __construct($widget) {
        $this->widget = $widget;
    }

    public function register() {
    {
        $this->widget->start_controls_section(
            'button_section',
            [
                'label' => __('Button', 'pd-extra-widgets'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->widget->add_control(
            'button_text',
            [
                'label'   => __('Button Text ', 'pd-extra-widgets'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Read more', 'pd-extra-widgets'),
            ]
        );

        $this->widget->add_control(
            'button_text_expanded',
            [
                'label'   => __('Expanded Button Text', 'pd-extra-widgets'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Read less', 'pd-extra-widgets'),
            ]
        );

        $this->widget->add_control(
            'button_icon',
            [
                'label'       => __('Button Icon', 'pd-extra-widgets'),
                'type'        => Controls_Manager::ICONS,
                'label_block' => true,
            ]
        );

        $this->widget->add_control(
            'icon_position',
            [
                'label'     => __('Icon Position', 'pd-extra-widgets'),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'before' => [
                        'title' => __('Before', 'pd-extra-widgets'),
                        'icon'  => 'eicon-arrow-left',
                    ],
                    'after'  => [
                        'title' => __('After', 'pd-extra-widgets'),
                        'icon'  => 'eicon-arrow-right',
                    ],
                ],
                'default'   => 'before',
                'toggle'    => false,
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );

        $this->widget->add_responsive_control(
            'icon_size',
            [
                'label'     => __('Icon Size', 'pd-extra-widgets'),
                'type'      => Controls_Manager::SLIDER,
                'size_units'=> ['px', 'em', 'rem'],
                'range'     => [
                    'px' => ['min' => 5, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pd-ew-read-more-button .elementor-icon' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                    '{{WRAPPER}} .pd-ew-read-more-button svg'            => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                    '{{WRAPPER}} .button-icon i'                         => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->widget->add_responsive_control(
            'icon_gap',
            [
                'label'     => __('Icon Gap', 'pd-extra-widgets'),
                'type'      => Controls_Manager::SLIDER,
                'size_units'=> ['px', '%'],
                'range'     => [
                    'px' => ['min' => 0, 'max' => 50],
                    '%'  => ['min' => 0, 'max' => 100],
                ],
                'default'   => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .pd-ew-read-more-button.icon-before .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .pd-ew-read-more-button.icon-after .button-icon'  => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->widget->add_responsive_control(
            'text_animation_duration',
            [
                'label'     => __('Animation Duration (ms)', 'pd-extra-widgets'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => ['min' => 100, 'max' => 2000],
                ],
                'default'   => [
                    'unit' => 'px',
                    'size' => 500,
                ],
                'selectors' => [
                    '{{WRAPPER}} .long-text' => 'transition-duration: {{SIZE}}ms;',
                ],
            ]
        );

        $this->widget->end_controls_section();
    }
    }
}