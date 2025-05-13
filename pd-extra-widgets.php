<?php

/**
 * Plugin Name: PD Extra Widgets
 * Description: Add extra widgets for Premium Digital Organization
 * Version: 1.00
 * Author: kkarasiewicz
 */

namespace PdExtraWidgets;
use PdExtraWidgets\PluginManager;

if (!defined('WPINC')) {
    die;
}

if (!defined('PD_EXTRA_WIDGETS_PLUGIN_DIR_PATH')) {
    define('PD_EXTRA_WIDGETS_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
}

if (!defined('PD_EXTRA_WIDGETS_PLUGIN_DIR_URL')) {
    define('PD_EXTRA_WIDGETS_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
}

require PD_EXTRA_WIDGETS_PLUGIN_DIR_PATH . '/vendor/autoload.php';

class PdExtraWidgets
{
    public function __construct()
    {
      load_plugin_textdomain('pd-extra-widgets', false, dirname(plugin_basename(__FILE__)) . '/languages');
      new PluginManager();
    }
}

new PdExtraWidgets();

register_activation_hook(__FILE__, ['PdExtraWidgets\PluginManager', 'activate']);
