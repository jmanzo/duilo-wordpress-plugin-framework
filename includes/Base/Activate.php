<?php
/**
 * @package DuiloNetsuiteIntegration
 */

namespace Inc\Base;

class Activate
{
    public function activate()
    {
        flush_rewrite_rules();
    }
}
