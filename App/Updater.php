<?php

namespace PdExtraWidgets;

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;
use Dotenv\Dotenv;

class Updater
{
    public static function init()
    {
        if (!file_exists(PD_EXTRA_WIDGETS_PLUGIN_DIR_PATH . '.env')) {
            error_log('[PD Extra Widgets] .env file not found. Please create a .env file with the GITHUB_REPO variable.');
            return;
        }

        if (!class_exists(PucFactory::class)) {
            error_log('[PD Extra Widgets] Plugin Update Checker is not available.');
            return;
        }

        $dotenv = Dotenv::createImmutable(PD_EXTRA_WIDGETS_PLUGIN_DIR_PATH);
        $dotenv->load();

        $repoUrl = $_ENV['GITHUB_REPO'] ?? '';

        if (empty($repoUrl)) {
            error_log('[PD Extra Widgets] GITHUB_REPO is not set in your .env file.');
            return;
        }

        $pluginFile = PD_EXTRA_WIDGETS_PLUGIN_DIR_PATH . '/pd-extra-widgets.php';

        $updateChecker = PucFactory::buildUpdateChecker(
            $repoUrl,
            $pluginFile,
            'pd-extra-widgets'
        );

        $updateChecker->getVcsApi()->enableReleaseAssets();
    }
}