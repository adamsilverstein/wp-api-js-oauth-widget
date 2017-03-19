
/**
 * Handle the demo widget form
 */
( function( $ ) {
	var wpApiOauthSettings = wpApiOauthSettings || {};

	$( document ).ready( function() {
		var $container = jQuery( '#submit-oauth-signup' ).parents('.oauth-demo-widget'),
			token = JSON.parse( localStorage.getItem( 'wpOathToken' ) );

		var temptoken = wpApiOauthSettings.oauth1Token;
		if ( token ) {
			$container.addClass( 'loggedin' ).removeClass( 'loading' );
			addEditWidget( $( '#post-edit-container' ) );
		} else {
			$container.removeClass( 'loading' );
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
				OAuthWidgetSettings.credentials.clientKey,
				OAuthWidgetSettings.credentials.clientSecret,
				site + 'oauth1/request',
				site + 'oauth1/authorize',
				site + 'oauth1/access'
			);

		} );
	} );

	// Once OAuth is logged in, turn the widget into an editable widget.
	var addEditWidget = function( $target ) {
		console.log( 'addEditWidget' );
		if ( OAuthWidgetSettings.postId ) {
			var $title = $( '.entry-title' );

			$title.prop( 'contenteditable', true );
			var post = new wp.api.models.Post( { 'id': OAuthWidgetSettings.postId } );

			$title.on( 'input',
				_.debounce( function() {
					console.log( 'save', $title.text() );
					post.set( 'title', $title.text() );
					post.save();
				}, 500 )
			);



		}
	}
} )( jQuery );