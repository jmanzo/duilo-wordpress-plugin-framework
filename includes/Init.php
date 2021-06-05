<?php
/**
 * @package DuiloFramework
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
            Src\SettingsController::class,
            Src\PagesController::class,
            Base\Enqueue::class,
            Base\Settings::class,
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