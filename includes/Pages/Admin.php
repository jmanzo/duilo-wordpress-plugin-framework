<?php
/**
 * @package DuiloNetsuiteIntegration
 */

namespace Inc\Pages;

use \Inc\Controller;
use \Inc\Api\Settings;

class Admin extends Controller
{
    public $settings;

    public $pages = array();

    public function __construct()
    {
        $this->settings = new Settings();

        $this->pages = array(
            array(
                'page_title' => 'Duilo Netsuite Integration', 
                'menu_title' => 'Duilo NS', 
                'capability' => 'manage_options', 
                'menu_slug' => 'duilo_netsuite_integration', 
                'callback' => function() {
                    echo '<h1>Duilo Netsuite Integration</h1>';
                }, 
                'icon_url' => 'dashicons-store', 
                'position' => 110
            )
        );
    }

    public function register()
    {
        $this->settings->addPages( $this->pages )->register();
    }
}
