/**
 * Block script.
 *
 * @package
 * @since 2.0.0
 */

// add JS here.
'use strict';
( function ( $ ) {
	$( document ).ready( function () {
		const sliders = $( '.center-slider .testimonial-slider' );
		// Initialize each slider individually
		sliders.each( function () {
			const slider = $( this );
			const blockId = slider.attr( 'id' );
			slider.slick( {
				infinite: true,
				autoplay: true,
				autoplaySpeed: 5000,
				dots: true,
				prevArrow: $( `#prev-${ blockId }` ),
				nextArrow: $( `#next-${ blockId }` ),
			} );
		} );
	} );
} )( jQuery );
