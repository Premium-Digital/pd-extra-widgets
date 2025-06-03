<?php

namespace PdExtraWidgets\Walker;

use Walker_Nav_Menu;

class PremiumWalker extends Walker_Nav_Menu
{
    public string $backText;

    public string $urlIcon;

    public string $bgColor;

    public function __construct(array $data = [])
    {
        parent::__construct();
        $this->backText = isset($data['backText']) ? $data['backText'] : __('Back', 'pd-extra-widgets');
        $this->urlIcon = !empty($data['urlIcon']) ? $data['urlIcon']['url'] : '';
        $this->bgColor = isset($data['bgColor']) ? $data['bgColor'] : '';
    }

    public function start_lvl(&$output, $depth = 0, $args = null): void
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"submenu-wrapper\"\n" . 'style="background:' . $this->bgColor . '">';
        $output .= "$indent\t<button class=\"submenu-back button-slide-menu\">" . $this->backText . '</button>';
        $output .= "$indent\t<ul class=\"sub-menu-slide\">\n";
    }

    public function end_lvl(&$output, $depth = 0, $args = null): void
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent\t</ul>\n";
        $output .= "$indent</div>\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0): void
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);

        $output .= '<li class="' . implode(' ', $classes) . '">';
        $output .= '<a href="' . esc_attr($item->url) . '">' . esc_html($item->title) . '</a>';

        if ($has_children) {
            $output .= '<button class="submenu-toggle button-slide-menu" aria-label="Rozwiń submenu" style="background: url(' . $this->urlIcon . ')!important"></button>';
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = null): void
    {
        $output .= "</li>\n";
    }
}
