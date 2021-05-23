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

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 1 ) );
        $this->plugin_url = plugin_dir_url( dirname( __FILE__, 1 ) );
        $this->plugin_name = plugin_basename( dirname( __FILE__, 2 ) . '/duilo-netsuite-integration.php' );
    }
}
