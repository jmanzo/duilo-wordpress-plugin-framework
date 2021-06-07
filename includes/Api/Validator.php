<?php
/**
 * @package DuiloFramework
 */

namespace Inc\Api;

use \Inc\Controller;

class Validator extends Controller
{
    /**
     * Validate fields sent
	 * @param array Array with fields sent from the menu and submenu process
     * @return array Input fields to store in database
     */
    public function validate( $input )
    {
        if ( ! isset( $input ) ) {
            return;
        }

        $output = array();

        foreach ( $input as $key => $value) {
            if ( $value == '1' ) {
                $output[ sanitize_key( $key ) ] = ( $value ? true : false );
            } else {
                $output[ sanitize_key( $key ) ] = sanitize_text_field( $value );
            }
        }

        return $output;
    }
}
