<?php
/**
 * @package DuiloFramework
 * 
 * This Class is used to handle and set all the custom post types
 */

namespace Inc\Src;

use \Inc\Controller;

class CustomPostTypeController extends Controller
{
    public $custom_post_types = array();

    public function register()
    {
        $this->storeCustomPostTypes();

        if ( ! empty( $this->custom_post_types ) ) {
            add_action( 'init', array( $this, 'registerCustomPostType') );
        }
    }

    /**
     * Custom post types values. For more information, 
     * please check list of arguments in the link below.
     * @link https://developer.wordpress.org/reference/functions/register_post_type/
     * @param none
     * @return avoid
     */
    public function storeCustomPostTypes()
    {
        $this->custom_post_types = array(
            array( 
                'post_type' => 'Example',
                'args' => array(
                    'label' => 'Example',
                    'public' => true
                )
            )
        );
    }

    /**
     * Register post types inside the Wordpress core.
     * @param none
     * @return avoid
     */
    public function registerCustomPostType()
    {
        foreach ($this->custom_post_types as $post_type) {
            register_post_type( $post_type['post_type'], $post_type['args'] );
        }
    }
}