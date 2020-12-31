<?php
/*
Plugin Name: Freelancer Custom Header Menu
Plugin URI: http://EngineThemes.com/
Description: Allow admin can easy custom the header menu.
Version: 1.0
Author: EngineThemes
Author URI: http://EngineThemes.com/
License: A "Slug" license name e.g. GPL2
Text Domain: enginethemes
*/
define( 'FRE_CUSTOM_MENU_URL', plugin_dir_url( __FILE__ ) );
define( 'FRE_CUSTOM_MENU_PATH', plugin_dir_path( __FILE__ ) );
define( 'FRE_CUSTOM_MENU_VERSION', '1.1' );

Class Fre_Custom_Menu{
	function __construct(){
		require_once FRE_CUSTOM_MENU_PATH  . '/functions.php';
    	add_action( 'after_setup_theme', array($this,'fre_register_nav_menu')  );
        add_action( 'wp_enqueue_scripts', array($this, 'mje_request_scripts') );
	}
	function fre_register_nav_menu(){
        register_nav_menus( array(
            'visitor_menu' => __( 'Visitor Header Menu(Fre Custom Menu)', 'enginethemes' ),
            'freelancer_menu'  => __( 'Freelancer Header Menu(Fre Custom Menu)', 'enginethemes' ),
            'employer_menu' => __( 'Employer Header Menu(Fre Custom Menu)', 'enginethemes' ),
        ) );
    }
    function mje_request_scripts(){
        wp_enqueue_style( 'mje-request-css', FRE_CUSTOM_MENU_URL.'/fre_custom_menu.css',  FRE_CUSTOM_MENU_VERSION );
    }
}

new Fre_Custom_Menu();