<?php

/**
 * @package Petizan
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public function enqueue()
    {
        // enqueue all our scripts
        wp_enqueue_style('petizan', $this->plugin_url . '/assets/dist/css/petizan.min.css', array(), '1.0.0', 'all');
        wp_enqueue_script('petizan', $this->plugin_url . '/assets/dist/js/petizan.min.js', array(), '1.0.0', 'all');
    }
}
