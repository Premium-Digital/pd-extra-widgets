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
        $this->widget->start_controls_section(
            'menu_section',
            [
                'label' => __('Menu', 'pd-extra-widgets'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->widget->add_control(
            'menu',
            [
                'label' => __('Menu', 'pd-extra-widgets'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->get_list_wp_menus()
            ]
        );

        $this->widget->add_control(
            'toggle_icon',
            [
                'label' => __('Toggler icon', 'pd-extra-widgets'),
                'type' => Controls_Manager::MEDIA,
                'media_types' => ['svg'],                
            ]
        );

        // Background Position
        $this->widget->add_control(
            'toggle_bg_position',
            [
                'label' => __('Position', 'pd-extra-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'center center' => 'Center',
                    'top left' => 'Top Left',
                    'top right' => 'Top Right',
                    'bottom left' => 'Bottom Left',
                    'bottom right' => 'Bottom Right',
                ],
                'default' => 'center center',
                'selectors' => [
                    '{{WRAPPER}} button.submenu-toggle' => 'background-position: {{VALUE}};',
                ],
            ]
        );
        
        // Background Attachment
        $this->widget->add_control(
            'toggle_bg_attachment',
            [
                'label' => __('Attachment', 'pd-extra-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'scroll' => 'Scroll',
                    'fixed' => 'Fixed',
                ],
                'default' => 'scroll',
                'selectors' => [
                    '{{WRAPPER}} button.submenu-toggle' => 'background-attachment: {{VALUE}};',
                ],
            ]
        );
        
        // Background Repeat
        $this->widget->add_control(
            'toggle_bg_repeat',
            [
                'label' => __('Repeat', 'pd-extra-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no-repeat' => 'No Repeat',
                    'repeat' => 'Repeat',
                    'repeat-x' => 'Repeat X',
                    'repeat-y' => 'Repeat Y',
                ],
                'default' => 'no-repeat',
                'selectors' => [
                    '{{WRAPPER}} button.submenu-toggle' => 'background-repeat: {{VALUE}};',
                ],
            ]
        );
        
        // Display Size (cover / contain)
        $this->widget->add_control(
            'toggle_bg_size',
            [
                'label' => __('Display Size', 'pd-extra-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'auto' => 'Auto',
                    'contain' => 'Contain',
                    'cover' => 'Cover',
                ],
                'default' => 'contain',
                'selectors' => [
                    '{{WRAPPER}} button.submenu-toggle' => 'background-size: {{VALUE}};',
                ],
            ]
        );

        // Width
$this->widget->add_control(
    'toggle_width',
    [
        'label' => __('Width', 'pd-extra-widgets'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px', '%', 'em', 'rem'],
        'range' => [
            'px' => [
                'min' => 10,
                'max' => 500,
            ],
            '%' => [
                'min' => 10,
                'max' => 100,
            ],
            'em' => [
                'min' => 1,
                'max' => 20,
            ],
            'rem' => [
                'min' => 1,
                'max' => 20,
            ],
        ],
        'default' => [
            'unit' => 'px',
            'size' => 20,
        ],
        'selectors' => [
            '{{WRAPPER}} button.submenu-toggle' => 'width: {{SIZE}}{{UNIT}};',
        ],
    ]
);

// Height
$this->widget->add_control(
    'toggle_height',
    [
        'label' => __('Height', 'pd-extra-widgets'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px', '%', 'em', 'rem'],
        'range' => [
            'px' => [
                'min' => 10,
                'max' => 500,
            ],
            '%' => [
                'min' => 10,
                'max' => 100,
            ],
            'em' => [
                'min' => 1,
                'max' => 20,
            ],
            'rem' => [
                'min' => 1,
                'max' => 20,
            ],
        ],
        'default' => [
            'unit' => 'px',
            'size' => 20,
        ],
        'selectors' => [
            '{{WRAPPER}} button.submenu-toggle' => 'height: {{SIZE}}{{UNIT}};',
        ],
    ]
);


        $this->widget->end_controls_section();

        $this->widget->start_controls_section(
            'submenu_section',
            [
                'label' => __('Submenu', 'pd-extra-widgets'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->widget->add_control(
            'open_submenu',
            [
                'label' => __('Submenu click target', 'pd-extra-widgets'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Arrow', 'pd-extra-widgets'),
                'label_off' => esc_html__('Link', 'pd-extra-widgets'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->widget->add_control(
            'back_text',
            [
                'label' => __('Back text', 'pd-extra-widgets'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->widget->end_controls_section();
    }
}
