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
        $group_args = array();
        $section_args = array();
        $field_args = array();

        foreach ( $this->managers as $manager ) {
            foreach ( $manager['sections'] as $section ) {
                $section_args[] = array(
                    'id' => $section['id'],
                    'title' => $section['title'],
                    // 'callback' => array( $this->admin, 'adminSection' ),
                    'page' => $section['menu_slug']
                );

                foreach ( $section['fields'] as $field ) {
                    $group_args[] = array(
                        'option_group' => $manager['option_group'],
                        'option_name' => $field['id'],
                        'callback' => array( $this->validator, 'validate' )
                    );

                    $field_args[] = array(
                        'id' => $field['id'],
                        'title' => $field['title'],
                        'callback' => array( $this->admin, $field['callback'] ),
                        'page' => $section['menu_slug'],
                        'section' => $section['id'],
                        'args' => array(
                            'label_for' => $field['id'],
                            'class' => isset( $field['args']['class'] ) ? $field['args']['class'] : '',
                            'placeholder' => isset( $field['args']['placeholder'] ) ? $field['args']['placeholder'] : ''
                        )
                    );
                }
            }
        }

        $this->settings->setSettings( $group_args );
        $this->settings->setSections( $section_args );
        $this->settings->setFields( $field_args );
    }
}
