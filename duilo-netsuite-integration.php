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

if ( ! file_exists( dirname( __FILE__ ) . '/vendor/autoload.php') ) {
    die;
}

require_once dirname( __FILE__ ) . '/vendor/autoload.php';

if ( class_exists( 'Inc\\Init' ) ) {
    define( 'DNSI_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
    define( 'DNSI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

    Inc\Init::register_services();
}