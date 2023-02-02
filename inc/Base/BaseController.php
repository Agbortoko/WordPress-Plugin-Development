<?php

/**
 * @package Petizan
 */

namespace Inc\Base;

class BaseController
{
    /**
     * The default plugin path available for or child classes
    */
    public $plugin_path;

    /**
     * The plugin url avalaible for all child classes
    */
    public $plugin_url;
    

    /**
     * Your plugins name available for all child classes
    */
    public $plugin;


    /**
     * Property for manager fields ID => title
     *
     * @var array
     */
    public $managers = array( );
    

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin = plugin_basename(dirname(__FILE__, 3)) . '/petizan.php';

        $this->managers = array(
            'cpt_manager' => 'Activate CPT Manager' ,
            'taxonomy_manager' => 'Activate Taxonomy Manager',
            'media_widget' => 'Activate Media Widget',
            'gallery_manager' => 'Activate Gallery Manager',
            'testimoial_manager' => 'Activate Testimonial Manager',
            'templates_manager' => 'Activate Templates Manager',
            'login_manager' => 'Activate Ajax Login/Signup',
            'membership_manager' => 'Activate Membership Manager',
            'chat_manager' => 'Activate Chat Manager'
        );
    }
}
