/**
 * Customizer Live Preview
 *
 * Reloads changes on Theme Customizer Preview asynchronously for better usability
 *
 * @package GT Basic
 */

( function( $ ) {

	// Site Title textfield.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Site Description textfield.
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Site Title checkbox.
	wp.customize( 'gt_basic_theme_options[site_title]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'site-title-hidden' );
			} else {
				$( 'body' ).removeClass( 'site-title-hidden' );
			}
		} );
	} );

	// Site Description checkbox.
	wp.customize( 'gt_basic_theme_options[site_description]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'site-description-hidden' );
			} else {
				$( 'body' ).removeClass( 'site-description-hidden' );
			}
		} );
	} );

	/* Primary Color Option */
	wp.customize( 'gt_basic_theme_options[primary_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, text_hover_color, border_color;

			if( isColorLight( newval ) ) {
				text_color = '#202020';
				text_hover_color = 'rgba(0, 0, 0, 0.5)';
				border_color = 'rgba(0, 0, 0, 0.1)';
			} else {
				text_color = '#ffffff';
				text_hover_color = 'rgba(255, 255, 255, 0.5)';
				border_color = 'rgba(255, 255, 255, 0.075)';
			}

			document.documentElement.style.setProperty( '--primary-color', newval );
			document.documentElement.style.setProperty( '--link-color', newval );
			document.documentElement.style.setProperty( '--button-color', newval );
			document.documentElement.style.setProperty( '--button-text-color', text_color );

			document.documentElement.style.setProperty( '--submenu-color', newval );
			document.documentElement.style.setProperty( '--submenu-text-color', text_color );
			document.documentElement.style.setProperty( '--submenu-hover-text-color', text_hover_color );
			document.documentElement.style.setProperty( '--submenu-border-color', border_color );
		} );
	} );

	/* Secondary Color Option */
	wp.customize( 'gt_basic_theme_options[secondary_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color;

			if( isColorLight( newval ) ) {
				text_color = '#202020';
			} else {
				text_color = '#ffffff';
			}

			document.documentElement.style.setProperty( '--secondary-color', newval );
			document.documentElement.style.setProperty( '--link-hover-color', newval );
			document.documentElement.style.setProperty( '--button-hover-color', newval );
			document.documentElement.style.setProperty( '--button-hover-text-color', text_color );
		} );
	} );

	/* Accent Color Option */
	wp.customize( 'gt_basic_theme_options[accent_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--accent-color', newval );
		} );
	} );

	/* Navi Color Option */
	wp.customize( 'gt_basic_theme_options[navi_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, text_hover_color, border_color;

			if( isColorLight( newval ) ) {
				text_color = '#202020';
				text_hover_color = 'rgba(0, 0, 0, 0.5)';
				border_color = 'rgba(0, 0, 0, 0.075)';
			} else {
				text_color = '#ffffff';
				text_hover_color = 'rgba(255, 255, 255, 0.5)';
				border_color = 'rgba(255, 255, 255, 0.05)';
			}

			document.documentElement.style.setProperty( '--navi-color', newval );
			document.documentElement.style.setProperty( '--navi-text-color', text_color );
			document.documentElement.style.setProperty( '--navi-hover-text-color', text_hover_color );
			document.documentElement.style.setProperty( '--navi-border-color', border_color );
		} );
	} );

	/* Title Color Option */
	wp.customize( 'gt_basic_theme_options[title_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--title-color', newval );
		} );
	} );

	/* Footer Color Option */
	wp.customize( 'gt_basic_theme_options[footer_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, text_hover_color, border_color;

			if( isColorLight( newval ) ) {
				text_color = '#202020';
				text_hover_color = 'rgba(0, 0, 0, 0.5)';
				border_color = 'rgba(0, 0, 0, 0.05)';
			} else {
				text_color = '#ffffff';
				text_hover_color = 'rgba(255, 255, 255, 0.5)';
				border_color = 'rgba(255, 255, 255, 0.035)';
			}

			document.documentElement.style.setProperty( '--footer-color', newval );
			document.documentElement.style.setProperty( '--footer-text-color', text_color );
			document.documentElement.style.setProperty( '--footer-hover-text-color', text_hover_color );
			document.documentElement.style.setProperty( '--footer-border-color', border_color );
		} );
	} );

	/* Text Font */
	wp.customize( 'gt_basic_theme_options[text_font]', function( value ) {
		value.bind( function( newval ) {

			// Embed Font.
			var fontFamilyUrl = newval.split( " " ).join( "+" );
			var googleFontPath = "https://fonts.googleapis.com/css?family=" + fontFamilyUrl + ":400,700";
			var googleFontSource = "<link id='gt-basic-custom-text-font' href='" + googleFontPath + "' rel='stylesheet' type='text/css'>";
			var checkLink = $( "head" ).find( "#gt-basic-custom-text-font" ).length;

			if (checkLink > 0) {
				$( "head" ).find( "#gt-basic-custom-text-font" ).remove();
			}
			$( "head" ).append( googleFontSource );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			document.documentElement.style.setProperty( '--text-font', newFont );
		} );
	} );

	/* Title Font */
	wp.customize( 'gt_basic_theme_options[title_font]', function( value ) {
		value.bind( function( newval ) {

			// Embed Font.
			var fontFamilyUrl = newval.split( " " ).join( "+" );
			var googleFontPath = "https://fonts.googleapis.com/css?family=" + fontFamilyUrl + ":400,700";
			var googleFontSource = "<link id='gt-basic-custom-title-font' href='" + googleFontPath + "' rel='stylesheet' type='text/css'>";
			var checkLink = $( "head" ).find( "#gt-basic-custom-title-font" ).length;

			if (checkLink > 0) {
				$( "head" ).find( "#gt-basic-custom-title-font" ).remove();
			}
			$( "head" ).append( googleFontSource );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			document.documentElement.style.setProperty( '--title-font', newFont );
		} );
	} );

	/* Title Font Weight */
	wp.customize( 'gt_basic_theme_options[title_is_bold]', function( value ) {
		value.bind( function( newval ) {
			var fontWeight = newval ? 'bold' : 'normal';
			document.documentElement.style.setProperty( '--title-font-weight', fontWeight );
		} );
	} );

	/* Title Text Transform */
	wp.customize( 'gt_basic_theme_options[title_is_uppercase]', function( value ) {
		value.bind( function( newval ) {
			var textTransform = newval ? 'uppercase' : 'none';
			document.documentElement.style.setProperty( '--title-text-transform', textTransform );
		} );
	} );

	/* Navi Font */
	wp.customize( 'gt_basic_theme_options[navi_font]', function( value ) {
		value.bind( function( newval ) {

			// Embed Font.
			var fontFamilyUrl = newval.split( " " ).join( "+" );
			var googleFontPath = "https://fonts.googleapis.com/css?family=" + fontFamilyUrl + ":400,700";
			var googleFontSource = "<link id='gt-basic-custom-navi-font' href='" + googleFontPath + "' rel='stylesheet' type='text/css'>";
			var checkLink = $( "head" ).find( "#gt-basic-custom-navi-font" ).length;

			if (checkLink > 0) {
				$( "head" ).find( "#gt-basic-custom-navi-font" ).remove();
			}
			$( "head" ).append( googleFontSource );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			document.documentElement.style.setProperty( '--navi-font', newFont );
		} );
	} );

	/* Navi Font Weight */
	wp.customize( 'gt_basic_theme_options[navi_is_bold]', function( value ) {
		value.bind( function( newval ) {
			var fontWeight = newval ? 'bold' : 'normal';
			document.documentElement.style.setProperty( '--navi-font-weight', fontWeight );
		} );
	} );

	/* Navi Text Transform */
	wp.customize( 'gt_basic_theme_options[navi_is_uppercase]', function( value ) {
		value.bind( function( newval ) {
			var textTransform = newval ? 'uppercase' : 'none';
			document.documentElement.style.setProperty( '--navi-text-transform', textTransform );
		} );
	} );

	function hexdec( hexString ) {
		hexString = ( hexString + '' ).replace( /[^a-f0-9]/gi, '' );
		return parseInt( hexString, 16 );
	}

	function getColorBrightness( hexColor ) {

		// Remove # string.
		hexColor = hexColor.replace( '#', '' );

		// Convert into RGB.
		var r = hexdec( hexColor.substring( 0, 2 ) );
		var g = hexdec( hexColor.substring( 2, 4 ) );
		var b = hexdec( hexColor.substring( 4, 6 ) );

		return ( ( ( r * 299 ) + ( g * 587 ) + ( b * 114 ) ) / 1000 );
	}

	function isColorLight( hexColor ) {
		return ( getColorBrightness( hexColor ) > 130 );
	}

	function isColorDark( hexColor ) {
		return ( getColorBrightness( hexColor ) <= 130 );
	}

} )( jQuery );
