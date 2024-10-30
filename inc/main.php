<?php
defined( 'ABSPATH' ) or	die( 'No !' );

// Enqueue style for Dashicons
add_action('wp_enqueue_scripts', '_wpdv_script');
function _wpdv_script() {

 global $post;
  if( !is_null( $post ) && has_shortcode( $post->post_content, 'vine') )
		wp_enqueue_script('vine-embed', '//platform.vine.co/static/scripts/embed.js', false, null, true);

}


// Quicktags
add_action('admin_enqueue_scripts', '_wpdv_qt_script');
function _wpdv_qt_script( $hook_suffix ) {

	if( $hook_suffix == 'post.php' || $hook_suffix == 'post-new.php' )
		wp_enqueue_script('vine-embed-quick-tags', WPDV_JS_URL.'quicktags.js', false, null, true);
	
}


// add shortcode
add_shortcode('vine', '_wpdv_add_vine_sc');
function _wpdv_add_vine_sc( $atts ){

	$a = shortcode_atts(
		array(
			'url'  	=> 'https://vine.co/v/Ma60wJH2ILt',
		),
	$atts,
	'vine_shortcode');
	
	// some sanitize before processing
	$url = esc_url( $a['url'] );
	$url = str_replace('embed', '', $url);// in case the embed suffix is entered
	$url = trailingslashit($url);// trailing slash? no trailing slash? don't worry ^^
	
	
	// markup iFrame :/
	$output  = '<iframe class="vine-embed" src="'.$url.'embed/simple" width="600" height="600" frameborder="0"></iframe>';// keep it square-like
	
	return $output;


}

//widgetize it!
add_action('init','_wpdv_widgetize_shortcode');
function _wpdv_widgetize_shortcode(){

	 add_filter('widget_text', 'do_shortcode'); //shortcode in sidebar
	 add_filter('wp_nav_menu_items', 'do_shortcode'); //shortcode in menu<
	 
}

