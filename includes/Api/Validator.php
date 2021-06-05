<?php
/**
 * @package DuiloFramework
 */

namespace Inc\Api;

use \Inc\Controller;

class Validator extends Controller
{
    public function validate( $input )
    {
        if ( ! isset( $input ) ) {
            return;
        }

        $output = array();

        foreach ( $input as $key => $value) {
            if ( $value == '1' ) {
                $output[ $key ] = ( $value ? true : false );
            } else {
                $output[ $key ] = $value;
            }
        }

        return $output;
    }
}
