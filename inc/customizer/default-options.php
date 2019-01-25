<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package GT Basic
 */

/**
* Get a single theme option
*
* @return mixed
*/
function gt_basic_get_option( $option_name = '' ) {

	// Get all Theme Options from Database.
	$theme_options = gt_basic_theme_options();

	// Return single option.
	if ( isset( $theme_options[ $option_name ] ) ) {
		return $theme_options[ $option_name ];
	}

	return false;
}


/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function gt_basic_theme_options() {

	// Merge theme options array from database with default options array.
	$theme_options = wp_parse_args( get_option( 'gt_basic_theme_options', array() ), gt_basic_default_options() );

	// Return theme options.
	return apply_filters( 'gt_basic_theme_options', $theme_options );
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function gt_basic_default_options() {

	$default_options = array(
		'site_title'         => true,
		'site_description'   => true,
		'primary_color'      => '#ee1133',
		'secondary_color'    => '#d5001a',
		'accent_color'       => '#11a2ee',
		'navi_color'         => '#202020',
		'title_color'        => '#202020',
		'footer_color'       => '#202020',
		'text_font'          => 'SystemFontStack',
		'title_font'         => 'SystemFontStack',
		'title_is_bold'      => true,
		'title_is_uppercase' => false,
		'navi_font'          => 'SystemFontStack',
		'navi_is_bold'       => false,
		'navi_is_uppercase'  => false,
		'license_key'        => '',
		'license_status'     => 'inactive',
	);

	return apply_filters( 'gt_basic_default_options', $default_options );
}
