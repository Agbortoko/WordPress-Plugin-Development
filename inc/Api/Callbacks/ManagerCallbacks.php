<?php

/**
 * @package Petizan
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{

    public function checkboxSanitize($input)
    {
        
        $output = array();
        
        foreach($this->managers as $ID => $title)
        {
            $output[$ID] = (($input[$ID] == true) ? true : false);
        }
        
        return $output;
        
    }

    public function adminSectionManager(){
        echo "Manage the Sections and Features of this plugin by activating the checkboxes from the following list.";
    }

    public function checkboxField( $args )
    {
        $name = $args['label_for'];
        $classes = $args['class'];

        $option_name = $args['option_name'];
        $checkbox = get_option( $option_name , true);

        // If options is set and not empty return true
        $checked = isset($checkbox[$name]) ? (!empty($checkbox[$name]) ? true : false) : false;

        echo '<div class="'.$classes.'">   
                <input type="checkbox" id="'.$name.'"  name="'.$option_name. '['. $name .']'.'" value="1" class="" '.($checked ? 'checked' : '') .'>
                <label for="'.$name.'">
                    <div></div>
                </label>
        </div>';
        
    }

}
