<?php
/**
 * Custom Colors
 *
 * Generates Custom CSS code for Color Settings
 *
 * @package GT Basic
 */

/**
 * Custom Colors Class
 */
class GT_Basic_Custom_Colors {

	/**
	 * Actions Setup
	 *
	 * @return void
	 */
	static function setup() {

		// Add Custom Colors CSS code.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'custom_colors_css' ), 11 );
	}

	/**
	 * Adds Color CSS styles in the head area to override default colors
	 *
	 * @return string CSS code
	 */
	static function custom_colors_css() {

		// Get theme options from database.
		$theme_options = gt_basic_theme_options();

		// Get default colors.
		$default = gt_basic_default_options();

		// Color Variables.
		$color_variables = '';

		// Set Primary Link Color.
		if ( $theme_options['link_color_one'] !== $default['link_color_one'] ) {
			$color_variables .= '--link-color: ' . $theme_options['link_color_one'] . ';';
			$color_variables .= '--button-color: ' . $theme_options['link_color_one'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_light( $theme_options['link_color_one'] ) ) {
				$color_variables .= '--button-text-color: #202020;';
			}
		}

		// Set Secondary Link Color.
		if ( $theme_options['link_color_two'] !== $default['link_color_two'] ) {
			$color_variables .= '--link-hover-color: ' . $theme_options['link_color_two'] . ';';
			$color_variables .= '--button-hover-color: ' . $theme_options['link_color_two'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_light( $theme_options['link_color_two'] ) ) {
				$color_variables .= '--button-hover-text-color: #202020;';
			}
		}

		// Set Navi Color.
		if ( $theme_options['navi_color_one'] !== $default['navi_color_one'] ) {
			$color_variables .= '--navi-color: ' . $theme_options['navi_color_one'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_light( $theme_options['navi_color_one'] ) ) {
				$color_variables .= '--navi-text-color: #202020;';
				$color_variables .= '--navi-hover-text-color: rgba(0, 0, 0, 0.5);';
				$color_variables .= '--navi-border-color: rgba(0, 0, 0, 0.075);';
			}
		}

		// Set Submenu Color.
		if ( $theme_options['navi_color_two'] !== $default['navi_color_two'] ) {
			$color_variables .= '--submenu-color: ' . $theme_options['navi_color_two'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_light( $theme_options['navi_color_two'] ) ) {
				$color_variables .= '--submenu-text-color: #202020;';
				$color_variables .= '--submenu-hover-text-color: rgba(0, 0, 0, 0.5);';
				$color_variables .= '--submenu-border-color: rgba(0, 0, 0, 0.1);';
			}
		}

		// Set Title Color.
		if ( $theme_options['title_color'] !== $default['title_color'] ) {
			$color_variables .= '--title-color: ' . $theme_options['title_color'] . ';';
		}

		// Set Widget Title Color.
		if ( $theme_options['widget_title_color'] !== $default['widget_title_color'] ) {
			$color_variables .= '--widget-title-color: ' . $theme_options['widget_title_color'] . ';';
		}

		// Set Footer Color.
		if ( $theme_options['footer_color'] !== $default['footer_color'] ) {
			$color_variables .= '--footer-color: ' . $theme_options['footer_color'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_light( $theme_options['footer_color'] ) ) {
				$color_variables .= '--footer-text-color: #202020;';
				$color_variables .= '--footer-hover-text-color: rgba(0, 0, 0, 0.5);';
				$color_variables .= '--footer-border-color: rgba(0, 0, 0, 0.05);';
			}
		}

		// Return if no color variables were defined.
		if ( '' === $color_variables ) {
			return;
		}

		// Sanitize CSS Code.
		$custom_css .= ':root {' . $color_variables . '}';
		$custom_css  = wp_kses( $custom_css, array( '\'', '\"' ) );
		$custom_css  = str_replace( '&gt;', '>', $custom_css );
		$custom_css  = preg_replace( '/\n/', '', $custom_css );
		$custom_css  = preg_replace( '/\t/', '', $custom_css );

		// Enqueue Custom CSS.
		wp_add_inline_style( 'gt-basic-stylesheet', $custom_css );
	}

	/**
	 * Returns color brightness.
	 *
	 * @param int Number of brightness.
	 */
	static function get_color_brightness( $hex_color ) {

		// Remove # string.
		$hex_color = str_replace( '#', '', $hex_color );

		// Convert into RGB.
		$r = hexdec( substr( $hex_color, 0, 2 ) );
		$g = hexdec( substr( $hex_color, 2, 2 ) );
		$b = hexdec( substr( $hex_color, 4, 2 ) );

		return ( ( ( $r * 299 ) + ( $g * 587 ) + ( $b * 114 ) ) / 1000 );
	}

	/**
	 * Check if the color is light.
	 *
	 * @param bool True if color is light.
	 */
	static function is_color_light( $hex_color ) {
		return ( self::get_color_brightness( $hex_color ) > 130 );
	}

	/**
	 * Check if the color is dark.
	 *
	 * @param bool True if color is dark.
	 */
	static function is_color_dark( $hex_color ) {
		return ( self::get_color_brightness( $hex_color ) <= 130 );
	}
}

// Run Class.
GT_Basic_Custom_Colors::setup();
