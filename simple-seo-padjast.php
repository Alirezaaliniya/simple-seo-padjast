<?php
/*
 * Plugin Name:       افزونه سئو اختصاصی پادجست
 * Plugin URI:        https://padjast.ir
 * Description:       Handle the basics with this plugin.
 * Version:           1
 * Requires at least: 6.4
 * Requires PHP:      7.4
 * Author:            Alireza Aliniya
 * Author URI:        https://nias.ir
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://padjast.ir
 * Text Domain:       simple-seo-padjast
 * Domain Path:       /languages
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define('PADJAST_ADMIN',plugin_dir_path(__FILE__).'admin');
require_once(PADJAST_ADMIN . '/admin-simple-seo.php');


define('PADJAST_RENDER',plugin_dir_path( __FILE__).'public');
require_once(PADJAST_RENDER . '/renderoption.php');

//for style and script

define('PADJAST_ADMIN_URL' , plugin_dir_url(__FILE__) . 'admin');
