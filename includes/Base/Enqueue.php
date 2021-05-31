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
        wp_enqueue_style( 'duilo_plugin_style', $this->plugin_url . '/dist/css/index.min.css' );
        wp_enqueue_script( 'duilo_plugin_script', $this->plugin_url . '/dist/js/admin-script.min.js', array( 'jquery' ) );
    }
}
