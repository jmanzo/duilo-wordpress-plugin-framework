<?php
/**
 * @package DuiloFramework
 * 
 * This Class is used to handle and set all menu, submenu and pages
 */

namespace Inc\Src;

use \Inc\Controller;
use \Inc\Api\Settings;
use \Inc\Api\AdminCallbacks;
use \Inc\Api\Templates\AdminTemplate;

class PagesController extends Controller
{
    public $settings;

    public $pages = array();

    public $subpages = array();

    public $templates;

    public $admin;

    public function register()
    {
        $this->settings = new Settings();
        $this->templates = new AdminTemplate();
        $this->admin = new AdminCallbacks();
        $this->setPages();
        $this->setSubpages();
        $this->settings
            ->addPages( $this->pages )
            ->withSubPage( 'Integration' )
            ->addSubPages( $this->subpages )
            ->register();
    }

    /**
     * Store all the classes inside an array of pages
     * @return avoid Set the full list of pages and settings inside the object
     */
    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Duilo Framework', 
                'menu_title' => 'Duilo NS', 
                'capability' => 'manage_options', 
                'menu_slug' => 'duilo_plugin', 
                'callback' => array( $this->templates, 'dashboard' ), 
                'icon_url' => 'dashicons-store', 
                'position' => 110
            )
        );
    }

    /**
     * Store all the classes inside an array of subpages
     * @return avoid Set the full list of subpages inside the object
     */
    public function setSubpages()
    {
        $this->subpages = array(
			array(
				'parent_slug' => 'duilo_plugin', 
				'page_title' => 'Settings', 
				'menu_title' => 'Settings', 
				'capability' => 'manage_options', 
				'menu_slug' => 'duilo_plugin_settings', 
				'callback' =>  array( $this->templates, 'settings' )
			)
		);
    }
}