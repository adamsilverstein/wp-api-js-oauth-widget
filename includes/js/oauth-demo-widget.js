
/**
 * Handle the demo widget form
 */
( function( $ ) {
	var wpApiOauthSettings = wpApiOauthSettings || {};

	$( document ).ready( function() {
		var $container = jQuery( '#submit-oauth-signup' ).parents('.oath-demo-widget'),
			token = JSON.parse( localStorage.getItem( 'wpOathToken' ) );

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
			var site         = $container.find( '#oauth-site' ).val();


			if ( 'undefined' === typeof wp.oauth ) {
				console.log( 'wp.oauth undfined.' );
				return;
			}

			$container.addClass('loading');

			wp.oauth.connect(
				OAuthWidgetCredentials.clientKey,
				OAuthWidgetCredentials.clientSecret,
				site + 'oauth1/request',
				site + 'oauth1/authorize',
				site + 'oauth1/access'
			);

		} );
	} );
} )( jQuery );