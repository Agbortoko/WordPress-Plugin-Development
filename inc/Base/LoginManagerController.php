<?php
/**
 * @package Petizan
 */

 namespace Inc\Base;

 use \Inc\Base\BaseController;
 use \Inc\Api\SettingsApi;
 use \Inc\Api\Callbacks\AdminCallbacks;

/**
 * Login Manager Controller
 */
 class LoginManagerController extends BaseController
 {
    public $settings;
    public $callbacks;
    public $subpages = array();


    public function register()
    {


      if( !$this->activated('login_manager') ) return; // if not activated stop and don't activate the login_manager  subpage
        

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
            'page_title' =>  'Ajax Login/Signup Manager',
            'menu_title' =>  'Ajax Login/Signup Manager',
            'capability' =>  'manage_options',
            'menu_slug'  =>  'petizan_login_manager',
            'callback'   =>  array($this->callbacks, 'adminLoginManager'),
         ),

      );
   }


 }