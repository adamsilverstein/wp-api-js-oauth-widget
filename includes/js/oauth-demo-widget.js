
/**
 * Handle the demo widget form
 */
( function( $ ) {

	$( document ).ready( function() {
		$( '#submit-oauth-signup' ).on( 'click', function( e ) {
			e.preventDefault();
			console.log( 'Signin!' );
			var $container   = jQuery( '#submit-oauth-signup' ).parents('.oath-demo-widget'),
				site         = $container.find( '#oauth-site' ).val(),
				clientkey    = $container.find( '#oauth-clientkey' ).val(),
				clientsecret = $container.find( '#oauth-clientsecret' ).val();


				if ( 'undefined' === typeof wp.oauth ) {
					console.log( 'wp.oauth undfined.' );
					return;
				}

				$container.addClass('loading');

				wp.oauth.connect( clientkey, clientsecret, site );

		} );
	} );
} )( jQuery );