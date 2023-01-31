<?php
/**
 * @package Petizan
 */

 /*
 * Plugin Name:       Petizan
 * Plugin URI:        https://rabbitmaid.com/wp-plugin/petizan
 * Description:       The best way manage pets and animal shelters on WordPress. Set and reuse pet breeds and other interesting pet taxonomies.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Rabbit Maid
 * Author URI:        https://rabbitmaid.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://rabbitmaid.com/petizan
 * Text Domain:       petizan
 * Domain Path:       /languages
 */

 /*
Petizan is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Petizan is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Petizan. If not, see https://rabbitmaid.com/wp-plugin/petizan.

Copyright 2022-2023 RabbitMaid.
*/

if ( !defined ('ABSPATH') ){ die('Hey, what are you doing here? You silly human!'); }

if( file_exists( dirname ( __FILE__ ) . '/vendor/autoload.php')){
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}



/**
 * Code that runs during plugin activation
 *
 * @return void
 */
function activate_petizan()
{
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_petizan');

/**
 * Code that runs during plugin deactivation
 *
 * @return void
 */
function deactivate_petizan()
{
    Inc\Base\Deactivate::deactivate();
}

register_deactivation_hook(__FILE__, 'deactivate_petizan');


/**
*  Initialize all the core classes of the plugin
*/
if(class_exists( 'Inc\\Init' ))
{   
    Inc\Init::register_services();
}







