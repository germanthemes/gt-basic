<?php
/**
 * Color Settings
 *
 * Register Color Settings
 *
 * @package GT Vision
 */

/**
 * Adds all Color settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_vision_customize_register_color_settings( $wp_customize ) {

	// Add Section for Theme Colors.
	$wp_customize->add_section( 'gt_vision_section_colors', array(
		'title'    => esc_html_x( 'Colors', 'Color Settings', 'gt-vision' ),
		'priority' => 30,
		'panel'    => 'gt_vision_options_panel',
	) );

	// Get Default Colors from settings.
	$default = gt_vision_default_options();

	// Add Link Color setting.
	$wp_customize->add_setting( 'gt_vision_theme_options[link_color_one]', array(
		'default'           => $default['link_color_one'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_vision_theme_options[link_color_one]', array(
			'label'    => esc_html_x( 'Links & Buttons (primary)', 'Color Settings', 'gt-vision' ),
			'section'  => 'gt_vision_section_colors',
			'settings' => 'gt_vision_theme_options[link_color_one]',
			'priority' => 10,
		)
	) );

	// Add Button Color setting.
	$wp_customize->add_setting( 'gt_vision_theme_options[link_color_two]', array(
		'default'           => $default['link_color_two'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_vision_theme_options[link_color_two]', array(
			'label'    => esc_html_x( 'Links & Buttons (secondary)', 'Color Settings', 'gt-vision' ),
			'section'  => 'gt_vision_section_colors',
			'settings' => 'gt_vision_theme_options[link_color_two]',
			'priority' => 20,
		)
	) );

	// Add Navigation Primary Color setting.
	$wp_customize->add_setting( 'gt_vision_theme_options[navi_color_one]', array(
		'default'           => $default['navi_color_one'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_vision_theme_options[navi_color_one]', array(
			'label'    => esc_html_x( 'Navigation (primary)', 'Color Settings', 'gt-vision' ),
			'section'  => 'gt_vision_section_colors',
			'settings' => 'gt_vision_theme_options[navi_color_one]',
			'priority' => 30,
		)
	) );

	// Add Navigation Secondary Color setting.
	$wp_customize->add_setting( 'gt_vision_theme_options[navi_color_two]', array(
		'default'           => $default['navi_color_two'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_vision_theme_options[navi_color_two]', array(
			'label'    => esc_html_x( 'Navigation (secondary)', 'Color Settings', 'gt-vision' ),
			'section'  => 'gt_vision_section_colors',
			'settings' => 'gt_vision_theme_options[navi_color_two]',
			'priority' => 40,
		)
	) );

	// Add Primary Title Color setting.
	$wp_customize->add_setting( 'gt_vision_theme_options[title_color_one]', array(
		'default'           => $default['title_color_one'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_vision_theme_options[title_color_one]', array(
			'label'    => esc_html_x( 'Titles (primary)', 'Color Settings', 'gt-vision' ),
			'section'  => 'gt_vision_section_colors',
			'settings' => 'gt_vision_theme_options[title_color_one]',
			'priority' => 50,
		)
	) );

	// Add Secondary Title Color setting.
	$wp_customize->add_setting( 'gt_vision_theme_options[title_color_two]', array(
		'default'           => $default['title_color_two'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_vision_theme_options[title_color_two]', array(
			'label'    => esc_html_x( 'Titles (secondary)', 'Color Settings', 'gt-vision' ),
			'section'  => 'gt_vision_section_colors',
			'settings' => 'gt_vision_theme_options[title_color_two]',
			'priority' => 60,
		)
	) );

	// Add Footer Color setting.
	$wp_customize->add_setting( 'gt_vision_theme_options[footer_color]', array(
		'default'           => $default['footer_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_vision_theme_options[footer_color]', array(
			'label'    => esc_html_x( 'Footer', 'Color Settings', 'gt-vision' ),
			'section'  => 'gt_vision_section_colors',
			'settings' => 'gt_vision_theme_options[footer_color]',
			'priority' => 70,
		)
	) );
}
add_action( 'customize_register', 'gt_vision_customize_register_color_settings' );
