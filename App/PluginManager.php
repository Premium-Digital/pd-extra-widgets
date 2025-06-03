<?php

namespace PdExtraWidgets;
use PdExtraWidgets\Widgets\ReadMore\ReadMoreWidget;
use PdExtraWidgets\Widgets\ScrollTabs\ScrollTabsWidget;
use PdExtraWidgets\Widgets\SlideMenu\SlideMenuWidget;
use PdExtraWidgets\Updater;

class PluginManager
{

    private $actions;
    
    public function __construct()
    {
        add_action( 'elementor/widgets/register', [$this, 'register_widgets'] );
        $this->actions = new Actions();
        Updater::init();
    }

    public function register_widgets($widgets_manager) {
        $widgets_manager->register(new ReadMoreWidget());
        $widgets_manager->register(new ScrollTabsWidget());
        $widgets_manager->register(new SlideMenuWidget());
    }

    public static function activate()
    {
        \flush_rewrite_rules();
    }

}