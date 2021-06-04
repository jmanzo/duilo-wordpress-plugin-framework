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

        foreach ( $this->managers as $manager) {
            foreach ( $manager['sections'] as $section ) {
                foreach ( $section['fields'] as $field ) {
                    if ( isset( $input[ $field['id'] ] ) ) {
                        if ( $input[ $field['id'] ] == '1' ) {
                            $output[ $field['id'] ] = ( isset( $input[ $field['id'] ] ) ? true : false );
                        } else {
                            $output[ $field['id'] ] = $input[ $field['id'] ];
                        }
                    }
                }
            }
        }

        return $output;
    }
}
