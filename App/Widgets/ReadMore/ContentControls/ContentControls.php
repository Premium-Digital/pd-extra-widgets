<?php
namespace PdExtraWidgets\Widgets\ReadMore\ContentControls;

use Elementor\Controls_Manager;

class ContentControls {

    private $widget;

    public function __construct($widget) {
        $this->widget = $widget;
    }

    public function register() {
        $this->widget->start_controls_section('content_section', [
            'label' => __('Content', 'pd-extra-widgets'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]);

        $this->widget->add_control('short_text', [
            'label' => __('Short Text', 'pd-extra-widgets'),
            'type' => Controls_Manager::WYSIWYG,
            'default' => 'This is the short version of the text...',
        ]);

        $this->widget->add_control('long_text', [
            'label' => __('Extended Text', 'pd-extra-widgets'),
            'type' => Controls_Manager::WYSIWYG,
            'default' => 'And this is the longer portion of the text...',
        ]);

        $this->widget->end_controls_section();
    }
}
