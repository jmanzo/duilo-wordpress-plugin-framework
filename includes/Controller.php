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

    protected $managers = array();

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 1 ) );
        $this->plugin_url = plugin_dir_url( dirname( __FILE__, 1 ) );
        $this->plugin_name = plugin_basename( dirname( __FILE__, 2 ) . '/duilo-netsuite-integration.php' );
    
        // Set all option groups, sections and fields
        $this->managers = array(
            array(
                'option_group' => 'duilo_netsuite_options_group',
                'sections' => array(
                    array(
                        'id' => 'duilo_netsuite_admin_index',
                        'title' => 'Settings',
                        'menu_slug' => 'duilo_netsuite_plugin',
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
                                'id' => 'uitoggle_example',
                                'title' => 'uitoggle Example',
                                'callback' => 'uiToggleField',
                                'args' => array(
                                    'class' => 'ui-toggle'
                                )
                            )
                        )
                    )
                )
            )
        );
    }
}
