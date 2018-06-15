<?php
/**
 * Implement theme options in the Customizer
 *
 * @package GT Vision
 */

// Load Sanitize Functions.
require( get_template_directory() . '/inc/customizer/sanitize-functions.php' );

// Load Custom Controls.
require( get_template_directory() . '/inc/customizer/controls/font-control.php' );
require( get_template_directory() . '/inc/customizer/controls/headline-control.php' );

// Load Customizer Sections.
require( get_template_directory() . '/inc/customizer/sections/website-settings.php' );
require( get_template_directory() . '/inc/customizer/sections/post-settings.php' );
require( get_template_directory() . '/inc/customizer/sections/color-settings.php' );
require( get_template_directory() . '/inc/customizer/sections/typography-settings.php' );
require( get_template_directory() . '/inc/customizer/sections/footer-settings.php' );

/**
 * Registers Theme Options panel and sets up some WordPress core settings
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_vision_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel.
	$wp_customize->add_panel( 'gt_vision_options_panel', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'gt-vision' ),
	) );
}
add_action( 'customize_register', 'gt_vision_customize_register_options' );


/**
 * Embed JS file to make Theme Customizer preview reload changes asynchronously.
 */
function gt_vision_customize_preview_js() {
	wp_enqueue_script( 'gt-vision-customize-preview', get_template_directory_uri() . '/assets/js/customize-preview.js', array( 'customize-preview' ), '20180506', true );
}
add_action( 'customize_preview_init', 'gt_vision_customize_preview_js' );


/**
 * Embed JS for Customizer Controls.
 */
function gt_vision_customizer_controls_js() {
	wp_enqueue_script( 'gt-vision-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-controls.js', array(), '20180506', true );
}
add_action( 'customize_controls_enqueue_scripts', 'gt_vision_customizer_controls_js' );


/**
 * Embed CSS styles Customizer Controls.
 */
function gt_vision_customizer_controls_css() {
	wp_enqueue_style( 'gt-vision-customizer-controls', get_template_directory_uri() . '/assets/css/customizer-controls.css', array(), '20180506' );
}
add_action( 'customize_controls_print_styles', 'gt_vision_customizer_controls_css' );
