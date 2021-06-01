<?php
/**
 * @package DuiloFramework
 */

namespace Inc\Pages;

use \Inc\Controller;
use \Inc\Api\Settings;
use \Inc\Api\Validator;
use \Inc\Api\AdminCallbacks;
use \Inc\Api\Templates\AdminTemplate;

class Admin extends Controller
{
    public $settings;

    public $pages = array();

    public $subpages = array();

    public $templates;

    public $admin;

    public $validator;

    public function register()
    {
        $this->settings = new Settings();

        $this->templates = new AdminTemplate();

        $this->admin = new AdminCallbacks();

        $this->validator = new Validator();

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

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'duilo_netsuite_options_group',
                'option_name' => 'text_example',
                'callback' => array( $this->validator, 'validate' )
            ),
            array(
                'option_group' => 'duilo_netsuite_options_group',
                'option_name' => 'checkbox_example',
                'callback' => array( $this->validator, 'validate' )
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
				'callback' => array( $this->admin, 'adminSection' ),
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
				'callback' => array( $this->admin, 'textField' ),
				'page' => 'duilo_netsuite_plugin',
				'section' => 'duilo_netsuite_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class',
                    'placeholder' => 'Text example'
				)
            ),
            array(
				'id' => 'checkbox_example',
				'title' => 'Checkbox Example',
				'callback' => array( $this->admin, 'uiToggleField' ),
				'page' => 'duilo_netsuite_plugin',
				'section' => 'duilo_netsuite_admin_index',
				'args' => array(
					'label_for' => 'checkbox_example',
					'class' => 'ui-toggle'
				)
			)
		);

		$this->settings->setFields( $args );
	}
}
