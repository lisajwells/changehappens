( function( $ ) {
	if( ! navigator.userAgent.match( /(iPhone|iPad|Android)/ ) ) {
		setTimeout( function() {
			$( '#sticky-sidebar' ).stick_in_parent( {
				offset_top: 24,
				parent: '#content',
        inner_scrolling: false,
			} );
		}, 2000 );
		// Support for Jetpack Infinite Scroll
		$( document.body ).on( 'post-load', function () {
			$( this ).trigger( 'sticky_kit:recalc' );
		} );
	}
} )( jQuery );
