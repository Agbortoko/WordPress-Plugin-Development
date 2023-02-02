<?php

/**
 * @package Petizan
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{


    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function adminCPT()
    {
        return require_once $this->plugin_path . '/templates/admin-cpt.php';
    }

    public function adminTaxonomy()
    {
        return require_once $this->plugin_path . '/templates/admin-taxonomy.php';
    }

    public function adminWidget()
    {
        return  require_once $this->plugin_path . '/templates/admin-widget.php';
    }

    public function adminGallery()
    {
        return  require_once $this->plugin_path . '/templates/admin-gallery.php';
    }

    public function adminTestimonial()
    {
        return  require_once $this->plugin_path . '/templates/admin-testimonial.php';
    }

    public function adminTemplate()
    {
        return require_once $this->plugin_path . '/templates/admin-template.php';
    }

    public function adminLoginManager()
    {
        return require_once $this->plugin_path . '/templates/admin-login.php';
    }

    public function adminMembership()
    {
        return require_once $this->plugin_path . '/templates/admin-membership.php';
    }

    public function adminChatManager()
    {
        return require_once $this->plugin_path . '/templates/admin-chat.php';
    }

    // public function petizanAdminSection()
    // {
    //     echo 'Check this beautiful section!';
    // }

    // public function petizanTextExample()
    // {
    //     $value = esc_attr(get_option('text_example'));
    //     echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here">';
    // }


    // public function petizanFirstName()
    // {
    //     $value = esc_attr(get_option('first_name'));
    //     echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Type your First Name">';
    // }
}
