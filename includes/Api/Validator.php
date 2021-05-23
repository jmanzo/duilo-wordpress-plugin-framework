<?php
/**
 * @package DuiloFramework
 */

namespace Inc\Api;

class Validator
{
    public function validate( $input )
    {
        if ( ! isset( $input ) ) {
            return;
        }

        if ( $input == '1' ) {
            return ( isset($input) ? true : false );
        } else {
            return $input;
        }
    }
}
