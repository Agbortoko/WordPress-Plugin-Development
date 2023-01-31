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
    

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin = plugin_basename(dirname(__FILE__, 3)) . '/petizan.php';
    }
}
