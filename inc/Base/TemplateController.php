<?php
/**
 * @package Petizan
 */

 namespace Inc\Base;

 use \Inc\Base\BaseController;
 use \Inc\Api\SettingsApi;
 use \Inc\Api\Callbacks\AdminCallbacks;

/**
 * Templates Manager Controller
 */
 class TemplateController extends BaseController
 {
    public $settings;
    public $callbacks;
    public $subpages = array();


    public function register()
    {

        if( !$this->activated('templates_manager') ) return; // if not activated stop and don't activate the templates_manager  subpage
        

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
            'page_title' =>  'Templates Manager',
            'menu_title' =>  'Templates Manager',
            'capability' =>  'manage_options',
            'menu_slug'  =>  'petizan_templates_manager',
            'callback'   =>  array($this->callbacks, 'adminTemplate'),
         ),

      );
   }


 }