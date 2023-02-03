<?php
/**
 * @package Petizan
 */

 namespace Inc\Base;

 class Activate
 {
    public static function activate()
    {
        flush_rewrite_rules();

        $default = array();
        
        // If default option does not exist update with a default array
        if( !get_option('petizan') ){
           
            update_option( 'petizan', $default );
          
        }


        if( !get_option('petizan_cpt') ){
           
            update_option( 'petizan_cpt', $default );
          
        }


    }
 }