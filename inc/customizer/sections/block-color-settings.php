<?php
/**
 * Block Color Settings
 *
 * @package GT Basic
 */

/**
 * Adds Block Color settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_basic_customize_register_block_color_settings( $wp_customize ) {

	// Add Section for Theme Colors.
	$wp_customize->add_section( 'gt_basic_section_block_colors', array(
		'title'    => esc_html_x( 'Block Colors', 'Color Settings', 'gt-basic' ),
		'priority' => 20,
		'panel'    => 'gt_basic_options_panel',
	) );

	// Get Default Colors from settings.
	$default = gt_basic_default_options();

	// Add Block Primary Color setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[block_primary_color]', array(
		'default'           => $default['block_primary_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_basic_theme_options[block_primary_color]', array(
			'label'    => esc_html_x( 'Primary', 'block color', 'gt-basic' ),
			'section'  => 'gt_basic_section_block_colors',
			'settings' => 'gt_basic_theme_options[block_primary_color]',
			'priority' => 10,
		)
	) );

	// Add Block Secondary Color setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[block_secondary_color]', array(
		'default'           => $default['block_secondary_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_basic_theme_options[block_secondary_color]', array(
			'label'    => esc_html_x( 'Secondary', 'block color', 'gt-basic' ),
			'section'  => 'gt_basic_section_block_colors',
			'settings' => 'gt_basic_theme_options[block_secondary_color]',
			'priority' => 20,
		)
	) );

	// Add Block Accent Color setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[block_accent_color]', array(
		'default'           => $default['block_accent_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_basic_theme_options[block_accent_color]', array(
			'label'    => esc_html_x( 'Accent', 'block color', 'gt-basic' ),
			'section'  => 'gt_basic_section_block_colors',
			'settings' => 'gt_basic_theme_options[block_accent_color]',
			'priority' => 30,
		)
	) );

	// Add Block Complementary Color setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[block_complementary_color]', array(
		'default'           => $default['block_complementary_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_basic_theme_options[block_complementary_color]', array(
			'label'    => esc_html_x( 'Complementary', 'block color', 'gt-basic' ),
			'section'  => 'gt_basic_section_block_colors',
			'settings' => 'gt_basic_theme_options[block_complementary_color]',
			'priority' => 40,
		)
	) );
}
add_action( 'customize_register', 'gt_basic_customize_register_block_color_settings' );
