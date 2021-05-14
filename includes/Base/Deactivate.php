<?php
/**
 * @package DuiloNetsuiteIntegration
 */

namespace Inc\Base;

class Deactivate
{
    public function deactivate()
    {
        flush_rewrite_rules();
    }
}
