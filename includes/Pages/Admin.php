<?php
/**
 * @package DuiloNetsuiteIntegration
 */

namespace Inc\Pages;

use \Inc\Controller;
use \Inc\Api\Settings;
use \Inc\Api\Templates\AdminTemplate;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends Controller
{
    public $settings;

    public $pages = array();

    public $subpages = array();

    public $templates;

    public $callbacks;

    public function register()
    {
        $this->settings = new Settings();

        $this->templates = new AdminTemplate();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubpages();

        $this->setSettings();

		$this->setSections();

		$this->setFields();

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

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'duilo_netsuite_options_group',
                'option_name' => 'duilo_netsuite_text_example',
                'callback' => array( $this->callbacks, 'optionsGroup' )
            ),
            array(
                'option_group' => 'duilo_netsuite_options_group',
                'option_name' => 'duilo_netsuite_first_name'
            )
        );

        $this->settings->setSettings( $args );
    }

    public function setSections()
	{
		$args = array(
			array(
				'id' => 'duilo_netsuite_admin_index',
				'title' => 'Settings',
				'callback' => array( $this->callbacks, 'adminSection' ),
				'page' => 'duilo_netsuite_plugin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text Example',
				'callback' => array( $this->callbacks, 'textExample' ),
				'page' => 'duilo_netsuite_plugin',
				'section' => 'duilo_netsuite_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
            ),
            array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array( $this->callbacks, 'firstName' ),
				'page' => 'duilo_netsuite_plugin',
				'section' => 'duilo_netsuite_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => 'example-class'
				)
			)
		);

		$this->settings->setFields( $args );
	}
}
