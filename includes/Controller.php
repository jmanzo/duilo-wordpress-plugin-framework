<?php
/**
 * @package DuiloFramework
 */

namespace Inc;

class Controller
{
    protected $plugin_path;

    protected $plugin_url;

    protected $plugin_name;

    protected $plugin_slug;

    protected $managers = array();

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 1 ) );
        $this->plugin_url = plugin_dir_url( dirname( __FILE__, 1 ) );
        $this->plugin_name = plugin_basename( dirname( __FILE__, 2 ) . '/duilo-netsuite-integration.php' );
        $this->plugin_slug = 'duilo_netsuite_plugin';

        // Set all option groups, sections and fields
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
