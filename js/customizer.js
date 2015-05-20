/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	//Allgemein 

	// Details
		//Background
		wp.customize( 'details_background', function( value ) {
			value.bind( function( to ) {
				if ( 'blank' === to ) {
				} else {
					$( '#content.site-content' ).css( {
						'background-color': to
					} );
				}
			} );
		} );


	// Calendar
		//Titel
		wp.customize( 'calendar_headline', function( value ) {
			value.bind( function( to ) {
				$( '.calendarheadline' ).text( to );
			} );
		} );
		//Background
		wp.customize( 'calendar_background', function( value ) {
			value.bind( function( to ) {
				if ( 'blank' === to ) {
				} else {
					$( '.termine' ).css( {
						'background-color': to
					} );
				}
			} );
		} );

	// Checklist
		//Titel
		wp.customize( 'checklist_headline', function( value ) {
			value.bind( function( to ) {
				$( '.chacklisthead' ).text( to );
			} );
		} );
		//Subtitel
		wp.customize( 'checklist_subhead', function( value ) {
			value.bind( function( to ) {
				$( '.chacklistsubhead' ).text( to );
			} );
		} );

	// Alert
		//Background
		wp.customize( 'alert_background', function( value ) {
			value.bind( function( to ) {
				if ( 'blank' === to ) {
				} else {
					$( '.alert' ).css( {
						'background-color': to
					} );
				}
			} );
		} );

	// News
		//Titel
		wp.customize( 'news_headline', function( value ) {
			value.bind( function( to ) {
				$( '.newshead' ).text( to );
			} );
		} );
		//Background
		wp.customize( 'news_background', function( value ) {
			value.bind( function( to ) {
				if ( 'blank' === to ) {
				} else {
					$( '.news' ).css( {
						'background-color': to
					} );
				}
			} );
		} );

	// Team
		//Titel
		wp.customize( 'teamer_headline', function( value ) {
			value.bind( function( to ) {
				$( '.teamhead' ).text( to );
			} );
		} );
		//Background
		wp.customize( 'team_background', function( value ) {
			value.bind( function( to ) {
				if ( 'blank' === to ) {
				} else {
					$( '.team' ).css( {
						'background-color': to
					} );
				}
			} );
		} );

	// Footer
		//Titel
		wp.customize( 'footer_headline', function( value ) {
			value.bind( function( to ) {
				$( '.footerhead' ).text( to );
			} );
		} );
		//Background
		wp.customize( 'footer_background', function( value ) {
			value.bind( function( to ) {
				if ( 'blank' === to ) {
				} else {
					$( '#colophon' ).css( {
						'background-color': to
					} );
				}
			} );
		} );


} )( jQuery );
