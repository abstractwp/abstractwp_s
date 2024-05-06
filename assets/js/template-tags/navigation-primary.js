/**
 * File: navigation-primary.js
 *
 * Helpers for the primary navigation.
 */

( function () {
	const subMenuParentItem = document.querySelectorAll(
		'.main-navigation .menu-item-has-children'
	);

	document.addEventListener( 'DOMContentLoaded', addDownArrow );
	document.addEventListener( 'DOMContentLoaded', addBackButton );
	document.addEventListener( 'DOMContentLoaded', toggleFocusClass );

	/**
	 * Adds back button on sub-menu level 3.
	 *
	 * @author Thong Dang
	 * @since May 3, 2024
	 */
	function addBackButton() {
		subMenuParentItem.forEach( ( parentItem ) => {
			const menuItem = parentItem.querySelector( '.sub-menu' );
			let subMenuLabel = '';
			if ( parentItem.classList.contains( 'menu-item-has-children' ) ) {
				subMenuLabel = parentItem.querySelector( 'a' ).textContent;
			}

			const backBtn = document.createElement( 'span' );
			backBtn.classList.add( 'back-button' );
			backBtn.addEventListener( 'click', () => {
				const activeItems = document.querySelectorAll(
					'.main-navigation .focus'
				);

				activeItems.forEach( ( activeItem ) => {
					activeItem.classList.remove( 'focus' );
				} );
			} );

			const subMenuHeader = document.createElement( 'span' );
			subMenuHeader.classList.add( 'sub-menu-header' );
			subMenuHeader.innerText = subMenuLabel;
			menuItem.insertAdjacentHTML(
				'afterbegin',
				subMenuHeader.outerHTML
			);
			parentItem.append( backBtn );
		} );
	}

	/**
	 * Adds the down arrow to parent menu items.
	 *
	 * @author Corey Collins
	 * @since January 31, 2020
	 */
	function addDownArrow() {
		subMenuParentItem.forEach( ( parentItem ) => {
			const menuItem = parentItem.querySelector( 'a' );
			menuItem.innerHTML +=
				'<span class="caret-down" aria-hidden="true"></span>';
		} );
	}

	/**
	 * Adds event listeners for tabbing in and out of parent items.
	 *
	 * @author Corey Collins
	 * @since January 31, 2020
	 */
	function toggleFocusClass() {
		subMenuParentItem.forEach( ( parentItem ) => {
			parentItem.addEventListener( 'focusin', toggleIn );
		} );
	}

	/**
	 * Handle toggling a parent menu on.
	 *
	 * @author Corey Collins
	 * @since January 31, 2020
	 * @param {Object} event The triggered event.
	 */
	function toggleIn( event ) {
		const parentMenuItems = getParents(
			event.target.parentNode,
			'.menu-item-has-children'
		);
		parentMenuItems.forEach( ( parentItem ) => {
			parentItem.classList.add( 'focus' );
		} );
	}

	/**
	 * Get all of the parents for a matching element and selector.
	 *
	 * @author Corey Collins
	 * @since January 31, 2020
	 * @see https://gomakethings.com/climbing-up-and-down-the-dom-tree-with-vanilla-javascript/#getting-all-matches-up-the-tree
	 * @param {Object} elem     The parent menu item.
	 * @param {string} selector The CSS class of the element.
	 * @return {Array} Parents.
	 */
	const getParents = function ( elem, selector ) {
		// Element.matches() polyfill.
		if ( ! Element.prototype.matches ) {
			Element.prototype.matches =
				Element.prototype.matchesSelector ||
				Element.prototype.mozMatchesSelector ||
				Element.prototype.msMatchesSelector ||
				Element.prototype.oMatchesSelector ||
				Element.prototype.webkitMatchesSelector ||
				function ( s ) {
					const matches = (
						this.document || this.ownerDocument
					).querySelectorAll( s );
					let i = matches.length;
					while ( 0 >= --i && matches.item( i ) !== this ) {}
					return -1 > i;
				};
		}

		// Setup parents array.
		const parents = [];

		// Get matching parent elements.
		for ( ; elem && elem !== document; elem = elem.parentNode ) {
			// Add matching parents to array.
			if ( selector ) {
				if ( elem.matches( selector ) ) {
					parents.push( elem );
				}
			} else {
				parents.push( elem );
			}
		}

		return parents;
	};
} )();
