<?php
namespace PdExtraWidgets\Widgets\SlideMenu\ContentControls;

use Elementor\Controls_Manager;

class ContentControls
{

    private $widget;

    public function __construct($widget)
    {
        $this->widget = $widget;
    }

    public function get_list_wp_menus()
    {
        $menus = wp_get_nav_menus();

        $menu_list = [];

        foreach ($menus as $menu) {
            $menu_list[$menu->term_id] = $menu->name;
        }

        return $menu_list;
    }

    public function register()
    {
        $this->widget->start_controls_section('menu_section', [
            'label' => __('Menu', 'pd-extra-widgets'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]);

        $this->widget->add_control('menu', [
            'label' => __('Menu', 'pd-extra-widgets'),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_list_wp_menus()
        ]);

        $this->widget->add_control('bg_color', [
            'label' => __('Submenu background color', 'pd-extra-widgets'),
            'type' => Controls_Manager::COLOR,
            'options' => $this->get_list_wp_menus()
        ]);

        $this->widget->add_control('toggle_icon', [
            'label' => __('Toggler icon', 'pd-extra-widgets'),
            'type' => Controls_Manager::MEDIA,
            'options' => $this->get_list_wp_menus(),
            'media_types' => ['svg']
        ]);

        $this->widget->add_control('back_text', [
            'label' => __('Back text', 'pd-extra-widgets'),
            'type' => Controls_Manager::TEXT,
            'options' => $this->get_list_wp_menus()
        ]);

        $this->widget->end_controls_section();
    }
}
