<?php

namespace Inc\Pages;

/**
 * @package Petizan
 */

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\ManagerCallbacks;


class Admin extends BaseController
{
   public $settings;
   public $callbacks;
   public $callbacks_mngr;
   public $pages = array();
   public $subpages = array();


   public function register()
   {
      
      $this->settings = new SettingsApi();

      $this->callbacks = new AdminCallbacks();
      $this->callbacks_mngr = new ManagerCallbacks();

      $this->setPages();

      $this->setSubPages();

      $this->setSettings();
      $this->setSections();
      $this->setFields();


      $this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
   }


   public function setPages()
   {
      $this->pages = array(

         array(
            'page_title' => 'Petizan',
            'menu_title' => 'Petizan',
            'capability' => 'manage_options',
            'menu_slug'  => 'petizan',
            'callback'   => array($this->callbacks, 'adminDashboard'),
            'icon_url'   => 'dashicons-pets',
            'position'   => 110,
         )

      );
   }

   public function setSubPages()
   {
      $this->subpages = array(

         array(
            'parent_slug' => 'petizan',
            'page_title' =>  'Custom Post Types',
            'menu_title' =>  'CPT',
            'capability' =>  'manage_options',
            'menu_slug'  =>  'petizan_cpt',
            'callback'   =>  array($this->callbacks, 'adminCPT'),
         ),

         array(
            'parent_slug' => 'petizan',
            'page_title' =>  'Custom Taxonomies',
            'menu_title' =>  'Taxonomies',
            'capability' =>  'manage_options',
            'menu_slug'  =>  'petizan_taxonomies',
            'callback'   =>  array($this->callbacks, 'adminTaxonomy'),
         ),


         array(
            'parent_slug' => 'petizan',
            'page_title' =>  'Custom Widgets',
            'menu_title' =>  'Widgets',
            'capability' =>  'manage_options',
            'menu_slug'  =>  'petizan_widgets',
            'callback'   =>  array($this->callbacks, 'adminWidget'),
         )

      );

   }


   public function setSettings()
   {
      $args = array(

         array(
            'option_group' => 'petizan_settings',
            'option_name' => 'cpt_manager',
            'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
         ),

         array(
            'option_group' => 'petizan_settings',
            'option_name' => 'texonomy_manager',
            'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
         ),

         array(
            'option_group' => 'petizan_settings',
            'option_name' => 'media_widget',
            'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
         ),

         array(
            'option_group' => 'petizan_settings',
            'option_name' => 'gallery_manager',
            'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
         ),

         array(
            'option_group' => 'petizan_settings',
            'option_name' => 'testimonial_manager',
            'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
         ),

         array(
            'option_group' => 'petizan_settings',
            'option_name' => 'templates_manager',
            'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
         ),

         array(
            'option_group' => 'petizan_settings',
            'option_name' => 'login_manager',
            'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
         ),

         array(
            'option_group' => 'petizan_settings',
            'option_name' => 'membership_manager',
            'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
         )

      );

      $this->settings->setSettings( $args );
   }


   public function setSections()
   {
      $args = array(

         array(
            'id' => 'petizan_admin_index',
            'title' => 'Settings Manager',
            'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
            'page' => 'petizan' //slug of first page
         )

      );

      $this->settings->setSections( $args );
   }


   public function setFields()
   {
      $args = array(

         array(
            'id' => 'cpt_manager',
            'title' => 'Activate CPT Manager',
            'callback' => array($this->callbacks_mngr, 'checkboxField'),
            'page' => 'petizan', //slug of first page
            'section' => 'petizan_admin_index',
            'args' => array(
               'label_for' => 'cpt_manager',
               'class' => 'example-class'
            )

            ),

         

      );

      $this->settings->setFields( $args );
   }


}
