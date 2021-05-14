<?php
/**
 * @package DuiloNetsuiteIntegration
 */

namespace Inc\Base;

use \Inc\Controller;

class Settings extends Controller
{
    public function register()
    {
        add_filter( 'plugin_action_links_' . $this->plugin_name, array( $this, 'settings_link' ) );
    }

    public function settings_link( $links )
    {
        $new_link = '<a href="admin.php?page=duilo_netsuite_integration">Settings</a>';
        array_push( $links, $new_link );
        return $links;
    }
}
