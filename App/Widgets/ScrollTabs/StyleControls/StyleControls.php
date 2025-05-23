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
    }

    protected function contentStyleControls() {
        $this->widget->start_controls_section(
            'content_style_section',
            [
                'label' => __('Content', 'pd-extra-widgets'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Styl tytułu tabów
        $this->widget->add_control(
            'tab_title_color',
            [
                'label' => __('Tab Title Color', 'pd-extra-widgets'),
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
                'label' => __('Tab Title Typography', 'pd-extra-widgets'),
                'selector' => '{{WRAPPER}} .scroll-tabs-widget .tab-item h3',
            ]
        );

        // Styl opisu tabów
        $this->widget->add_control(
            'tab_description_color',
            [
                'label' => __('Tab Description Color', 'pd-extra-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->widget->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tab_description_typography',
                'label' => __('Tab Description Typography', 'pd-extra-widgets'),
                'selector' => '{{WRAPPER}} .scroll-tabs-widget .tab-item p',
            ]
        );

        // Styl obrazka tabów
        $this->widget->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'tab_image_border',
                'label' => __('Tab Image Border', 'pd-extra-widgets'),
                'selector' => '{{WRAPPER}} .scroll-tabs-widget .tab-image, {{WRAPPER}} .scroll-tabs-widget .tab-image-wrapper img',
            ]
        );

        $this->widget->add_responsive_control(
            'tab_image_border_radius',
            [
                'label' => __('Tab Image Border Radius', 'pd-extra-widgets'),
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
                'label' => __('Tab Image Max Width', 'pd-extra-widgets'),
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
                    '{{WRAPPER}} .scroll-tabs-widget.layout-one-column .tab-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .scroll-tabs-widget.layout-two-columns .tab-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
            'tab_item_background',
            [
                'label' => __('Tab Background Color', 'pd-extra-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->widget->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'tab_item_border',
                'label' => __('Tab Border', 'pd-extra-widgets'),
                'selector' => '{{WRAPPER}} .scroll-tabs-widget .tab-item',
            ]
        );

        $this->widget->add_responsive_control(
            'tab_item_border_radius',
            [
                'label' => __('Border Radius', 'pd-extra-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .scroll-tabs-widget .tab-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->widget->end_controls_section();
    }
}
