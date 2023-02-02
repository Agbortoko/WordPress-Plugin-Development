<?php
/**
 * @package Petizan
 */

 namespace Inc\Base;

 use \Inc\Base\BaseController;
 use \Inc\Api\SettingsApi;
 use \Inc\Api\Callbacks\AdminCallbacks;

/**
 * Membership Manager Controller
 */
 class MembershipController extends BaseController
 {
    public $settings;
    public $callbacks;
    public $subpages = array();


    public function register()
    {

        $option = get_option('petizan');

        $activated = isset($option['membership_manager']) ? $option['membership_manager'] : false;

        if( !$activated ) return; // if not activated stop and don't activate the membership_manager  subpage
        

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
            'page_title' =>  'Membership Manager',
            'menu_title' =>  'Membership Manager',
            'capability' =>  'manage_options',
            'menu_slug'  =>  'petizan_membership_manager',
            'callback'   =>  array($this->callbacks, 'adminMembership'),
         ),

      );
   }


 }