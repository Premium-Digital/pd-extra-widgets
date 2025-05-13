<?php
namespace PdExtraWidgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class ReadMoreWidget extends Widget_Base {

    public function get_name() {
        return 'read_more_widget';
    }

    public function get_title() {
        return 'Czytaj więcej';
    }

    public function get_icon() {
        return 'eicon-toggle';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    // Rejestracja CSS i JS
    public function register_assets() {

        wp_enqueue_style( 
            'read-more-widget-style', 
            PD_EXTRA_WIDGETS_PLUGIN_DIR_URL . '/dist/read-more-widget.css', 
            [], 
            '1.0.0'
        );

        wp_enqueue_script( 
            'read-more-widget-script', 
            PD_EXTRA_WIDGETS_PLUGIN_DIR_URL . 'assets/dist/read-more-widget.js', 
            [], 
            '1.0.0', 
            true
        );
    }

    protected function _register_controls() {
        $this->contentControls();
        $this->buttonControls();
        $this->styleControls();
    }

    private function contentControls(){
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'pd-extra-widgets' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'short_text',
            [
                'label' => __( 'Short Text', 'pd-extra-widgets' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => 'This is the short version of the text...',
            ]
        );

        $this->add_control(
            'long_text',
            [
                'label' => __( 'Extended Text', 'pd-extra-widgets' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => 'And this is the longer portion of the text that will be revealed when the button is clicked.',
            ]
        );

        $this->end_controls_section();
    }

    private function buttonControls(){
        $this->start_controls_section(
            'button_section',
            [
                'label' => __( 'Button', 'pd-extra-widgets' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        
        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text ', 'pd-extra-widgets' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Read more', 'pd-extra-widgets' ),
            ]
        );

        $this->add_control(
            'button_text_expanded',
            [
                'label' => __( 'Expanded Button Text', 'pd-extra-widgets' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Read less', 'pd-extra-widgets' ),
            ]
        );

        $this->add_control(
           'button_icon',
           [
               'label' => __( 'Button Icon', 'pd-extra-widgets' ),
               'type' => \Elementor\Controls_Manager::ICONS,
               'label_block' => true,
           ]
        );

        $this->add_control(
            'icon_position',
            [
                'label' => __( 'Icon Position', 'pd-extra-widgets' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'before' => [
                        'title' => __( 'Before', 'pd-extra-widgets' ),
                        'icon' => 'eicon-arrow-left',
                    ],
                    'after' => [
                        'title' => __( 'After', 'pd-extra-widgets' ),
                        'icon' => 'eicon-arrow-right',
                    ],
                ],
                'default' => 'before',
                'toggle' => false,
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __( 'Icon Size', 'pd-extra-widgets' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .read-more-button .elementor-icon' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                    '{{WRAPPER}} .read-more-button svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                    '{{WRAPPER}} .button-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_gap',
            [
                'label' => __( 'Icon Gap', 'pd-extra-widgets' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .read-more-button.icon-before .button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .read-more-button.icon-after .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'text_animation_duration',
            [
                'label' => __( 'Animation Duration (ms)', 'pd-extra-widgets' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
					'px' => [
						'min' => 100,
						'max' => 2000,
					],
				],
                'default' => [
                    'unit' => 'px',
                    'size' => 500,
                ],
                'selectors' => [
                    '{{WRAPPER}} .long-text' => 'transition-duration: {{SIZE}}ms;',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function styleControls(){

        $this->addContentStyleControls();
        
        $this->start_controls_section(
            'button_style_section',
            [
                'label' => __( 'Button', 'pd-extra-widgets' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->addDefaultButtonStyleControls();
        $this->addButtonNormalStyleControls();
        $this->addButtonHoverStyleControls();

        // === BORDER ===
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .read-more-button',
                'separator' => 'before',
            ]
        );

        // === BORDER RADIUS ===
        $this->add_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'pd-extra-widgets' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .read-more-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // === BOX SHADOW ===
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .read-more-button',
            ]
        );

        // === PADDING ===
        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding', 'pd-extra-widgets' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .read-more-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function addDefaultButtonStyleControls(){
        // === POSITION ===
        $this->add_responsive_control(
            'button_position',
            [
                'label' => __( 'Button Position', 'pd-extra-widgets' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'pd-extra-widgets' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'pd-extra-widgets' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'pd-extra-widgets' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .read-more-button-container' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // === TYPOGRAPHY ===
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .read-more-button',
            ]
        );
    }

    protected function addButtonNormalStyleControls(){
        // Normal state
        $this->start_controls_tabs( 'button_style_tabs',);

        $this->start_controls_tab(
            'button_style_normal',
            [
                'label' => __( 'Normal', 'pd-extra-widgets' ),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __( 'Text Color', 'pd-extra-widgets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .read-more-button' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .read-more-button svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => __( 'Background Color', 'pd-extra-widgets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0073e6',
                'selectors' => [
                    '{{WRAPPER}} .read-more-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
    }

    protected function addButtonHoverStyleControls(){
        // Hover state
        $this->start_controls_tab(
            'button_style_hover',
            [
                'label' => __( 'Hover', 'pd-extra-widgets' ),
            ]
        );

        $this->add_control(
            'button_text_color_hover',
            [
                'label' => __( 'Text Color (hover)', 'pd-extra-widgets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .read-more-button:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .read-more-button:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_color_hover',
            [
                'label' => __( 'Background Color (hover)', 'pd-extra-widgets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#005bb5',
                'selectors' => [
                    '{{WRAPPER}} .read-more-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
    }

    protected function addContentStyleControls() {
        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __( 'Content', 'pd-extra-widgets' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Text Alignment
        $this->add_control(
            'text_align',
            [
                'label' => __( 'Text Alignment', 'pd-extra-widgets' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'pd-extra-widgets' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'pd-extra-widgets' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'pd-extra-widgets' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .short-text' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .long-text' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Short Text Styling
        $this->add_control(
            'short_text_color',
            [
                'label' => __( 'Text Color', 'pd-extra-widgets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .short-text' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .long-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'short_text_typography',
                'selectors' => [
                    '{{WRAPPER}} .short-text',
                    '{{WRAPPER}} .long-text',
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $widgetId = $this->get_id();
 
        // Ikona przycisku
        $iconHtml = '';
        if ( ! empty( $settings['button_icon']['value'] ) ) {
            ob_start();
            \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true', 'class' => "button-icon" ] );
            $iconHtml = ob_get_clean();
        }
       
        // Klasa pozycji ikony (before/after)
        $iconPositionClass = $settings['icon_position'] === 'before' ? 'icon-before' : 'icon-after';
       
        ?>
        <div class="read-more-widget" id="read-more-widget-<?php echo esc_attr( $widgetId ); ?>">
            <div class="text-container">
                <div class="short-text"><?php echo wp_kses_post( $settings['short_text'] ); ?></div>
                <div class="long-text"><?php echo wp_kses_post( $settings['long_text'] ); ?></div>
            </div>
            <div class="read-more-button-container">
                <button
                    class="read-more-button <?php echo esc_attr( $iconPositionClass ); ?>"
                    data-text-collapsed="<?php echo esc_attr( $settings['button_text'] ); ?>"
                    data-text-expanded="<?php echo esc_attr( $settings['button_text_expanded'] ); ?>"
                    data-target="#read-more-widget-<?php echo esc_attr( $widgetId ); ?> .long-text-wrapper"
                >
                    <?php if ( $settings['icon_position'] === 'before' && ! empty( $iconHtml ) ) echo $iconHtml; ?>
                    <span class="button-text"><?php echo esc_html( $settings['button_text'] ); ?></span>
                    <?php if ( $settings['icon_position'] === 'after' && ! empty( $iconHtml ) ) echo $iconHtml; ?>
                </button>
            </div>
        </div>
        <?php
    }

    protected function _content_template() {
    ?>
        <#
        var iconHtml = '';
        if ( settings.button_icon ) {
            iconHtml = elementor.helpers.renderIcon( view, settings.button_icon, { 'aria-hidden': 'true' }, 'i' );
        }

        var iconPositionClass = settings.icon_position === 'before' ? 'icon-before' : 'icon-after';

        #>
        <div class="read-more-widget" id="read-more-widget-{{{ view.id }}}">
            <div class="text-container">
                <div class="short-text">{{{ settings.short_text }}}</div>
                <div class="long-text">{{{ settings.long_text }}}</div>
            </div>
            <div class="read-more-button-container">
                <button
                    class="read-more-button {{ iconPositionClass }}"
                    data-text-collapsed="{{ settings.button_text }}"
                    data-text-expanded="{{ settings.button_text_expanded }}"
                    data-target="#read-more-widget-{{{ view.id }}} .long-text-wrapper"
                >
                    <# if ( settings.icon_position === 'before' && iconHtml ) { #>
                        <span class="button-icon">{{{ iconHtml }}}</span>
                    <# } #>
                    <span class="button-text">{{{ settings.button_text }}}</span>
                    <# if ( settings.icon_position === 'after' && iconHtml ) { #>
                        <span class="button-icon">{{{ iconHtml }}}</span>
                    <# } #>
                </button>
            </div>
        </div>
        <?php
    }


}
