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
				hideElement( '.site-title' );
			} else {
				showElement( '.site-title' );
			}
		} );
	} );

	// Site Description checkbox.
	wp.customize( 'gt_basic_theme_options[site_description]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				hideElement( '.site-description' );
			} else {
				showElement( '.site-description' );
			}
		} );
	} );

	// Post Date checkbox.
	wp.customize( 'gt_basic_theme_options[meta_date]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'date-hidden' );
			} else {
				$( 'body' ).removeClass( 'date-hidden' );
			}
		} );
	} );

	// Post Author checkbox.
	wp.customize( 'gt_basic_theme_options[meta_author]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'author-hidden' );
			} else {
				$( 'body' ).removeClass( 'author-hidden' );
			}
		} );
	} );

	// Post Category checkbox.
	wp.customize( 'gt_basic_theme_options[meta_category]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'categories-hidden' );
			} else {
				$( 'body' ).removeClass( 'categories-hidden' );
			}
		} );
	} );

	// Post Thumbnails checkbox.
	wp.customize( 'gt_basic_theme_options[post_image_archives]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'post-images-hidden' );
			} else {
				$( 'body' ).removeClass( 'post-images-hidden' );
			}
		} );
	} );

	// Single Post Thumbnail checkbox.
	wp.customize( 'gt_basic_theme_options[post_image_single]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'post-image-hidden' );
			} else {
				$( 'body' ).removeClass( 'post-image-hidden' );
			}
		} );
	} );

	// Footer text.
	wp.customize( 'gt_basic_theme_options[footer_text]', function( value ) {
		value.bind( function( to ) {
			$( '.site-info .footer-text' ).html( to );
		} );
	} );

	/* Primary Link Color Option */
	wp.customize( 'gt_basic_theme_options[link_color_one]', function( value ) {
		value.bind( function( newval ) {
			var text_color;

			if( isColorLight( newval ) ) {
				text_color = '#202020';
			} else {
				text_color = '#ffffff';
			}

			document.documentElement.style.setProperty( '--link-color', newval );
			document.documentElement.style.setProperty( '--button-color', newval );
			document.documentElement.style.setProperty( '--button-text-color', text_color );
		} );
	} );

	/* Secondary Link Color Option */
	wp.customize( 'gt_basic_theme_options[link_color_two]', function( value ) {
		value.bind( function( newval ) {
			var text_color;

			if( isColorLight( newval ) ) {
				text_color = '#202020';
			} else {
				text_color = '#ffffff';
			}

			document.documentElement.style.setProperty( '--link-hover-color', newval );
			document.documentElement.style.setProperty( '--button-hover-color', newval );
			document.documentElement.style.setProperty( '--button-hover-text-color', text_color );
		} );
	} );

	/* Navi Color Option */
	wp.customize( 'gt_basic_theme_options[navi_color_one]', function( value ) {
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

	/* Submenu Color Option */
	wp.customize( 'gt_basic_theme_options[navi_color_two]', function( value ) {
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

			document.documentElement.style.setProperty( '--submenu-color', newval );
			document.documentElement.style.setProperty( '--submenu-text-color', text_color );
			document.documentElement.style.setProperty( '--submenu-hover-text-color', text_hover_color );
			document.documentElement.style.setProperty( '--submenu-border-color', border_color );
		} );
	} );

	/* Title Color Option */
	wp.customize( 'gt_basic_theme_options[title_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--title-color', newval );
		} );
	} );

	/* Widget Title Color Option */
	wp.customize( 'gt_basic_theme_options[widget_title_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--widget-title-color', newval );
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

	/* Theme Fonts */
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

	function hideElement( element ) {
		$( element ).css({
			clip: 'rect(1px, 1px, 1px, 1px)',
			position: 'absolute',
			width: '1px',
			height: '1px',
			overflow: 'hidden'
		});
	}

	function showElement( element ) {
		$( element ).css({
			clip: 'auto',
			position: 'relative',
			width: 'auto',
			height: 'auto',
			overflow: 'visible'
		});
	}

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
