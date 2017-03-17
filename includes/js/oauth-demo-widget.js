
/**
 * Handle the demo widget form
 */
( function( $ ) {

	$( document ).ready( function() {
		var $container = jQuery( '#submit-oauth-signup' ).parents('.oath-demo-widget'),
			token = JSON.parse( localStorage.getItem( 'wpOathToken' ) );
		console.log( token );

		if ( ! token ) {
			$container.removeClass('loading');
		} else {
			$container.addClass( 'loggedin' );
		}

		$( '#submit-oauth-signup' ).on( 'click', function( e ) {
			e.preventDefault();
			console.log( 'Signin!' );
			var site         = $container.find( '#oauth-site' ).val(),
				clientkey    = $container.find( '#oauth-clientkey' ).val(),
				clientsecret = $container.find( '#oauth-clientsecret' ).val();


			if ( 'undefined' === typeof wp.oauth ) {
				console.log( 'wp.oauth undfined.' );
				return;
			}



			$container.addClass('loading');

			wp.oauth.connect( clientkey, clientsecret, site + 'oauth1/request', site + 'oauth1/authorize' );

		} );
	} );
} )( jQuery );