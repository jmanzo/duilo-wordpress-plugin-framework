<?php
/**
 * @package DuiloNetsuiteIntegration
 */

namespace Inc\Base;

class Enqueue
{
    public function register()
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );
    }

    public function admin_enqueue() 
    {
        wp_enqueue_style( 'duilo_netsuite_integration_style', DNSI_PLUGIN_URL . '/assets/css/admin-style.css' );
        wp_enqueue_script( 'duilo_netsuite_integration_script', DNSI_PLUGIN_URL . '/assets/js/admin-script.js', array( 'jquery' ) );
    }
}
