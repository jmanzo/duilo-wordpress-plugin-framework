<?php
/**
 * @package DuiloFramework
 */

namespace Inc\Base;

use \Inc\Controller;

class Enqueue extends Controller
{
    public function register()
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );
    }

    public function admin_enqueue() 
    {
        wp_enqueue_style( 'duilo_plugin_style', $this->plugin_url . '/assets/css/admin-style.css' );
        wp_enqueue_script( 'duilo_plugin_script', $this->plugin_url . '/assets/js/admin-script.js', array( 'jquery' ) );
    }
}
