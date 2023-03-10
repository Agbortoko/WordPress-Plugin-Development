<?php

/**
 * @package Petizan
 */

namespace Inc\Api\Callbacks;


class CptCallbacks
{


    public function cptSectionManager(){
        echo "Create as Many Post Types as you want";
    }


    public function cptSanitize( $input )
    {

        $output = get_option('petizan_cpt');

        foreach($output as $key => $value)
        {

            if($input['post_type'] === $key)
            {
                $output[$key] = $input;

            }else{
                
                $output[$input['post_type']] =  $input;

            }

        }

    //    echo "<pre>";
    //    var_dump($output);
    //    echo "</pre>";
    //    die;

        return $output;
    }

    public function textField( $args )
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $input = get_option( $option_name);


        echo '<input type="text" class="regular-text" name="'.$option_name. '['. $name .']'.'" value="" placeholder="'. $args['placeholder'] .'">';
    }

    public function checkboxField( $args )
    {
        $name = $args['label_for'];
        $classes = $args['class'];

        $option_name = $args['option_name'];
        $checkbox = get_option( $option_name);

        // If options is set and not empty return true
        $checked = isset($checkbox[$name]) ? (!empty($checkbox[$name]) ? true : false) : false;

        echo '<div class="'.$classes.'">   
                <input type="checkbox" id="'.$name.'"  name="'.$option_name. '['. $name .']'.'" value="1" class="" >
                <label for="'.$name.'">
                    <div></div>
                </label>
        </div>';
        
    }

}
