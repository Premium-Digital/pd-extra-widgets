<?php
namespace PdExtraWidgets\Widgets\ScrollTabs;

trait Render {

    protected function render() {
        $settings = $this->get_settings_for_display();
        $layout = $settings['layout'] ?? 'two-columns';
        $imagePosition = $settings['image_position'] ?? 'right';
        $alignment = $settings['tabs_vertical_alignment'] ?? 'top';
            
        if (empty($settings['tabs']) || !is_array($settings['tabs'])) {
            return;
        }
        
        $wrapperClass = 'scroll-tabs-widget layout-' . esc_attr($layout);
        
        if ($layout === 'two-columns') {
            $wrapperClass .= ' image-' . esc_attr($imagePosition);
            $wrapperClass .= ' align-' . esc_attr($alignment);
        }
        ?>
        
        <div class="<?php echo $wrapperClass; ?>">
            <div class="tabs-content">
                <div class="tabs-column">
                    <?php foreach ($settings['tabs'] as $index => $tab) : ?>
                        <div class="tab-item<?php echo $index === 0 ? ' active' : ''; ?>" data-image="<?php echo esc_url($tab['tab_image']['url'] ?? ''); ?>">
                            <h3><?php echo esc_html($tab['tab_title'] ?? ''); ?></h3>
                            <p><?php echo esc_html($tab['tab_description'] ?? ''); ?></p>
                    
                            <?php if ($layout === 'one-column' && !empty($tab['tab_image']['url'])) : ?>
                                <div class="tab-image-wrapper">
                                    <img src="<?php echo esc_url($tab['tab_image']['url']); ?>" alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                            
                <?php if ($layout === 'two-columns') : ?>
                    <div class="image-column">
                        <img class="tab-image" src="<?php echo esc_url($settings['tabs'][0]['tab_image']['url'] ?? ''); ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
        </div>
                
        <?php
    }
}
