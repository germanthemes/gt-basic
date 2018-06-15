<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package GT Basic
 */

/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_basic_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'gt_basic_section_posts', array(
		'title'    => esc_html_x( 'Posts', 'Post Settings', 'gt-basic' ),
		'priority' => 20,
		'panel'    => 'gt_basic_options_panel',
	) );

	// Add Post Details Headline.
	$wp_customize->add_control( new GT_Basic_Customize_Header_Control(
		$wp_customize, 'gt_basic_theme_options[post_details]', array(
			'label'    => esc_html__( 'Post Details', 'gt-basic' ),
			'section'  => 'gt_basic_section_posts',
			'settings' => array(),
			'priority' => 10,
		)
	) );

	// Add Setting and Control for showing post date.
	$wp_customize->add_setting( 'gt_basic_theme_options[meta_date]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gt_basic_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gt_basic_theme_options[meta_date]', array(
		'label'    => esc_html__( 'Display date', 'gt-basic' ),
		'section'  => 'gt_basic_section_posts',
		'settings' => 'gt_basic_theme_options[meta_date]',
		'type'     => 'checkbox',
		'priority' => 20,
	) );

	// Add Setting and Control for showing post author.
	$wp_customize->add_setting( 'gt_basic_theme_options[meta_author]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gt_basic_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gt_basic_theme_options[meta_author]', array(
		'label'    => esc_html__( 'Display author', 'gt-basic' ),
		'section'  => 'gt_basic_section_posts',
		'settings' => 'gt_basic_theme_options[meta_author]',
		'type'     => 'checkbox',
		'priority' => 30,
	) );

	// Add Setting and Control for showing post categories.
	$wp_customize->add_setting( 'gt_basic_theme_options[meta_category]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gt_basic_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gt_basic_theme_options[meta_category]', array(
		'label'    => esc_html__( 'Display categories', 'gt-basic' ),
		'section'  => 'gt_basic_section_posts',
		'settings' => 'gt_basic_theme_options[meta_category]',
		'type'     => 'checkbox',
		'priority' => 40,
	) );

	// Add Featured Images Headline.
	$wp_customize->add_control( new GT_Basic_Customize_Header_Control(
		$wp_customize, 'gt_basic_theme_options[featured_images]', array(
			'label'    => esc_html__( 'Featured Images', 'gt-basic' ),
			'section'  => 'gt_basic_section_posts',
			'settings' => array(),
			'priority' => 50,
		)
	) );

	// Add Setting and Control for featured images on blog and archives.
	$wp_customize->add_setting( 'gt_basic_theme_options[post_image_archives]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gt_basic_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gt_basic_theme_options[post_image_archives]', array(
		'label'    => esc_html__( 'Display images on blog and archives', 'gt-basic' ),
		'section'  => 'gt_basic_section_posts',
		'settings' => 'gt_basic_theme_options[post_image_archives]',
		'type'     => 'checkbox',
		'priority' => 60,
	) );

	$wp_customize->selective_refresh->add_partial( 'gt_basic_theme_options[post_image_archives]', array(
		'selector'         => '.hfeed .site-content > .site-main',
		'render_callback'  => 'gt_basic_customize_partial_blog_posts',
		'fallback_refresh' => false,
	) );

	// Add Setting and Control for featured images on single posts.
	$wp_customize->add_setting( 'gt_basic_theme_options[post_image_single]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gt_basic_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gt_basic_theme_options[post_image_single]', array(
		'label'    => esc_html__( 'Display image on single posts', 'gt-basic' ),
		'section'  => 'gt_basic_section_posts',
		'settings' => 'gt_basic_theme_options[post_image_single]',
		'type'     => 'checkbox',
		'priority' => 70,
	) );

	$wp_customize->selective_refresh->add_partial( 'gt_basic_theme_options[post_image_single]', array(
		'selector'         => '.single-post .site-content > .site-main',
		'render_callback'  => 'gt_basic_customize_partial_single_post',
		'fallback_refresh' => false,
	) );
}
add_action( 'customize_register', 'gt_basic_customize_register_post_settings' );

/**
 * Render blog posts partial
 */
function gt_basic_customize_partial_blog_posts() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/post/content' );
	}
}

/**
 * Render single posts partial
 */
function gt_basic_customize_partial_single_post() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/post/content', 'single' );
	}
}
