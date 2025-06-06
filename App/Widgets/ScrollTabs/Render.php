<?php
namespace PdExtraWidgets\Widgets\ScrollTabs;

trait Render {

    protected function render() {
        $settings = $this->get_settings_for_display();
        $layout = $settings['layout'] ?? 'row';
        $animation = $settings['image_animation'] ?? 'fade';
        $animation_duration = $settings['image_animation_duration'] ?? '500';
        $description_visibility = $settings['tab_item_description_visibility'] ?? 'normal';


        if (empty($settings['tabs']) || !is_array($settings['tabs'])) {
            return;
        }

        $wrapperClass = 'scroll-tabs-widget layout-' . esc_attr($layout) . ' description-' . esc_attr($description_visibility);

        if ($layout === 'row') {
            $tabsPosition = $settings['tabs_position'] ?? 'right';
            $alignment = $settings['tabs_vertical_alignment'] ?? 'top';

            $wrapperClass .= ' tabs-' . esc_attr($tabsPosition);
            $wrapperClass .= ' align-' . esc_attr($alignment);
        }

        ?>

            <div class="<?php echo esc_attr($wrapperClass); ?>"
                data-animation="<?php echo esc_attr($animation); ?>"
                data-animation-duration="<?php echo esc_attr($animation_duration); ?>">

                <div class="tabs-content">
                    <div class="tabs-column">
                        <?php foreach ($settings['tabs'] as $index => $tab) : ?>
                            <div class="tab-item<?php echo $index === 0 ? ' active' : ''; ?>"
                                 data-image="<?php echo esc_url($tab['tab_image']['url'] ?? ''); ?>">
                                <h3><?php echo esc_html($tab['tab_title'] ?? ''); ?></h3>
                                <p><?php echo esc_html($tab['tab_description'] ?? ''); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                        
                    <div class="image-column">
                        <img class="tab-image" src="<?php echo esc_url($settings['tabs'][0]['tab_image']['url'] ?? ''); ?>" alt="">
                    </div>
                </div>
            </div>

        <?php
    }
}
