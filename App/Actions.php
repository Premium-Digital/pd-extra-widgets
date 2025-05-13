<?php

namespace PdExtraWidgets;

class Actions
{
    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'registerStylesAndScripts' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'registerAdminStylesAndScripts' ));
    }

    public function registerStylesAndScripts()
    {
        //styles
        wp_enqueue_style( 'pd-extra-widgets-styles', PD_EXTRA_WIDGETS_PLUGIN_DIR_URL . 'dist/front.css' );

        //scripts
        wp_enqueue_script( 'pd-extra-widgets-scripts', PD_EXTRA_WIDGETS_PLUGIN_DIR_URL . 'dist/front.js', array(), null, true );
    }

    public function registerAdminStylesAndScripts()
    {
        //styles
        wp_enqueue_style( 'pd-extra-widgets-admin-styles', PD_EXTRA_WIDGETS_PLUGIN_DIR_URL . 'dist/admin.css' );

        //scripts
        wp_enqueue_script('jquery');
        wp_enqueue_media();
        wp_enqueue_script( 'pd-extra-widgets-admin-scripts', PD_EXTRA_WIDGETS_PLUGIN_DIR_URL . 'dist/admin.js', array('jquery'), null, true );
    }
}