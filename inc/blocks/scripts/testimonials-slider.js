'use strict';
( function ( $ ) {
	$(document).ready(function(){
		$('.testimonial-slider').slick({
			autoplay: true,
			autoplaySpeed: 5000,
			dots: false,
			prevArrow: '<button type="button" class="slick-prev"><svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.4286 23.8454L12.5714 16.9882L19.4286 10.1311" stroke="#14353C" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg></button>',
			nextArrow: '<button type="button" class="slick-next"><svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5714 23.8454L19.4286 16.9882L12.5714 10.1311" stroke="#14353C" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg></button>'
		});
	});
} )( jQuery );
