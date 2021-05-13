<?php
/**
 * @package CemerapartsNetsuiteIntegration
 */
/**
 * Plugin Name: Cemeraparts Netsuite Integration
 * Plugin URI: https://cemeraparts.com
 * Description: This is a custom plugin built for Cemeraparts company. It's a custom netsuite integration.
 * Version: 1.0.0
 * Author: Jean Manzo
 * Author URI: https://jdevm.com
 * License: GPLv2 or later
 * Text Domain: cemeraparts_netsuite_integration
 */

defined( 'ABSPATH' ) or die( 'Hey, you can\'t access this file, you silly human!'  );

class CemerapartsNetsuiteIntegration 
{
    public function __construct()
    {
        //..
    }

    public function enqueue_admin_scripts()
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );
    }

    public function activate()
    {
        flush_rewrite_rules();
    }

    public function deactivate()
    {
        flush_rewrite_rules();
    }

    public function admin_enqueue() 
    {
        wp_enqueue_style( 'cemeraparts_netsuite_integration_style', plugins_url( '/assets/css/admin-style.css', __FILE__ ));
        wp_enqueue_script( 'cemeraparts_netsuite_integration_script', plugins_url( '/assets/js/admin-script.js', __FILE__ ), array( 'jquery' ) );
    }
}

if ( class_exists( 'CemerapartsNetsuiteIntegration' ) ) {
    $CemerapartsNetsuiteIntegration = new CemerapartsNetsuiteIntegration();

    $CemerapartsNetsuiteIntegration->enqueue_admin_scripts();

    register_activation_hook( __FILE__, array( $CemerapartsNetsuiteIntegration, 'activate' ) );
    register_deactivation_hook( __FILE__, array( $CemerapartsNetsuiteIntegration, 'deactivate' ) );
}