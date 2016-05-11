<?php
/**
 * Plugin Name: A WP REST Output controller
 * Plugin URI: https://github.com/MarioFromBelgium/WP-REST-OutputControle
 * Description: This plugin adds  functionality to control the output of WP-REST-API.
 * Version: 1.0.0
 * Author: MarioFromBelgium
 * Author URI: unknown
 * License: private
 */

/**
 * ****
 *
 * add_action( 'plugins_loaded', 'nbp_requireauth' ); //action = run nbp_requireauth when plugin loaded
 *
 * /******
 * admin Page for plugin
 * http://code.tutsplus.com/tutorials/create-a-custom-wordpress-plugin-from-scratch--net-2668
 */


function wproc_main() {
	include ('wproc_main.php');
};



function wproc_register_admin_menu() {
	add_options_page ( "WP REST Outp Ctrl", "WP REST Outp Ctrl", 1, "REST Output Contr", "wproc_main" ); // Menu item under "settings" calling nbp_admin
	//wp_enqueue_style( 'style', plugins_url('css/demo_style.css', __FILE__));
	
};

add_action ( 'admin_menu', 'wproc_register_admin_menu' ); // action= run function  when admin_menu = called



register_deactivation_hook( __FILE__, 'my_plugin_deactivation' );
//returns all db-settings to false upon deactivation
function my_plugin_deactivation() {
	$wproc_settings->ALL = False;
	$wproc_settings->CUSTOM = False;
	$wproc_settings->AUTH = False;	
	update_option ( 'wproc_settings', $wproc_settings );
	
}



register_uninstall_hook( __FILE__, 'my_plugin_uninstall' );
function my_plugin_uninstall() {
	// Deletes the field in the options-table
	delete_option( 'wproc_settings' );
}



?>