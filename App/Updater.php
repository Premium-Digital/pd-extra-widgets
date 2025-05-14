<?php

namespace PdExtraWidgets;

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

class Updater
{
    public static function init()
    {
        $pluginFile = PD_EXTRA_WIDGETS_PLUGIN_DIR_PATH . '/pd-extra-widgets.php';

        $repoUrl = 'https://github.com/maxkonar/pd-extra-widgets';

        $updateChecker = PucFactory::buildUpdateChecker(
            $repoUrl,
            $pluginFile,
            'pd-extra-widgets'
        );

        $updateChecker->getVcsApi()->enableReleaseAssets();

    }
}