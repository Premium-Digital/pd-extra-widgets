<?php
namespace PdExtraWidgets\Widgets\SlideMenu;

use PdExtraWidgets\Walker\PremiumWalker;

trait Render
{

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $widgetId = $this->get_id();

        ?>
        <div class="slide-menu" id="slide-menu-<?php echo esc_attr($widgetId); ?>">
            <?php
            wp_nav_menu([
                'menu' => $settings['menu'],
                'walker' => new PremiumWalker([
                    'bgColor' => $settings['bg_color'],
                    'urlIcon' => $settings['toggle_icon'],
                    'backText' => $settings['back_text'],
                    'target' => $settings['open_submenu']
                ])
            ]); ?>
        </div>
        <?php
    }
}
