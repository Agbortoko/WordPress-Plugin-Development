<?php
/**
 * @package Petizan
 */

 namespace Inc\Base;

 use \Inc\Base\BaseController;
 use \Inc\Api\SettingsApi;
 use \Inc\Api\Callbacks\AdminCallbacks;

/**
 * Chat Manager Controller
 */
 class ChatController extends BaseController
 {
    public $settings;
    public $callbacks;
    public $subpages = array();


    public function register()
    {

        $option = get_option('petizan');

        $activated = isset($option['chat_manager']) ? $option['chat_manager'] : false;

        if( !$activated ) return; // if not activated stop and don't activate the chat_manager  subpage
        

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
            'page_title' =>  'Chat Manager',
            'menu_title' =>  'Chat Manager',
            'capability' =>  'manage_options',
            'menu_slug'  =>  'petizan_chat_manager',
            'callback'   =>  array($this->callbacks, 'adminChatManager'),
         ),

      );
   }


 }