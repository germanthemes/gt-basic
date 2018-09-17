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
			'color' => esc_html( $theme_options['block_primary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Secondary', 'block color', 'gt-basic' ),
			'slug'  => 'secondary',
			'color' => esc_html( $theme_options['block_secondary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Accent', 'block color', 'gt-basic' ),
			'slug'  => 'accent',
			'color' => esc_html( $theme_options['block_accent_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Complementary', 'block color', 'gt-basic' ),
			'slug'  => 'complementary',
			'color' => esc_html( $theme_options['block_complementary_color'] ),
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

	// Add Editor Styles.
	add_editor_style( 'assets/css/editor-style.css' );
	add_theme_support( 'editor-styles' );
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

	// Return early if Gutenberg is not installed.
	if ( ! function_exists( 'is_gutenberg_page' ) ) {
		return $classes;
	}

	// Return early if we are not in the Gutenberg Editor.
	if ( ! is_gutenberg_page() ) {
		return $classes;
	}

	// Wide Page Layout?
	if ( get_post_type( $post->ID ) && 'wide' === get_post_meta( $post->ID, 'gt_page_layout', true ) ) {
		$classes .= ' gt-wide-page-layout ';
	}

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
