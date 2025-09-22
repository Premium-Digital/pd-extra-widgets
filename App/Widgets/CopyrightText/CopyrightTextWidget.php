<?php
namespace PdExtraWidgets\Widgets\CopyrightText;

use Elementor\Widget_Base;
use PdExtraWidgets\Widgets\CopyrightText\ContentControls\ContentControls;
use PdExtraWidgets\Widgets\CopyrightText\StyleControls\StyleControls;
use PdExtraWidgets\Widgets\CopyrightText\Render;

class CopyrightTextWidget extends Widget_Base {

    use Render;

    public function get_name() {
        return 'copyright_text_widget';
    }

    public function get_title() {
        return __('Copyright Text', 'pd-extra-widgets');
    }

    public function get_icon() {
        return 'eicon-editor-code';
    }

    public function get_categories() {
        return [ 'pd-extra-widgets' ];
    }

    protected function _register_controls() {
        (new ContentControls($this))->register();
        (new StyleControls($this))->register();
    }
}
