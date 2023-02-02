<?php
namespace Inc;

 /**
 * @package Petizan
 */


 final class Init
 {

   /**
    * Store all classes to initailize in an array
    *
    * @return array list of classes
    */ 
   public static function get_services()
   {
        return [
            Pages\Dashboard::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
            Base\CptController::class,
            Base\TaxonomyController::class,
            Base\MediaWidgetController::class,
            Base\GalleryController::class,
            Base\TestimonialController::class,
            Base\TemplateController::class,
            Base\LoginManagerController::class,
            Base\MembershipController::class,
            Base\ChatController::class,
        ];
   }


   /**
    * Loop through the classes, initialize them 
    * and also call the register() method if it exists
    *
    * @return void
    */
   public static function register_services()
   {
        foreach(self::get_services() as $class){
            $service = self::instantiate ($class);

            if ( method_exists($service, 'register') ){

                $service->register();

            }

        }
   }


   /**
    * Initialize a class
    *
    * @param mixed $class  The class to instantiate
    * @return class new Instance of class
    */
   private static function instantiate(mixed $class)
   {
        $service = new $class;

        return $service;
   }

 }


