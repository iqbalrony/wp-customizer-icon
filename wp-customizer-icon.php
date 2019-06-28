<?php
/*
Plugin Name: Wp Customizer Icon
Plugin URI: https://github.com/iqbalrony/wp-customizer-icon
Description: Customizer Icon plugin only for WordPress theme.
Author: IqbalRony
Version: 1.0.0
Text Domain: wp-customizer-icon
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
	die;
}

if (!defined('CUSTOMIZER_PATH')) {
	define('CUSTOMIZER_PATH', plugin_dir_path(__FILE__));
}
if (!function_exists('IR_get_plugin_path')) {
	function IR_get_plugin_path($file) {
		return CUSTOMIZER_PATH . $file;
	}
}
if (!function_exists('IR_plugin_url')) {
	function IR_plugin_url($url) {
		return plugins_url($url, __FILE__);
	}
}


add_action('plugins_loaded', 'IR_customizer_icon');
if (!function_exists('IR_customizer_icon') ) {
	function IR_customizer_icon() {

		/**
		 * Text Domain Register.
		 */
		load_plugin_textdomain('wp-customizer-icon', false, plugin_basename(dirname(__FILE__)) . '/languages/');

		/**
		 * Add require files.
		 */
		require_once(plugin_dir_path(__FILE__).'inc/enqueue_scripts.php');
		require_once(plugin_dir_path(__FILE__).'inc/css_class_of_icon.php');

		add_action('customize_register', 'IR_customizer_icon2');
		function IR_customizer_icon2() {
			/**
			 * Add require files.
			 */
				
			require_once(plugin_dir_path(__FILE__).'inc/customize_icon_control.php');
			

		}

	}
}
