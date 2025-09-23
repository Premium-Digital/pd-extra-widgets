<?php
namespace PdExtraWidgets\Widgets\SlideMenu;

use Elementor\Widget_Base;
use PdExtraWidgets\Widgets\SlideMenu\ContentControls\ContentControls;
use PdExtraWidgets\Widgets\SlideMenu\StyleControls\StyleControls;
use PdExtraWidgets\Widgets\SlideMenu\Render;

class SlideMenuWidget extends Widget_Base {

    use Render;

    public function get_name() {
        return 'slide_menu_widget';
    }

    public function get_title() {
        return __('Slide menu', 'pd-extra-widgets');
    }

    public function get_icon() {
        return 'eicon-toggle';
    }

    public function get_categories() {
        return [ 'pd-extra-widgets' ];
    }

    protected function _register_controls() {
        (new ContentControls($this))->register();
        (new StyleControls($this))->register();
    }
}
