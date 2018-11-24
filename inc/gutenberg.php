<?php
/**
 * Add theme support for the Gutenberg Editor
 *
 * @package GT Basic
 */


/**
 * Registers support for various Gutenberg features.
 *
 * @return void
 */
function gt_basic_gutenberg_support() {

	// Get theme options from database.
	$theme_options = gt_basic_theme_options();

	// Add theme support for wide and full images.
	add_theme_support( 'align-wide' );

	// Add theme support for block color palette.
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_html_x( 'Primary', 'block color', 'gt-basic' ),
			'slug'  => 'primary',
			'color' => esc_html( $theme_options['primary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Secondary', 'block color', 'gt-basic' ),
			'slug'  => 'secondary',
			'color' => esc_html( $theme_options['secondary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'White', 'block color', 'gt-basic' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_html_x( 'Light Gray', 'block color', 'gt-basic' ),
			'slug'  => 'light-gray',
			'color' => '#e5e5e5',
		),
		array(
			'name'  => esc_html_x( 'Dark Gray', 'block color', 'gt-basic' ),
			'slug'  => 'dark-gray',
			'color' => '#555555',
		),
		array(
			'name'  => esc_html_x( 'Black', 'block color', 'gt-basic' ),
			'slug'  => 'black',
			'color' => '#242424',
		),
	) );

	// Add theme support for font sizes.
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name'      => esc_html_x( 'Small', 'block font size', 'gt-basic' ),
			'shortName' => esc_html_x( 'S', 'block font size', 'gt-basic' ),
			'size'      => 16,
			'slug'      => 'small',
		),
		array(
			'name'      => esc_html_x( 'Medium', 'block font size', 'gt-basic' ),
			'shortName' => esc_html_x( 'M', 'block font size', 'gt-basic' ),
			'size'      => 20,
			'slug'      => 'medium',
		),
		array(
			'name'      => esc_html_x( 'Large', 'block font size', 'gt-basic' ),
			'shortName' => esc_html_x( 'L', 'block font size', 'gt-basic' ),
			'size'      => 24,
			'slug'      => 'large',
		),
		array(
			'name'      => esc_html_x( 'Extra Large', 'block font size', 'gt-basic' ),
			'shortName' => esc_html_x( 'XL', 'block font size', 'gt-basic' ),
			'size'      => 36,
			'slug'      => 'extra-large',
		),
	) );
}
add_action( 'after_setup_theme', 'gt_basic_gutenberg_support' );


/**
 * Enqueue block styles and scripts for Gutenberg Editor.
 */
function gt_basic_block_editor_assets() {

	// Enqueue Editor Styling.
	wp_enqueue_style( 'gt-basic-editor-styles', get_theme_file_uri( '/assets/css/editor-styles.css' ), array(), '20181122', 'all' );

	// Enqueue Theme Settings Sidebar plugin.
	wp_enqueue_script( 'gt-basic-editor-theme-settings', get_theme_file_uri( '/assets/js/editor-theme-settings.js' ), array( 'wp-blocks', 'wp-element', 'wp-edit-post' ), '20181121' );

	$theme_settings_l10n = array(
		'plugin_title'   => esc_html__( 'Theme Settings', 'gt-basic' ),
		'page_options'   => esc_html__( 'Page Options', 'gt-basic' ),
		'page_layout'    => esc_html__( 'Page Layout', 'gt-basic' ),
		'default_layout' => esc_html__( 'Default', 'gt-basic' ),
		'full_layout'    => esc_html__( 'Full-width', 'gt-basic' ),
		'hide_title'     => esc_html__( 'Hide Title', 'gt-basic' ),
	);
	wp_localize_script( 'gt-basic-editor-theme-settings', 'gtThemeSettingsL10n', $theme_settings_l10n );
}
add_action( 'enqueue_block_editor_assets', 'gt_basic_block_editor_assets' );


/**
 * Register Post Meta
 */
function gt_basic_register_post_meta() {
	register_post_meta( 'page', 'gt_hide_page_title', array(
		'type'         => 'boolean',
		'single'       => true,
		'show_in_rest' => true,
	) );

	register_post_meta( 'page', 'gt_page_layout', array(
		'type'              => 'string',
		'single'            => true,
		'show_in_rest'      => true,
		'sanitize_callback' => 'sanitize_text_field',
	) );
}
add_action( 'init', 'gt_basic_register_post_meta' );


/**
 * Add body classes in Gutenberg Editor.
 */
function gt_basic_gutenberg_add_admin_body_class( $classes ) {
	global $post;

	// Fullwidth Page Layout?
	if ( get_post_type( $post->ID ) && 'fullwidth' === get_post_meta( $post->ID, 'gt_page_layout', true ) ) {
		$classes .= ' gt-fullwidth-page-layout ';
	}

	// Page Title hidden?
	if ( get_post_type( $post->ID ) && get_post_meta( $post->ID, 'gt_hide_page_title', true ) ) {
		$classes .= ' gt-page-title-hidden ';
	}

	return $classes;
}
add_filter( 'admin_body_class', 'gt_basic_gutenberg_add_admin_body_class' );


/**
 * Remove inline styling in Gutenberg.
 *
 * @return array $editor_settings
 */
function gt_basic_block_editor_settings( $editor_settings ) {
	// Remove editor styling.
	if ( ! current_theme_supports( 'editor-styles' ) ) {
		$editor_settings['styles'] = '';
	}

	return $editor_settings;
}
add_filter( 'block_editor_settings', 'gt_basic_block_editor_settings', 11 );
