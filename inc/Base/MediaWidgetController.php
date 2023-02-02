<?php
/**
 * @package Petizan
 */

 namespace Inc\Base;

 use \Inc\Base\BaseController;
 use \Inc\Api\SettingsApi;
 use \Inc\Api\Callbacks\AdminCallbacks;

/**
 * MediaWidget Manager Controller
 */
 class MediaWidgetController extends BaseController
 {
    public $settings;
    public $callbacks;
    public $subpages = array();


    public function register()
    {

        $option = get_option('petizan');

        $activated = isset($option['media_widget']) ? $option['media_widget'] : false;

        if( !$activated ) return; // if not activated stop and don't activate the media_widget  subpage
        

        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();


        $this->setSubPages();

        $this->settings->addSubPages($this->subpages)->register();
    
    }



    public function setSubPages()
   {
      $this->subpages = array(

         array(
            'parent_slug' => 'petizan',
            'page_title' =>  'Media Widget Manager',
            'menu_title' =>  'Media Widget Manager',
            'capability' =>  'manage_options',
            'menu_slug'  =>  'petizan_media_widget',
            'callback'   =>  array($this->callbacks, 'adminWidget'),
         ),

      );
   }


 }