( function( root, $, undefined ) {
	'use strict';

	$( function() {

		var menuState = 0;
		var menuIcon = new Marka( '#bars' );
		menuIcon.set( 'bars' ).color( '#ffffff' ).size( 30 );

		jQuery( '#bars' ).on( 'click', function() {
			jQuery( '.header' ).toggleClass( 'mobile-active' );
			switch ( menuState ) {
				case 0:
					menuState = 1;
					menuIcon.set( 'times' );
					break;
				default:
					menuState = 0;
					menuIcon.set( 'bars' );
				break;
			}
		});


	});
} ( this, jQuery ) );
