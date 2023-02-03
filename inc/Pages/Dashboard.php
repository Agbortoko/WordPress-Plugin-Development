<?php


namespace Inc\Pages;
/**
 * @package Petizan
 */

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\ManagerCallbacks;


class Dashboard extends BaseController
{
   public $settings;
   public $callbacks;
   public $callbacks_mngr;
   public $pages = array();


   public function register()
   {

      $this->settings = new SettingsApi();

      $this->callbacks = new AdminCallbacks();
      $this->callbacks_mngr = new ManagerCallbacks();

      $this->setPages();
      $this->setSettings();
      $this->setSections();
      $this->setFields();


      $this->settings->addPages($this->pages)->withSubPage('Dashboard')->register();
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



   public function setSettings()
   {


      $args = array();

      foreach ($this->managers as $managerID => $title) {

         array_push($args,  array(
            'option_group' => 'petizan_settings',
            'option_name' => 'petizan',
            'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
         ));

         
      }


      $this->settings->setSettings($args);
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

      $this->settings->setSections($args);
   }


   public function setFields()
   {

      $args = array();

      foreach ($this->managers as $managerID => $title) {

         array_push($args,  array(
            'id' => $managerID,
            'title' => $title,
            'callback' => array($this->callbacks_mngr, 'checkboxField'),
            'page' => 'petizan', //slug of first page
            'section' => 'petizan_admin_index',
            'args' => array(
               'option_name'=>'petizan',
               'label_for' => $managerID,
               'class' => 'ui-toggle'
            )
         ));
      }

      $this->settings->setFields($args);
   }
}
