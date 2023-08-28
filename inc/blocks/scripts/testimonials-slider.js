'use strict';
( function ( $ ) {
	$( document ).ready( function () {
		const slider = $( '.testimonial-slider' );

		// slider.on('init reInit afterChange', function(event, slick, currentSlide) {
		// 	var slides = slider.find('.testimonial-item');

		// 	slides.removeClass('previous-slide');

		// 	for (var i = 0; i < currentSlide; i++) {
		// 		slides.eq(i).addClass('previous-slide');
		// 	}
		// });

		slider.slick( {
			infinite: false,
			autoplay: false,
			autoplaySpeed: 5000,
			dots: false,
			prevArrow: $( '.slick-prev' ),
			nextArrow: $( '.slick-next' ),
		} );
	} );
} )( jQuery );
