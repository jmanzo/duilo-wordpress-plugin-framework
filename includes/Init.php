<?php
/**
 * @package DuiloNetsuiteIntegration
 */

namespace Inc;

final class Init
{
    /**
     * Store all the classes inside an array of
     * @return array Full list of classes
     */
    public static function get_services()
    {
        return array(
            Pages\Admin::class,
            Base\Enqueue::class,
        );
    }

    /**
     * Loop throught the classes, initiate them
     * and call the register method if it exists
     * @return 
     */
    public static function register_services()
    {
        foreach ( self::get_services() as $class ) {
            $service = self::instantiate( $class );

            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the classes
     * @param class $class class from the services array_push
     * @return class instance new instance of the class
     */
    private static function instantiate( $class )
    {
        return new $class();
    }
}


// class DuiloNetsuiteIntegration 
// {
//     protected $plugin_name;

//     function __construct()
//     {
//         $this->plugin_name = plugin_basename( __FILE__ );
//     }

//     public function enqueue_admin_scripts()
//     {
//         add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );
//         add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
//         add_filter( "plugin_action_links_$this->plugin_name", array( $this, 'settings_link' ) );
//     }

//     function settings_link( $links )
//     {
//         $new_link = '<a href="admin.php?page=duilo_netsuite_integration">Settings</a>';
//         array_push( $links, $new_link );
//         return $links;
//     }

//     public function activate()
//     {
//         flush_rewrite_rules();
//     }

//     public function add_admin_pages()
//     {
//         add_menu_page( 'Duilo Netsuite Integration', 'Duilo NS', 'manage_options', 'duilo_netsuite_integration', array( $this, 'admin_index' ), 'dashicons-store', 110 );
//     }

//     public function admin_index()
//     {
//         require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
//     }

//     public function deactivate()
//     {
//         flush_rewrite_rules();
//     }

//     public function admin_enqueue() 
//     {
//         wp_enqueue_style( 'duilo_netsuite_integration_style', plugins_url( '/assets/css/admin-style.css', __FILE__ ));
//         wp_enqueue_script( 'duilo_netsuite_integration_script', plugins_url( '/assets/js/admin-script.js', __FILE__ ), array( 'jquery' ) );
//     }
// }

// if ( class_exists( 'DuiloNetsuiteIntegration' ) ) {
//     $DuiloNetsuiteIntegration = new DuiloNetsuiteIntegration();

//     $DuiloNetsuiteIntegration->enqueue_admin_scripts();

//     register_activation_hook( __FILE__, array( $DuiloNetsuiteIntegration, 'activate' ) );
//     register_deactivation_hook( __FILE__, array( $DuiloNetsuiteIntegration, 'deactivate' ) );
// }