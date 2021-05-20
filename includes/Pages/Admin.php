<?php
/**
 * @package DuiloNetsuiteIntegration
 */

namespace Inc\Pages;

use \Inc\Controller;
use \Inc\Api\Settings;
use \Inc\Api\Templates\AdminTemplate;

class Admin extends Controller
{
    public $settings;

    public $pages = array();

    public $subpages = array();

    public $templates;

    public function register()
    {
        $this->settings = new Settings();

        $this->templates = new AdminTemplate();

        $this->setPages();

        $this->setSubpages();

        $this->settings
            ->addPages( $this->pages )
            ->withSubPage( 'Integration' )
            ->addSubPages( $this->subpages )
            ->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Duilo Netsuite Integration', 
                'menu_title' => 'Duilo NS', 
                'capability' => 'manage_options', 
                'menu_slug' => 'duilo_netsuite_integration', 
                'callback' => array( $this->templates, 'dashboard' ), 
                'icon_url' => 'dashicons-store', 
                'position' => 110
            )
        );
    }

    public function setSubpages()
    {
        $this->subpages = array(
			array(
				'parent_slug' => 'duilo_netsuite_integration', 
				'page_title' => 'Settings', 
				'menu_title' => 'Settings', 
				'capability' => 'manage_options', 
				'menu_slug' => 'duilo_netsuite_integration_settings', 
				'callback' =>  array( $this->templates, 'settings' )
			)
		);
    }
}
