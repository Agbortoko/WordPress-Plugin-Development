<?php
/**
 * @package Petizan
 */

 namespace Inc\Base;

 use \Inc\Base\BaseController;
 use \Inc\Api\SettingsApi;
 use \Inc\Api\Callbacks\AdminCallbacks;

/**
 * Taxonomy Manager Controller
 */
 class TaxonomyController extends BaseController
 {
    public $settings;
    public $callbacks;
    public $subpages = array();


    public function register()
    {

        if( !$this->activated('taxonomy_manager') ) return;// if not activated stop and don't activate the taxonomy_manager  subpage
        

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
            'page_title' =>  'Taxonomy Manager',
            'menu_title' =>  'Taxonomy Manager',
            'capability' =>  'manage_options',
            'menu_slug'  =>  'petizan_taxonomy',
            'callback'   =>  array($this->callbacks, 'adminTaxonomy'),
         ),

      );
   }


 }