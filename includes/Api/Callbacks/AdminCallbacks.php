<?php
/**
 * @package DuiloNetsuiteIntegration
 */

namespace Inc\Api\Callbacks;

use \Inc\Controller;

class AdminCallbacks extends Controller
{
    public function optionsGroup( $input )
    {
        return $input;
    }

    public function adminSection()
	{
		echo 'Check this beautiful section!';
	}

	public function textExample()
	{
		$value = esc_attr( get_option( 'text_example' ) );

		echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!" />';
	}

    public function firstName()
	{
		$value = esc_attr( get_option( 'first_name' ) );
        
		echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your name!" />';
	}
}