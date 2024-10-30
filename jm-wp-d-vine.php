<?php
/*
Plugin Name: JM WP D-Vine
Plugin URI: http://tweetpress.fr
Description: Let's vine ! Display your latest vine in wordpress
Version: 1.0
Author: Julien Maury
Author URI: http://julien-maury.com
*/

defined('ABSPATH') or die('No direct load!');

define( 'WPDV_VERSION', '1.0' );
define( 'WPDV_DIR', plugin_dir_path( __FILE__ )  );
define( 'WPDV_INC_DIR', trailingslashit( WPDV_DIR . 'inc') );
define( 'WPDV_CSS_URL', trailingslashit( plugin_dir_url( __FILE__ ). '/css' ) );
define( 'WPDV_JS_URL', trailingslashit( plugin_dir_url( __FILE__ ). '/js' ) );
define( 'WPDV_IMG_URL', trailingslashit( plugin_dir_url( __FILE__ ). '/img' ) );
define( 'WPDV_LANG_DIR', dirname( plugin_basename(__FILE__) ) . '/languages/');

//Call modules 
add_action('plugins_loaded','_wpdv_init');
function _wpdv_init() {

	require( WPDV_INC_DIR.'main.php' );  

	if( is_admin() ) require( WPDV_INC_DIR.'tinymce.php' );  
	
}

// Language support
add_action( 'admin_init', '_wpdv_lang_init' );
function _wpdv_lang_init() {

	load_plugin_textdomain( 'jm-wpdv', false, WPDV_LANG_DIR );
	
}
