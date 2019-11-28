<?php
/**
 * License Settings
 *
 * Register License Settings
 *
 * @package GT Basic
 */

/**
 * Adds all License settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_basic_customize_register_license_settings( $wp_customize ) {

	// Add Section for License.
	$wp_customize->add_section( 'gt_basic_section_license', array(
		'title'       => esc_html__( 'License', 'gt-basic' ),
		'description' => esc_html__( 'Please enter your license key. An active license key is necessary for automatic theme updates and support.', 'gt-basic' ),
		'priority'    => 40,
		'panel'       => 'gt_basic_options_panel',
	) );

	// Add Theme Links control.
	$wp_customize->add_control( new GT_Basic_Customize_Links_Control(
		$wp_customize, 'gt_basic_theme_links', array(
			'section'  => 'gt_basic_section_license',
			'settings' => array(),
			'priority' => 10,
		)
	) );

	// Add License Key setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[license_key]', array(
		'default'           => '',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new GT_Basic_Customize_License_Control(
		$wp_customize, 'license_key', array(
			'label'    => esc_html__( 'License Key', 'gt-basic' ),
			'section'  => 'gt_basic_section_license',
			'settings' => 'gt_basic_theme_options[license_key]',
			'priority' => 20,
		)
	) );
}
add_action( 'customize_register', 'gt_basic_customize_register_license_settings' );
