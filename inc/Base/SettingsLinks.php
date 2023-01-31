<?php

/**
 * @package Petizan
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingsLinks extends BaseController
{

    public function register()
    {
        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
    }

    public function settings_link($links)
    {
        $setting_link = '<a href="admin.php?page=petizan">Settings</a>';
        $seemore_link = '<a target="_blank" href="https://rabbitmaid.com">See More</a>';
        array_push($links, $setting_link,  $seemore_link);

        return $links;
    }
}
