<?php

namespace PdExtraWidgets;

use PdExtraWidgets\Widgets\ReadMoreWidget;

class PluginManager
{

    private $actions;
    
    public function __construct()
    {
        add_action( 'elementor/widgets/register', [$this, 'register_widgets'] );
        $this->actions = new Actions();
    }

    public function register_widgets($widgets_manager) {
        $widget = new ReadMoreWidget();
        $widgets_manager->register( $widget );
    }

    public static function activate()
    {
        \flush_rewrite_rules();
    }

}