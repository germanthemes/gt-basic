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
		'site_title'          => true,
		'site_description'    => true,
		'meta_date'           => true,
		'meta_author'         => true,
		'meta_category'       => true,
		'post_image_archives' => true,
		'post_image_single'   => true,
		'link_color_one'      => '#ee1133',
		'link_color_two'      => '#D5001A',
		'navi_color_one'      => '#202020',
		'navi_color_two'      => '#ee1133',
		'title_color_one'     => '#202020',
		'title_color_two'     => '#ee1133',
		'footer_color'        => '#202020',
		'text_font'           => 'Open Sans',
		'title_font'          => 'Montserrat',
		'navi_font'           => 'Open Sans',
		'footer_text'         => sprintf( '&copy; %1$s %2$s', date( 'Y' ), get_bloginfo( 'name' ) ),
	);

	return apply_filters( 'gt_basic_default_options', $default_options );
}
