<?php
namespace PdExtraWidgets\Widgets\ScrollTabs;

use Elementor\Widget_Base;

use PdExtraWidgets\Widgets\ScrollTabs\ContentControls\ContentControls;
use PdExtraWidgets\Widgets\ScrollTabs\StyleControls\StyleControls;
use PdExtraWidgets\Widgets\ScrollTabs\Render;


class ScrollTabsWidget extends Widget_Base {

    use Render;

    public function get_name() {
        return 'scroll_tabs_widget';
    }

    public function get_title() {
        return __('Scroll Tabs', 'pd-extra-widgets');
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_categories() {
        return ['pd-extra-widgets'];
    }

    protected function register_controls() {
        (new ContentControls($this))->register();
        (new StyleControls($this))->register();
    }
}