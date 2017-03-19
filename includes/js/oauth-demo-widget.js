
/**
 * Handle the demo widget form
 */
( function( $ ) {
	var wpApiOauthSettings = wpApiOauthSettings || {};

	$( document ).ready( function() {
		var $container = jQuery( '#submit-oauth-signup' ).parents('.oath-demo-widget'),
			token = JSON.parse( localStorage.getItem( 'wpOathToken' ) );
		console.log( token );

		var temptoken = wpApiOauthSettings.oauth1Token;
		if ( token ) {
			$container.addClass( 'loggedin' );
		}
		if ( ! token && temptoken ) {
		} else {
			$container.removeClass('loading');
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

			sessionStorage.setItem( 'oauth1AccessUrl', site + 'oauth1/access' );

			$container.addClass('loading');

			wp.oauth.connect( clientkey, clientsecret, site + 'oauth1/request', site + 'oauth1/authorize' );

		} );
	} );
} )( jQuery );