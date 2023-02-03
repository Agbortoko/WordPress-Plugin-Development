<?php
/**
 * @package Petizan
 */

 namespace Inc\Base;

 use \Inc\Base\BaseController;
 use \Inc\Api\SettingsApi;
 use \Inc\Api\Callbacks\AdminCallbacks;

/**
 * Testimonial Manager Controller
 */
 class TestimonialController extends BaseController
 {
    public $settings;
    public $callbacks;
    public $subpages = array();


    public function register()
    {

        if( !$this->activated('testimonial_manager') ) return; // if not activated stop and don't activate the testimonial_manager  subpage
        

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
            'page_title' =>  'Testimonial Manager',
            'menu_title' =>  'Testimonial Manager',
            'capability' =>  'manage_options',
            'menu_slug'  =>  'petizan_testimonial_manager',
            'callback'   =>  array($this->callbacks, 'adminTestimonial'),
         ),

      );
   }


 }