<?php
/**
 * Custom Fonts
 *
 * Generates Custom Fonts CSS code and loads Google Fonts from Google Font API
 *
 * @package GT Basic
 */

/**
* Custom Fonts Class
*/
class GT_Basic_Custom_Fonts {

	/**
	 * Actions Setup
	 *
	 * @return void
	 */
	static function setup() {

		// Add Custom Fonts CSS code.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'custom_fonts_css' ), 12 );

		// Load default fonts.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'load_default_fonts' ), 1 );

		// Add theme support for GT Typography plugin.
		add_action( 'after_setup_theme', array( __CLASS__, 'add_typography_theme_support' ) );
	}

	/**
	 * Add Font Family CSS styles in the head area to override default typography
	 */
	static function custom_fonts_css() {

		// Get Theme Options from Database.
		$theme_options = gt_basic_theme_options();

		// Get Default Fonts from settings.
		$default_options = gt_basic_default_options();

		// Font Variables.
		$font_variables = '';

		// Set Text Font.
		if ( $theme_options['text_font'] !== $default_options['text_font'] ) {
			$font_variables .= '--text-font: ' . self::get_font_family( $theme_options['text_font'] );
		}

		// Set Title Font.
		if ( $theme_options['title_font'] !== $default_options['title_font'] ) {
			$font_variables .= '--title-font: ' . self::get_font_family( $theme_options['title_font'] );
		}

		// Set Navi Font.
		if ( $theme_options['navi_font'] !== $default_options['navi_font'] ) {
			$font_variables .= '--navi-font: ' . self::get_font_family( $theme_options['navi_font'] );
		}

		// Return if no font variables were defined.
		if ( '' === $font_variables ) {
			return;
		}

		// Sanitize CSS Code.
		$custom_css = ':root {' . $font_variables . '}';
		$custom_css = wp_kses( $custom_css, array( '\'', '\"' ) );
		$custom_css = str_replace( '&gt;', '>', $custom_css );
		$custom_css = preg_replace( '/\n/', '', $custom_css );
		$custom_css = preg_replace( '/\t/', '', $custom_css );

		// Enqueue Custom CSS.
		wp_add_inline_style( 'gt-basic-stylesheet', $custom_css );
	}

	/**
	 * Get the font family string.
	 *
	 * @param String $font Name of selected font.
	 * @return string Fonts string.
	 */
	static function get_font_family( $font ) {

		// Set System Font Stack.
		$system_fonts = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif; ';

		// Return Font Family string.
		return 'SystemFontStack' === $font ? $system_fonts : '"' . esc_attr( $font ) . '", Arial, Helvetica, sans-serif; ';
	}

	/**
	 * Enqueue default fonts.
	 */
	static function load_default_fonts() {

		// Get selected fonts.
		$fonts = self::get_selected_fonts();

		if ( in_array( 'Open Sans', $fonts, true ) ) {
			wp_enqueue_style( 'gt-basic-open-sans-font', get_theme_file_uri( '/assets/css/open-sans.css' ), array(), '15.0' );
		}

		if ( in_array( 'Montserrat', $fonts, true ) ) {
			wp_enqueue_style( 'gt-basic-montserrat-font', get_theme_file_uri( '/assets/css/montserrat.css' ), array(), '12.0' );
		}
	}

	/**
	 * Get selected fonts in Customizer.
	 *
	 * @return array List of selected fonts.
	 */
	static function get_selected_fonts() {

		// Get theme options from database.
		$theme_options = gt_basic_theme_options();

		// Get selected fonts.
		$selected_fonts = array(
			$theme_options['text_font'],
			$theme_options['title_font'],
			$theme_options['navi_font'],
		);

		return $selected_fonts;
	}

	/**
	 * Register support for GT Typography plugin.
	 */
	static function add_typography_theme_support() {

		// Get selected fonts.
		$selected_fonts = self::get_selected_fonts();

		// Remove default fonts.
		$selected_fonts = array_diff( $selected_fonts, array( 'Montserrat', 'Open Sans' ) );

		add_theme_support( 'gt-typography', array(
			'selected_fonts' => $selected_fonts,
		) );
	}

	/**
	 * Get fonts
	 *
	 * @return array List of fonts.
	 */
	static function get_fonts() {

		$fonts = array(
			'Arial'                       => 'Arial',
			'Arial Black'                 => 'Arial Black',
			'Courier New'                 => 'Courier New',
			'Georgia'                     => 'Georgia',
			'Helvetica'                   => 'Helvetica',
			'Impact'                      => 'Impact',
			'Palatino, Palatino Linotype' => 'Palatino',
			'SystemFontStack'             => 'System Font Stack',
			'Tahoma'                      => 'Tahoma',
			'Trebuchet MS, Trebuchet'     => 'Trebuchet MS',
			'Times New Roman, Times'      => 'Times New Roman',
			'Verdana'                     => 'Verdana',
		);

		// Get Default Fonts from settings.
		$default_options = gt_basic_default_options();

		// Add default fonts to local fonts.
		if ( isset( $default_options['text_font'] ) and ! array_key_exists( $default_options['text_font'], $fonts ) ) :
			$fonts[ trim( $default_options['text_font'] ) ] = esc_attr( trim( $default_options['text_font'] ) );
		endif;
		if ( isset( $default_options['title_font'] ) and ! array_key_exists( $default_options['title_font'], $fonts ) ) :
			$fonts[ trim( $default_options['title_font'] ) ] = esc_attr( trim( $default_options['title_font'] ) );
		endif;
		if ( isset( $default_options['navi_font'] ) and ! array_key_exists( $default_options['navi_font'], $fonts ) ) :
			$fonts[ trim( $default_options['navi_font'] ) ] = esc_attr( trim( $default_options['navi_font'] ) );
		endif;

		// Allow other plugins to add fonts.
		$fonts = apply_filters( 'gt_typography_fonts', $fonts );

		// Sort fonts alphabetically.
		asort( $fonts );

		return $fonts;
	}
}

// Run Class.
GT_Basic_Custom_Fonts::setup();
