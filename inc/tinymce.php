<?php
defined( 'ABSPATH' ) or	die( 'No !' );

//tinymce button
function _wpdv_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', '_wpdv_add_tinymce_plugin' );
		add_filter( 'mce_buttons', '_wpdv_register_mce_button' );
	}
}
add_action('admin_head', '_wpdv_add_mce_button');

// Declare script for new button
function _wpdv_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['_wpdv_mce_button'] = WPDV_JS_URL.'tinymce.js';
	return $plugin_array;
}

// Register new button in the editor
function _wpdv_register_mce_button( $buttons ) {
	array_push( $buttons, '_wpdv_mce_button' );
	return $buttons;
}

// Localize
add_filter( 'mce_external_languages', '_wpdv_add_tinymce_lang', 10, 1 );
function _wpdv_add_tinymce_lang( $arr )
{
    $arr[] = WPDV_DIR. 'languages/translation.php';
    return $arr;
}