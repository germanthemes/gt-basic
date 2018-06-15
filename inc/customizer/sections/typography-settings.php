<?php
/**
 * Typography Settings
 *
 * Register Typography Settings
 *
 * @package GT Basic
 */

/**
 * Adds all Typography settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_basic_customize_register_typography_settings( $wp_customize ) {

	// Add Section for Theme Fonts.
	$wp_customize->add_section( 'gt_basic_section_typography', array(
		'title'    => esc_html__( 'Typography', 'gt-basic' ),
		'priority' => 40,
		'panel'    => 'gt_basic_options_panel',
	) );

	// Get Default Fonts from settings.
	$default = gt_basic_default_options();

	// Add Text Font setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[text_font]', array(
		'default'           => $default['text_font'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new GT_Basic_Customize_Font_Control(
		$wp_customize, 'text_font', array(
			'label'    => esc_html__( 'Body Font', 'gt-basic' ),
			'section'  => 'gt_basic_section_typography',
			'settings' => 'gt_basic_theme_options[text_font]',
			'priority' => 10,
		)
	) );

	// Add Title Font setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[title_font]', array(
		'default'           => $default['title_font'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new GT_Basic_Customize_Font_Control(
		$wp_customize, 'title_font', array(
			'label'    => esc_html_x( 'Headings', 'Font Setting', 'gt-basic' ),
			'section'  => 'gt_basic_section_typography',
			'settings' => 'gt_basic_theme_options[title_font]',
			'priority' => 20,
		)
	) );

	// Add Navigation Font setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[navi_font]', array(
		'default'           => $default['navi_font'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new GT_Basic_Customize_Font_Control(
		$wp_customize, 'navi_font', array(
			'label'    => esc_html_x( 'Navigation', 'Font Setting', 'gt-basic' ),
			'section'  => 'gt_basic_section_typography',
			'settings' => 'gt_basic_theme_options[navi_font]',
			'priority' => 30,
		)
	) );
}
add_action( 'customize_register', 'gt_basic_customize_register_typography_settings' );
