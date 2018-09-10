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

	// Add theme support for wide and full images.
	add_theme_support( 'align-wide' );

	// Add theme support for block color palette.
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_html_x( 'Primary', 'block color', 'gt-basic' ),
			'slug'  => 'primary',
			'color' => '#006699',
		),
		array(
			'name'  => esc_html_x( 'Secondary', 'block color', 'gt-basic' ),
			'slug'  => 'secondary',
			'color' => '#ee9922',
		),
		array(
			'name'  => esc_html_x( 'Accent', 'block color', 'gt-basic' ),
			'slug'  => 'accent',
			'color' => '#11bb55',
		),
		array(
			'name'  => esc_html_x( 'Complementary', 'block color', 'gt-basic' ),
			'slug'  => 'complementary',
			'color' => '#bb4411',
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

	// Disable theme support for custom colors.
	#add_theme_support( 'disable-custom-colors' );

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
	#wp_enqueue_script( 'gt-basic-block-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-editor' ), '20180529' );
	wp_enqueue_style( 'gt-basic-block-editor', get_theme_file_uri( '/assets/css/editor.css' ), array(), '20180910', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'gt_basic_block_editor_assets' );
