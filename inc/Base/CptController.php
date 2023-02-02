<?php
/**
 * @package Petizan
 */

 namespace Inc\Base;

 use \Inc\Base\BaseController;
 use \Inc\Api\SettingsApi;
 use \Inc\Api\Callbacks\AdminCallbacks;

/**
 * Custom Post Type Manager Controller
 */
 class CptController extends BaseController
 {
    public $settings;
    public $callbacks;
    public $subpages = array();


    public function register()
    {

        $option = get_option('petizan');

        $activated = isset($option['cpt_manager']) ? $option['cpt_manager'] : false;

        if( !$activated ) return; // if not activated stop and don't activate the cpt manager subpage
        

        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();


        $this->setSubPages();

        $this->settings->addSubPages($this->subpages)->register();

        add_action('init', array($this, 'activate'));
    
    }

    public function activate()
    {
        register_post_type( 'pets',  
        array(

            'labels' => array(
                'name' => 'Pets',
                'singular_name' => 'Pet'
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-pets'
        ));
    }



    public function setSubPages()
   {
      $this->subpages = array(

         array(
            'parent_slug' => 'petizan',
            'page_title' =>  'Custom Post Types',
            'menu_title' =>  'CPT Manager',
            'capability' =>  'manage_options',
            'menu_slug'  =>  'petizan_cpt',
            'callback'   =>  array($this->callbacks, 'adminCPT'),
         ),

      );
   }


 }