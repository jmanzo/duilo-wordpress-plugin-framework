<?php
/**
 * @package DuiloFramework
 */

namespace Inc\Base;

use \Inc\Controller;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();

        if ( get_option( 'duilo_netsuite_plugin' ) ) {
            return;
        }

        $default = array();

        update_option( 'duilo_netsuite_plugin', $default );
    }
}
