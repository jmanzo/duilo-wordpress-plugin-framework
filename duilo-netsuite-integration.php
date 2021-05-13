<?php
/**
 * @package DuiloNetsuiteIntegration
 */
/**
 * Plugin Name: Duilo Netsuite Integration
 * Plugin URI: https://jdevm.com/duilo-ns-integration
 * Description: This is a custom plugin built to integrate Netsuite with Woocommerce. It's a custom netsuite integration.
 * Version: 1.0.0
 * Author: Jean Manzo
 * Author URI: https://jdevm.com
 * License: GPLv2 or later
 * Text Domain: duilo_netsuite_integration
 */

defined( 'ABSPATH' ) or die( 'Hey, you can\'t access this file, you silly human!'  );

class DuiloNetsuiteIntegration 
{
    public function enqueue_admin_scripts()
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );
        add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
    }

    public function activate()
    {
        flush_rewrite_rules();
    }

    public function add_admin_pages()
    {
        add_menu_page( 'Duilo Netsuite Integration', 'Duilo NS', 'manage_options', 'duilo_netsuite_integration', 'admin_index', 'dashicons-store', 110 );
    }

    public function admin_index()
    {
        // Render template
    }

    public function deactivate()
    {
        flush_rewrite_rules();
    }

    public function admin_enqueue() 
    {
        wp_enqueue_style( 'duilo_netsuite_integration_style', plugins_url( '/assets/css/admin-style.css', __FILE__ ));
        wp_enqueue_script( 'duilo_netsuite_integration_script', plugins_url( '/assets/js/admin-script.js', __FILE__ ), array( 'jquery' ) );
    }
}

if ( class_exists( 'DuiloNetsuiteIntegration' ) ) {
    $DuiloNetsuiteIntegration = new DuiloNetsuiteIntegration();

    $DuiloNetsuiteIntegration->enqueue_admin_scripts();

    register_activation_hook( __FILE__, array( $DuiloNetsuiteIntegration, 'activate' ) );
    register_deactivation_hook( __FILE__, array( $DuiloNetsuiteIntegration, 'deactivate' ) );
}