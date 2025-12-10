<?php
namespace PdExtraWidgets\Widgets\ScrollTabs;

trait Render {

    protected function render() {
        $settings = $this->get_settings_for_display();

        $allowed_layouts = ['row', 'column'];
        $layout = isset($settings['layout']) && in_array($settings['layout'], $allowed_layouts, true) ? $settings['layout'] : 'row';
        $animation = isset($settings['image_animation']) ? sanitize_text_field($settings['image_animation']) : 'fade';
        $animation_duration = isset($settings['image_animation_duration']) ? intval($settings['image_animation_duration']) : 500;
        $description_visibility = isset($settings['tab_item_description_visibility']) ? sanitize_text_field($settings['tab_item_description_visibility']) : 'normal';

        $raw_tabs = $settings['tabs'] ?? [];
        if (!is_array($raw_tabs) || empty($raw_tabs)) {
            return;
        }

        // Keep only array entries and reindex
        $tabs = array_values(array_filter($raw_tabs, 'is_array'));
        if (empty($tabs)) {
            return;
        }

        $classes = [
            'scroll-tabs-widget',
            'layout-' . esc_attr($layout),
            'description-' . esc_attr($description_visibility),
        ];

        if ($layout === 'row') {
            $tabsPosition = isset($settings['tabs_position']) && in_array($settings['tabs_position'], ['left', 'right'], true) ? $settings['tabs_position'] : 'right';
            $alignment = isset($settings['tabs_vertical_alignment']) ? sanitize_text_field($settings['tabs_vertical_alignment']) : 'start';

            $classes[] = 'tabs-' . esc_attr($tabsPosition);
            $classes[] = 'align-' . esc_attr($alignment);
        }

        // Icon position (top/left/right)
        $iconPosition = isset($settings['tab_icon_position']) ? sanitize_text_field($settings['tab_icon_position']) : 'top';
        if (!in_array($iconPosition, ['top', 'left', 'right'], true)) {
            $iconPosition = 'top';
        }
        $classes[] = 'icon-' . esc_attr($iconPosition);

        $wrapperClass = implode(' ', $classes);

        // Find first available image for the image column
        $firstImageUrl = '';
        $firstImageAlt = '';
        foreach ($tabs as $t) {
            $url = $t['tab_image']['url'] ?? '';
            if (!empty($url)) {
                $firstImageUrl = $url;
                $firstImageAlt = $t['tab_image']['alt'] ?? ($t['tab_title'] ?? '');
                break;
            }
        }

        ?>

        <div class="<?php echo esc_attr($wrapperClass); ?>"
             data-animation="<?php echo esc_attr($animation); ?>"
             data-animation-duration="<?php echo esc_attr($animation_duration); ?>">

            <div class="tabs-content">
                <div class="tabs-column">
                    <?php foreach ($tabs as $index => $tab) :
                        $tab_title = $tab['tab_title'] ?? '';
                        $tab_description = $tab['tab_description'] ?? '';
                        $tab_image_url = $tab['tab_image']['url'] ?? '';
                        $tab_icon_url = $tab['tab_icon']['url'] ?? '';
                        $data_image_attr = $tab_image_url ? ' data-image="' . esc_url($tab_image_url) . '"' : '';

                        $hasIcon = !empty($tab_icon_url);
                        $icon_alt = $tab['tab_icon']['alt'] ?? ($tab_title ?? '');
                    ?>
                        <div class="tab-item<?php echo $index === 0 ? ' active' : ''; ?><?php echo $hasIcon ? ' has-icon' : ''; ?>"<?php echo $data_image_attr; ?>>
                            <?php if ($iconPosition === 'left' || $iconPosition === 'right') : ?>
                                <div class="tab-item-inner icon-<?php echo esc_attr($iconPosition); ?>">
                                    <?php if ($hasIcon) : ?>
                                        <div class="tab-icon-wrapper">
                                            <img class="tab-icon" src="<?php echo esc_url($tab_icon_url); ?>" alt="<?php echo esc_attr($icon_alt); ?>" />
                                        </div>
                                    <?php endif; ?>

                                    <div class="tab-item-content">
                                        <?php if ($tab_title !== '') : ?>
                                            <h3><?php echo esc_html($tab_title); ?></h3>
                                        <?php endif; ?>

                                        <?php if ($tab_description !== '') : ?>
                                            <p><?php echo esc_html($tab_description); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <?php if ($hasIcon) : ?>
                                    <div class="tab-icon-wrapper">
                                        <img class="tab-icon" src="<?php echo esc_url($tab_icon_url); ?>" alt="<?php echo esc_attr($icon_alt); ?>" />
                                    </div>
                                <?php endif; ?>

                                <?php if ($tab_title !== '') : ?>
                                    <h3><?php echo esc_html($tab_title); ?></h3>
                                <?php endif; ?>

                                <?php if ($tab_description !== '') : ?>
                                    <p><?php echo esc_html($tab_description); ?></p>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="image-column">
                    <?php if ($firstImageUrl) : ?>
                        <img class="tab-image" src="<?php echo esc_url($firstImageUrl); ?>" alt="<?php echo esc_attr($firstImageAlt); ?>" />
                    <?php else : ?>
                        <img class="tab-image" src="" alt="" aria-hidden="true" />
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php
    }
}
