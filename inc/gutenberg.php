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
	add_theme_support( 'editor-color-palette', apply_filters( 'gt_basic_editor_color_palette_args', array(
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
			'name'  => esc_html_x( 'Accent', 'block color', 'gt-basic' ),
			'slug'  => 'accent',
			'color' => esc_html( $theme_options['accent_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Highlight', 'block color', 'gt-basic' ),
			'slug'  => 'highlight',
			'color' => esc_html( $theme_options['highlight_color'] ),
		),
		array(
			'name'  => esc_html_x( 'White', 'block color', 'gt-basic' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_html_x( 'Light Gray', 'block color', 'gt-basic' ),
			'slug'  => 'light-gray',
			'color' => esc_html( $theme_options['light_gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Gray', 'block color', 'gt-basic' ),
			'slug'  => 'gray',
			'color' => esc_html( $theme_options['gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Dark Gray', 'block color', 'gt-basic' ),
			'slug'  => 'dark-gray',
			'color' => esc_html( $theme_options['dark_gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Black', 'block color', 'gt-basic' ),
			'slug'  => 'black',
			'color' => '#000000',
		),
	) ) );

	// Add theme support for font sizes.
	add_theme_support( 'editor-font-sizes', apply_filters( 'gt_basic_editor_font_sizes_args', array(
		array(
			'name' => esc_html_x( 'Small', 'block font size', 'gt-basic' ),
			'size' => 16,
			'slug' => 'small',
		),
		array(
			'name' => esc_html_x( 'Medium', 'block font size', 'gt-basic' ),
			'size' => 20,
			'slug' => 'medium',
		),
		array(
			'name' => esc_html_x( 'Large', 'block font size', 'gt-basic' ),
			'size' => 24,
			'slug' => 'large',
		),
		array(
			'name' => esc_html_x( 'Extra Large', 'block font size', 'gt-basic' ),
			'size' => 36,
			'slug' => 'extra-large',
		),
	) ) );

	// Register Small Buttons Block style.
	register_block_style( 'core/buttons', array(
		'name'         => 'gt-small',
		'label'        => esc_html__( 'GT Small', 'gt-basic' ),
		'style_handle' => 'gt-basic-stylesheet',
	) );

	// Register Large Buttons Block style.
	register_block_style( 'core/buttons', array(
		'name'         => 'gt-large',
		'label'        => esc_html__( 'GT Large', 'gt-basic' ),
		'style_handle' => 'gt-basic-stylesheet',
	) );

	// Check if block pattern functions are available.
	if ( function_exists( 'register_block_pattern' ) && function_exists( 'register_block_pattern_category' ) ) {

		// Register block pattern category.
		register_block_pattern_category( 'gt-basic', array( 'label' => esc_html__( 'GT Basic', 'gt-basic' ) ) );

		// Register Block patterns.
		register_block_pattern( 'gt-basic/hero-section', array(
			'title'      => esc_html__( 'Hero Section', 'gt-basic' ),
			'content'    => "<!-- wp:cover {\"dimRatio\":0,\"overlayColor\":\"gray\",\"align\":\"full\"} --><div class=\"wp-block-cover alignfull has-gray-background-color\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns --><div class=\"wp-block-columns\"><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:spacer {\"height\":150} --><div style=\"height:150px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div><!-- /wp:spacer --><!-- wp:group {\"backgroundColor\":\"white\",\"textColor\":\"black\"} --><div class=\"wp-block-group has-black-color has-white-background-color has-text-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"level\":1} --><h1>Hero Heading</h1><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --><!-- wp:buttons {\"className\":\"is-style-gt-large\"} --><div class=\"wp-block-buttons is-style-gt-large\"><!-- wp:button --><div class=\"wp-block-button\"><a class=\"wp-block-button__link\">Button 1</a></div><!-- /wp:button --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\">Button 2</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div></div><!-- /wp:group --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"></div><!-- /wp:column --></div><!-- /wp:columns --></div></div><!-- /wp:cover -->",
			'categories' => array( 'gt-basic' ),
		) );

		register_block_pattern( 'gt-basic/services', array(
			'title'      => esc_html__( 'Services', 'gt-basic' ),
			'content'    => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading --><h2>Services</h2><!-- /wp:heading --><!-- wp:columns --><div class=\"wp-block-columns\"><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image {\"className\":\"is-style-default\"} --><figure class=\"wp-block-image is-style-default\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Service 1</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image {\"className\":\"is-style-default\"} --><figure class=\"wp-block-image is-style-default\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Service 2</h3><!-- /wp:heading --><!-- wp:paragraph  --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image {\"className\":\"is-style-default\"} --><figure class=\"wp-block-image is-style-default\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Service 3</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --></div></div><!-- /wp:group -->",
			'categories' => array( 'gt-basic' ),
		) );

		register_block_pattern( 'gt-basic/call-to-action', array(
			'title'      => esc_html__( 'Call to Action', 'gt-basic' ),
			'content'    => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"primary\",\"textColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-color has-primary-background-color has-text-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"extra-large\"} --><p class=\"has-text-align-center has-extra-large-font-size\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><!-- /wp:paragraph --></div></div><!-- /wp:group --><!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"large\"} --><p class=\"has-text-align-center has-large-font-size\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --><!-- wp:buttons {\"align\":\"center\",\"className\":\"is-style-gt-large\"} --><div class=\"wp-block-buttons aligncenter is-style-gt-large\"><!-- wp:button --><div class=\"wp-block-button\"><a class=\"wp-block-button__link\">Button</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div></div><!-- /wp:group -->",
			'categories' => array( 'gt-basic' ),
		) );

		register_block_pattern( 'gt-basic/portfolio', array(
			'title'      => esc_html__( 'Portfolio', 'gt-basic' ),
			'content'    => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"light-gray\"} --><div class=\"wp-block-group alignfull has-light-gray-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text --><div class=\"wp-block-media-text alignwide is-stacked-on-mobile\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading --><h2>Project 01</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --></div></div><!-- /wp:group --><!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text {\"mediaPosition\":\"right\"} --><div class=\"wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading --><h2>Project 02</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --></div></div><!-- /wp:group --><!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"light-gray\"} --><div class=\"wp-block-group alignfull has-light-gray-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text --><div class=\"wp-block-media-text alignwide is-stacked-on-mobile\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading --><h2>Project 03</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --></div></div><!-- /wp:group -->",
			'categories' => array( 'gt-basic' ),
		) );
	}
}
add_action( 'after_setup_theme', 'gt_basic_gutenberg_support' );


/**
 * Enqueue block styles and scripts for Gutenberg Editor.
 */
function gt_basic_block_editor_assets() {

	// Get Theme Version.
	$theme_version = wp_get_theme()->get( 'Version' );

	// Enqueue Editor Styling.
	wp_enqueue_style( 'gt-basic-editor-styles', get_theme_file_uri( '/assets/css/editor-styles.css' ), array(), $theme_version, 'all' );

	// Enqueue Theme Settings Sidebar plugin.
	wp_enqueue_script( 'gt-basic-editor-theme-settings', get_theme_file_uri( '/assets/js/editor-theme-settings.js' ), array( 'wp-blocks', 'wp-element', 'wp-edit-post' ), $theme_version );

	$theme_settings_l10n = array(
		'plugin_title'         => esc_html__( 'Theme Settings', 'gt-basic' ),
		'page_options'         => esc_html__( 'Page Options', 'gt-basic' ),
		'page_layout'          => esc_html__( 'Page Layout', 'gt-basic' ),
		'default_layout'       => esc_html__( 'Default', 'gt-basic' ),
		'full_layout'          => esc_html__( 'Full-width', 'gt-basic' ),
		'hide_title'           => esc_html__( 'Hide title?', 'gt-basic' ),
		'remove_bottom_margin' => esc_html__( 'Remove bottom margin?', 'gt-basic' ),
	);
	wp_localize_script( 'gt-basic-editor-theme-settings', 'gtThemeSettingsL10n', $theme_settings_l10n );
}
add_action( 'enqueue_block_editor_assets', 'gt_basic_block_editor_assets' );


/**
 * Register Post Meta
 */
function gt_basic_register_post_meta() {
	register_post_meta( 'page', 'gt_page_layout', array(
		'type'              => 'string',
		'single'            => true,
		'show_in_rest'      => true,
		'sanitize_callback' => 'sanitize_text_field',
	) );

	register_post_meta( 'page', 'gt_hide_page_title', array(
		'type'         => 'boolean',
		'single'       => true,
		'show_in_rest' => true,
	) );

	register_post_meta( 'page', 'gt_remove_bottom_margin', array(
		'type'         => 'boolean',
		'single'       => true,
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'gt_basic_register_post_meta' );


/**
 * Add body classes in Gutenberg Editor.
 */
function gt_basic_gutenberg_add_admin_body_class( $classes ) {
	global $post;
	$current_screen = get_current_screen();

	// Return early if we are not in the Gutenberg Editor.
	if ( ! ( method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor() ) ) {
		return $classes;
	}

	// Fullwidth Page Layout?
	if ( get_post_type( $post->ID ) && 'fullwidth' === get_post_meta( $post->ID, 'gt_page_layout', true ) ) {
		$classes .= ' gt-fullwidth-page-layout ';
	}

	// Page Title hidden?
	if ( get_post_type( $post->ID ) && get_post_meta( $post->ID, 'gt_hide_page_title', true ) ) {
		$classes .= ' gt-page-title-hidden ';
	}

	// Remove bottom margin of page?
	if ( get_post_type( $post->ID ) && get_post_meta( $post->ID, 'gt_remove_bottom_margin', true ) ) {
		$classes .= ' gt-page-bottom-margin-removed ';
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
