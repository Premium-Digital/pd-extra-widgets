<?php
namespace PdExtraWidgets\Widgets\ReadMore;

use Elementor\Widget_Base;
use PdExtraWidgets\Widgets\ReadMore\ContentControls\ContentControls;
use PdExtraWidgets\Widgets\ReadMore\ContentControls\ButtonControls;
use PdExtraWidgets\Widgets\ReadMore\StyleControls\StyleControls;
use PdExtraWidgets\Widgets\ReadMore\Render;

class ReadMoreWidget extends Widget_Base {

    use Render;

    public function get_name() {
        return 'read_more_widget';
    }

    public function get_title() {
        return __('Read more', 'pd-extra-widgets');
    }

    public function get_icon() {
        return 'eicon-toggle';
    }

    public function get_categories() {
        return [ 'pd-extra-widgets' ];
    }

    protected function _register_controls() {
        (new ContentControls($this))->register();
        (new ButtonControls($this))->register();
        (new StyleControls($this))->register();
    }
}
