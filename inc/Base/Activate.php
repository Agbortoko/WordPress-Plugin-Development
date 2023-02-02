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

        // If default option does not exist update with a default array
        if( get_option('petizan') ){
            return;
        }


        $default = array();

        update_option( 'petizan', $default );

    }
 }