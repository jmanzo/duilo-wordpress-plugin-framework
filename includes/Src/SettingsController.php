<?php
/**
 * @package DuiloFramework
 * 
 * This Class is used to handle and set all the settings, sections and fields
 */

namespace Inc\Src;

use \Inc\Controller;
use \Inc\Api\Settings;
use \Inc\Api\Validator;
use \Inc\Api\AdminCallbacks;

class SettingsController extends Controller
{
    protected $managers = array();

    public $settings;

    public $validator;

    public $admin;

    public function register()
    {
        $this->validator = new Validator();
        $this->admin = new AdminCallbacks();
        $this->settings = new Settings();
        $this->setManagers();
        $this->setSettings();
    }

    /**
     * Register all settings, groups, sections and fields
     * @return avoid
     */
    public function setSettings()
    {
        $group_args = array();
        $section_args = array();
        $field_args = array();

        foreach ( $this->managers as $manager ) {
            $group_args[] = array(
                'option_group' => $manager['option_group'],
                'option_name' => $manager['page'],
                'callback' => array( $this->validator, 'validate' )
            );

            foreach ( $manager['sections'] as $section ) {
                $section_args[] = array(
                    'id' => $section['id'],
                    'title' => $section['title'],
                    // 'callback' => array( $this->admin, 'adminSection' ),
                    'page' => $manager['page']
                );

                foreach ( $section['fields'] as $field ) {
                    $field_args[] = array(
                        'id' => $field['id'],
                        'title' => $field['title'],
                        'callback' => array( $this->admin, $field['callback'] ),
                        'page' => $manager['page'],
                        'section' => $section['id'],
                        'args' => array(
                            'label_for' => $field['id'],
                            'class' => isset( $field['args']['class'] ) ? $field['args']['class'] : '',
                            'placeholder' => isset( $field['args']['placeholder'] ) ? $field['args']['placeholder'] : '',
                            'options' => isset( $field['args']['options'] ) ? $field['args']['options'] : array()
                        )
                    );
                }
            }
        }

        $this->settings->setSettings( $group_args )
            ->setSections( $section_args )
            ->setFields( $field_args )
            ->register();
    }

    /**
     * Set all option groups, sections and fields inside an array called managers
     * @return avoid
     */
    public function setManagers()
    {
        $this->managers = array(
            array(
                'option_group' => 'duilo_netsuite_options_group',
                'page' => $this->plugin_slug,
                'sections' => array(
                    array(
                        'id' => 'duilo_netsuite_admin_index',
                        'title' => 'Settings',
                        'fields' => array(
                            array(
                                'id' => 'text_example',
                                'title' => 'Text Example',
                                'callback' => 'textField',
                                'args' => array(
                                    'class' => 'example-class',
                                    'placeholder' => 'Text example'
                                )
                            ),
                            array(
                                'id' => 'textarea_example',
                                'title' => 'Textarea Example',
                                'callback' => 'textareaField',
                                'args' => array(
                                    'class' => 'example-class',
                                    'placeholder' => 'Textarea example'
                                )
                            ),
                            array(
                                'id' => 'uitoggle_example',
                                'title' => 'uitoggle Example',
                                'callback' => 'uiToggleField',
                                'args' => array(
                                    'class' => 'ui-toggle'
                                )
                            ),
                            array(
                                'id' => 'checkbox_example',
                                'title' => 'Checkbox Example',
                                'callback' => 'checkboxField',
                                'args' => array(
                                    'class' => 'checkbox-example'
                                )
                            ),
                            array(
                                'id' => 'radio_example',
                                'title' => 'Radio Example',
                                'callback' => 'radioField',
                                'args' => array(
                                    'class' => 'radio-example',
                                    'options' => array(
                                        '1' => 'Yes',
                                        '0' => 'No'
                                    )
                                )
                            ),
                            array(
                                'id' => 'dropdown_example',
                                'title' => 'Dropdown Example',
                                'callback' => 'dropdownField',
                                'args' => array(
                                    'class' => '',
                                    'options' => array(
                                        'option1' => 'Option 1',
                                        'option2' => 'Option 2',
                                        'option3' => 'Option 3'
                                    )
                                )
                            )
                        )
                    )
                )
            )
        );
    }
}