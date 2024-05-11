jQuery( function ( $ ) {
	const $grid = $( '.facetwp-template' ).masonry( {
		itemSelector: '.artwork-container',
		columnWidth: 280,
	} );

	$( document ).on( 'facetwp-loaded', function () {
		$grid.masonry( 'reloadItems' );
		$grid.masonry( 'layout' );
		/*eslint eslint-comments/no-unlimited-disable: error */
		FOOBOX.init(); //eslint-disable-line no-undef
	} );
} );
