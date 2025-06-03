<?php
namespace PdExtraWidgets\Widgets\ReadMore\StyleControls;

use Elementor\Controls_Manager;

class StyleControls {

    private $widget;

    public function __construct($widget) {
        $this->widget = $widget;
    }

    public function register() {
        $this->addContentStyleControls();

        $this->widget->start_controls_section(
            'button_style_section',
            [
                'label' => __( 'Button', 'pd-extra-widgets' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->addDefaultButtonStyleControls();
        $this->addButtonNormalStyleControls();
        $this->addButtonHoverStyleControls();
        $this->addButtonBorderStyleControls();

        $this->widget->end_controls_section();

    }

    protected function addContentStyleControls() {
        $this->widget->start_controls_section(
            'content_style_section',
            [
                'label' => __( 'Content', 'pd-extra-widgets' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Text Alignment
        $this->widget->add_responsive_control(
            'text_align',
            [
                'label' => __( 'Text Alignment', 'pd-extra-widgets' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'pd-extra-widgets' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'pd-extra-widgets' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'pd-extra-widgets' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .short-text' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .long-text' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Short Text Styling
        $this->widget->add_control(
            'short_text_color',
            [
                'label' => __( 'Text Color', 'pd-extra-widgets' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .short-text' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .long-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->widget->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'short_text_typography',
                'selectors' => [
                    '{{WRAPPER}} .short-text',
                    '{{WRAPPER}} .long-text',
                ]
            ]
        );

        $this->widget->end_controls_section();
    }

        protected function addDefaultButtonStyleControls(){
        // === POSITION ===
        $this->widget->add_responsive_control(
            'button_position',
            [
                'label' => __( 'Button Position', 'pd-extra-widgets' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'pd-extra-widgets' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'pd-extra-widgets' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'pd-extra-widgets' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .pd-ew-read-more-button-container' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // === TYPOGRAPHY ===
        $this->widget->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .pd-ew-read-more-button',
            ]
        );
    }

    protected function addButtonNormalStyleControls(){
        // Normal state
        $this->widget->start_controls_tabs( 'button_style_tabs',);

        $this->widget->start_controls_tab(
            'button_style_normal',
            [
                'label' => __( 'Normal', 'pd-extra-widgets' ),
            ]
        );

        $this->widget->add_control(
            'button_text_color',
            [
                'label' => __( 'Text Color', 'pd-extra-widgets' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .pd-ew-read-more-button' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .pd-ew-read-more-button svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->widget->add_control(
            'button_background_color',
            [
                'label' => __( 'Background Color', 'pd-extra-widgets' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#0073e6',
                'selectors' => [
                    '{{WRAPPER}} .pd-ew-read-more-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->widget->end_controls_tab();
    }

    protected function addButtonHoverStyleControls(){
        // Hover state
        $this->widget->start_controls_tab(
            'button_style_hover',
            [
                'label' => __( 'Hover', 'pd-extra-widgets' ),
            ]
        );

        $this->widget->add_control(
            'button_text_color_hover',
            [
                'label' => __( 'Text Color (hover)', 'pd-extra-widgets' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .pd-ew-read-more-button:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .pd-ew-read-more-button:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->widget->add_control(
            'button_background_color_hover',
            [
                'label' => __( 'Background Color (hover)', 'pd-extra-widgets' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#005bb5',
                'selectors' => [
                    '{{WRAPPER}} .pd-ew-read-more-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->widget->end_controls_tab();
        $this->widget->end_controls_tabs();
    }

    protected function addButtonBorderStyleControls() {
        
        $this->widget->add_control('button_color', [
            'label' => __('Border Color', 'pd-extra-widgets'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pd-ew-read-more-button' => 'border-color: {{VALUE}};',
            ],
        ]);

        $this->widget->add_control('button_border_style', [
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
                '{{WRAPPER}} .pd-ew-read-more-button' => 'border-style: {{VALUE}};',
            ],
        ]);

        $this->widget->add_control('button_border_width', [
            'label' => __('Border Width', 'pd-extra-widgets'),
            'type' => Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .pd-ew-read-more-button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        // === BORDER RADIUS ===
        $this->widget->add_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'pd-extra-widgets' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .pd-ew-read-more-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // === BOX SHADOW ===
        $this->widget->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .pd-ew-read-more-button',
            ]
        );

        // === PADDING ===
        $this->widget->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding', 'pd-extra-widgets' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pd-ew-read-more-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
    }
}
