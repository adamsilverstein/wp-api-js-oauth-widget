<?php
/**
 * Plugin Name: Oauth plugin for WP-API JS.
 *
 * Version 1.0.1
 */

/**
 * Set up the plugin.
 */
function json_api_client_js() {

	/**
	 * @var WP_REST_Server $wp_rest_server
	 */
	global $wp_rest_server;

	// Ensure that the script is registered.
	$scripts = wp_scripts();
	$src = plugins_url( 'js/wp-api-oauth.js', __FILE__ );
	wp_register_script( 'wp-api-oath', $src, array( 'wp-api' ), '1.0', true );
	}

	// Search for the OAuth1 authentication, and add any info to localized data.
	$oauth_request = new WP_REST_Request( 'GET', '/' );
	$oauth_response = $wp_rest_server->dispatch( $oauth_request );
	$oauth1 = null;

	if ( ! $oauth_response->is_error() ) {
		$oauth_data = $oauth_response->get_data();

		if ( isset(  $oauth_data['authentication']['oauth1'] ) ) {
			$oauth1 =  $oauth_data['authentication']['oauth1'];
		}
	}

	// Set up OAuth if available.
	if ( $oauth1 ) {
		wp_enqueue_script( 'sha1', plugins_url( 'vendor/js/hmac-sha1.js', __FILE__ ), array()  );
		wp_enqueue_script( 'sha256', plugins_url( 'vendor/js/hmac-sha256.js', __FILE__ ), array()  );
		wp_enqueue_script( 'base64', plugins_url( 'vendor/js/enc-base64-min.js', __FILE__ ), array()  );
		wp_enqueue_script( 'oauth1', plugins_url( 'vendor/js/oauth-1.0a.js', __FILE__ ), array( 'base64', 'sha1', 'sha256' )  );
	}

	// Localize the plugin settings and schema.
	$settings = array(
		'oauth1Token'    => isset( $_GET['oauth_token'] ) ? sanitize_text_field( $_GET['oauth_token'] ) : null,
		'oauth1Verifier' => isset( $_GET['oauth_verifier'] ) ? sanitize_text_field( $_GET['oauth_verifier'] ) : null,
		'oauth1Public'    => '0XKFJPpIuBWR',
		'oauth1Secret'    => 'SFh0EqddY1dwhiq2G7GvExEQdMY89TyT0C05qpQELJPFlS7R',
		'loggedInCookie'  => LOGGED_IN_COOKIE
	);
}

	add_action( 'wp_enqueue_scripts', 'json_api_client_js' );
	add_action( 'admin_enqueue_scripts', 'json_api_client_js' );