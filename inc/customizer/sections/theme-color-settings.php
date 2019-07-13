<?php
/**
 * Theme Color Settings
 *
 * @package GT Basic
 */

/**
 * Adds all Theme Color settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_basic_customize_register_theme_color_settings( $wp_customize ) {

	// Add Section for Theme Colors.
	$wp_customize->add_section( 'gt_basic_section_theme_colors', array(
		'title'    => esc_html__( 'Theme Colors', 'gt-basic' ),
		'priority' => 20,
		'panel'    => 'gt_basic_options_panel',
	) );

	// Get Default Colors from settings.
	$default = gt_basic_default_options();

	// Add Link Color setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[link_color]', array(
		'default'           => $default['link_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_basic_theme_options[link_color]', array(
			'label'    => esc_html_x( 'Links', 'Color Option', 'gt-basic' ),
			'section'  => 'gt_basic_section_theme_colors',
			'settings' => 'gt_basic_theme_options[link_color]',
			'priority' => 10,
		)
	) );

	// Add Link Color setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[button_color]', array(
		'default'           => $default['button_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_basic_theme_options[button_color]', array(
			'label'    => esc_html_x( 'Buttons', 'Color Option', 'gt-basic' ),
			'section'  => 'gt_basic_section_theme_colors',
			'settings' => 'gt_basic_theme_options[button_color]',
			'priority' => 20,
		)
	) );

	// Add Button Hover Color setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[button_hover_color]', array(
		'default'           => $default['button_hover_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_basic_theme_options[button_hover_color]', array(
			'label'    => esc_html_x( 'Button Hover', 'Color Option', 'gt-basic' ),
			'section'  => 'gt_basic_section_theme_colors',
			'settings' => 'gt_basic_theme_options[button_hover_color]',
			'priority' => 30,
		)
	) );

	// Add Navigation Color setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[navi_color]', array(
		'default'           => $default['navi_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_basic_theme_options[navi_color]', array(
			'label'    => esc_html_x( 'Navigation', 'Color Option', 'gt-basic' ),
			'section'  => 'gt_basic_section_theme_colors',
			'settings' => 'gt_basic_theme_options[navi_color]',
			'priority' => 40,
		)
	) );

	// Add Titles Color setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[title_color]', array(
		'default'           => $default['title_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_basic_theme_options[title_color]', array(
			'label'    => esc_html_x( 'Titles', 'Color Option', 'gt-basic' ),
			'section'  => 'gt_basic_section_theme_colors',
			'settings' => 'gt_basic_theme_options[title_color]',
			'priority' => 50,
		)
	) );

	// Add Title Hover Color setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[title_hover_color]', array(
		'default'           => $default['title_hover_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_basic_theme_options[title_hover_color]', array(
			'label'    => esc_html_x( 'Title Hover', 'Color Option', 'gt-basic' ),
			'section'  => 'gt_basic_section_theme_colors',
			'settings' => 'gt_basic_theme_options[title_hover_color]',
			'priority' => 60,
		)
	) );

	// Add Footer Color setting.
	$wp_customize->add_setting( 'gt_basic_theme_options[footer_color]', array(
		'default'           => $default['footer_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_basic_theme_options[footer_color]', array(
			'label'    => esc_html_x( 'Footer', 'Color Option', 'gt-basic' ),
			'section'  => 'gt_basic_section_theme_colors',
			'settings' => 'gt_basic_theme_options[footer_color]',
			'priority' => 70,
		)
	) );
}
add_action( 'customize_register', 'gt_basic_customize_register_theme_color_settings' );
