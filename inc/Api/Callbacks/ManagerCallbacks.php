<?php

/**
 * @package Petizan
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{

    public function checkboxSanitize( $input )
    {
        // return filter_var($input, FILTER_SANITIZE_NUMBER_INT);

        return (isset($input) ? true : false);
    }

    public function adminSectionManager(){
        echo "Manage the Sections and Features of this plugin by activating the checkboxes from the following list.";
    }

    public function checkboxField( $args )
    {
        var_dump($args);

        return;
    }

}
