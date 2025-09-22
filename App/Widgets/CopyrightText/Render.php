<?php
namespace PdExtraWidgets\Widgets\CopyrightText;

trait Render
{
    public function render()
    {
        $settings = $this->get_settings_for_display();

        $year = date('Y');
        $textBeforeDate = $settings['text_before_date'];
        $siteName = $settings['site_name'];
        $developedBy = $settings['developed_by'];
        $link = '<a class="premiumdigital-link" href="https://www.premiumdigital.pl/" target="_blank" rel="noopener">Premium Digital</a>';
        ?>

        <div class="copyright-text">
            <span>
                <?php printf(
                    '%s %s %s %s',
                    esc_html($textBeforeDate),
                    esc_html($year),
                    esc_html($siteName) . '.',
                    wp_kses_post($developedBy . ' ' . $link)
                );?>
            </span>
        </div>
        <?php
    }
}