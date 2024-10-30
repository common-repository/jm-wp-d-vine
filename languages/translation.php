<?php
defined( 'ABSPATH' ) or	die( 'No !' );


if ( ! class_exists( '_WP_Editors' ) )
    require( ABSPATH . WPINC . '/class-wp-editor.php' );

	
function _wpdv_tinymce_plugin_translation() {

	$strings = array(
		'url_input'  => esc_js( __('Insert URL of Vine post', 'jm-wpdv' ) ) ,
	);

	$locale = _WP_Editors::$mce_locale;
    $translated = 'tinyMCE.addI18n("' . $locale . '.wpdv_tinymce_plugin", ' . json_encode( $strings ) . ");\n";

    return $translated;
}

$strings = _wpdv_tinymce_plugin_translation();