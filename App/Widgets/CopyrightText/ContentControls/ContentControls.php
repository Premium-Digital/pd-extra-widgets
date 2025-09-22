<?php
namespace PdExtraWidgets\Widgets\CopyrightText\ContentControls;

use Elementor\Controls_Manager;

class ContentControls
{
    private $widget;

    public function __construct($widget)
    {
        $this->widget = $widget;
    }

    public function register()
    {
        $this->widget->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'pd-extra-widgets'),
            ]
        );

        $this->widget->add_control(
            'text_before_date',
            [
                'label' => __('Text before date', 'pd-extra-widgets'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Copyright', 'pd-extra-widgets'),
                'placeholder' => __('Enter site name', 'pd-extra-widgets'),
            ]
        );

        // Site name (default: blog name)
        $this->widget->add_control(
            'site_name',
            [
                'label' => __('Site Name', 'pd-extra-widgets'),
                'type' => Controls_Manager::TEXT,
                'default' => get_bloginfo('name'),
                'placeholder' => __('Enter site name', 'pd-extra-widgets'),
            ]
        );

        $this->widget->add_control(
            'text_before_pd_url',
            [
                'label' => __('Text before PD url', 'pd-extra-widgets'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Developed by <a href="https://www.premiumdigital.pl/" target="_blank">Premium Digital</a>', 'pd-extra-widgets'),
                'placeholder' => __('Text before Premium Digital url', 'pd-extra-widgets'),
            ]
        );

        $this->widget->end_controls_section();
    }
}
