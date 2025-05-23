<?php
namespace PdExtraWidgets\Widgets\ReadMore;

trait Render {

    protected function render() {
        $settings = $this->get_settings_for_display();
        $widgetId = $this->get_id();
 
        $iconHtml = '';
        if ( ! empty( $settings['button_icon']['value'] ) ) {
            ob_start();
            \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true', 'class' => "button-icon" ] );
            $iconHtml = ob_get_clean();
        }
       
        $iconPositionClass = $settings['icon_position'] === 'before' ? 'icon-before' : 'icon-after';
       
        ?>
        <div class="pd-ew-read-more-widget" id="pd-ew-read-more-widget-<?php echo esc_attr( $widgetId ); ?>">
            <div class="text-container">
                <div class="short-text"><?php echo wp_kses_post( $settings['short_text'] ); ?></div>
                <div class="long-text"><?php echo wp_kses_post( $settings['long_text'] ); ?></div>
            </div>
            <div class="pd-ew-read-more-button-container">
                <button
                    class="pd-ew-read-more-button <?php echo esc_attr( $iconPositionClass ); ?>"
                    data-text-collapsed="<?php echo esc_attr( $settings['button_text'] ); ?>"
                    data-text-expanded="<?php echo esc_attr( $settings['button_text_expanded'] ); ?>"
                    data-target="#pd-ew-read-more-widget-<?php echo esc_attr( $widgetId ); ?> .long-text-wrapper"
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
        <div class="pd-ew-read-more-widget" id="pd-ew-read-more-widget-{{{ view.id }}}">
            <div class="text-container">
                <div class="short-text">{{{ settings.short_text }}}</div>
                <div class="long-text">{{{ settings.long_text }}}</div>
            </div>
            <div class="pd-ew-read-more-button-container">
                <button
                    class="pd-ew-read-more-button {{ iconPositionClass }}"
                    data-text-collapsed="{{ settings.button_text }}"
                    data-text-expanded="{{ settings.button_text_expanded }}"
                    data-target="#pd-ew-read-more-widget-{{{ view.id }}} .long-text-wrapper"
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
