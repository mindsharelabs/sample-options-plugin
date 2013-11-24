<?php
/*
Plugin Name: Plugin Name (Options)
Plugin URI: http://options.mindsharelabs.com/
Description: Demo plugin to develop and showcase Options for WordPress
Version: 1.0
Author: Mindshare Studios, Inc.
Author URI: http://mindsharelabs.com/
*/

/**
 * @copyright Copyright (c) 2012. All rights reserved.
 * @author    Mindshare Studios, Inc.
 *
 * @license   Released under the GPL license http://www.opensource.org/licenses/gpl-license.php
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * **********************************************************************
 *
 */

/* CONSTANTS */
if(!defined('PN_MIN_WP_VERSION')) {
	define('PN_MIN_WP_VERSION', '3.1');
}

if(!defined('PN_PLUGIN_NAME')) {
	define('PN_PLUGIN_NAME', 'Plugin Name');
}

if(!defined('PN_PLUGIN_SLUG')) {
	define('PN_PLUGIN_SLUG', 'plugin-name');
}

if(!defined('PN_DIR_PATH')) {
	define('PN_DIR_PATH', plugin_dir_path(__FILE__));
}

if(!defined('PN_TEMPLATE_PATH')) {
	define('PN_TEMPLATE_PATH', plugin_dir_path(__FILE__) . 'templates');
}

if(!defined('PN_DIR_URL')) {
	define('PN_DIR_URL', plugin_dir_url(__FILE__));
}

// check WordPress version
global $wp_version;
if(version_compare($wp_version, PN_MIN_WP_VERSION, "<")) {
	exit(PN_PLUGIN_NAME.' requires WordPress '.PN_MIN_WP_VERSION.' or newer.');
}

// deny direct access
if(!function_exists('add_action')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit();
}

/**
 *  Signboard CONTAINER CLASS
 */
if(!class_exists("PLUGINNAME")) :
	class PLUGINNAME {

		public $options;

		function __construct() {

			if(is_admin()) {

				require_once(PN_DIR_PATH.'lib/options/options.php'); // include options framework
				require_once(PN_DIR_PATH.'views/pluginname-options.php'); // include options file
			}

			$this->options = get_option('PLUGINNAME_options');
			
		}
	}
endif;

/**
 *  GLOBAL FUNCTIONS AND TEMPLATE TAGS
 */
if(class_exists("PLUGINNAME")) {

	$options_plugin = new PLUGINNAME();

}
