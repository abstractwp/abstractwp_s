jQuery( function ( $ ) {
	const $grid = $( '.facetwp-template' ).masonry( {
		itemSelector: '.artwork-container',
		columnWidth: 320,
	} );

	$( document ).on( 'facetwp-loaded', function () {
		$grid.masonry( 'layout' );
	} );
} );
