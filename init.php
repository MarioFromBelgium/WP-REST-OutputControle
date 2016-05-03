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

/*
function wproc_register_admin_style() {
	wp_register_style( 'wproc_admin_style', plugins_url('WP_REST_OutputControle/css/wproc.css', __FILE__));
	wp_enqueue_style ( 'wproc_admin_style' );
}

add_action ( 'admin_init', 'wproc_register_admin_style' );
*/


  
 
/*
 * add_action( 'admin_init', 'wproc_register_admin_style' );
 * function wproc_register_admin_style() {
 * wp_register_style( 'wproc_admin_style', plugins_url('WP_REST_OutputControle/css/wproc.css', __FILE__));
 * }
 */
/*
if (is_page_template ( 'WP_REST_OutputController.php' )) { // activate only in wproc_admin page
	wp_enqueue_style ( 'wproc_admin_style' );
}
*/



/*
 * function plugin_name_scripts() {
	//wp_enqueue_style( 'style', plugins_url('css/demo_style.css', __FILE__));
	wp_enqueue_script( 'script', plugins_url('js/test.js', __FILE__), array('jquery'));
}
add_action('init', 'plugin_name_scripts');
 */
?>