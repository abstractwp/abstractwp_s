/**
 * File resources.js
 *
 * Resources custom scripts.
 *
 * @author Thong Dang
 * @since January 29, 2022
 */

( function ( $ ) {
	$( document ).ready( function () {
		resizeResourceImage();
	} );

	$( window ).resize( function () {
		resizeResourceImage();
	} );

	$(document).on('facetwp-loaded', function() {
		resizeResourceImage();
	});

	function resizeResourceImage() {
		$( '.resource-img' ).each( function () {
			$( this ).height( $( this ).width() );
		} );
	}
} )( jQuery );
