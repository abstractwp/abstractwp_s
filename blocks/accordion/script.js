/**
 * Block script.
 *
 * @package
 * @since 2.0.0
 */

// add JS here.
document.addEventListener('DOMContentLoaded', () => {
	// Get all the accordion items
	const accordionItems = document.querySelectorAll( '.accordion-item' );

	// Add a click event listener to each accordion button
	accordionItems.forEach( ( item ) => {
		const button = item.querySelector( '.accordion-title' );
		const content = item.querySelector( '.accordion-content' );

		button.addEventListener( 'click', () => {
			// Close all other accordion items
			accordionItems.forEach( ( otherItem ) => {
				if ( otherItem !== item ) {
					const otherContent =
						otherItem.querySelector( '.accordion-content' );
					const otherButton =
						otherItem.querySelector( '.accordion-title' );
					otherContent.style.display = 'none';
					otherButton.classList.remove( 'open' );
				}
			} );

			button.classList.add( 'open' );

			// Toggle the display of the clicked item's content
			content.style.display =
				content.style.display === 'block' ? 'none' : 'block';
		} );
	} );
} );
