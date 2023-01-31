<?php

/**
 * Trigger this file on plugin uninstall
 * 
 * @package Petizan
*/

if(!defined('WP_UNINSTALL_PLUGIN')){ die; }

// Clear database stored data
// $pets = get_posts( array('post_type' => 'pet', 'numberposts' => -1));

// foreach($pets as $pet){
//     wp_delete_post($pet->ID, true);    
// }

// Access the databse via SQL
global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book'");

// Check all post meta that does not relate to any post and delete
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");

// Delete for all post that do not exist 
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");



