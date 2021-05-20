<?php
/**
 * @package DuiloNetsuiteIntegration
 */

namespace Inc\Api\Templates;

use \Inc\Controller;

class AdminTemplate extends Controller
{
    public function dashboard()
    {
        require_once ( "$this->plugin_path/templates/admin.php" );
    }

    public function settings()
    {
        require_once ( "$this->plugin_path/templates/settings.php" );
    }
}