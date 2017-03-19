<?php
namespace wpapioauth\widget;

include 'demo-widget-class.php';

/**
 * Add a demo widget that enables remote login to a WordPress site with basic post editing.
 */
function oauth_add_demo_widget() {
	register_widget( 'OauthDemoWidget' );

}
add_action( 'widgets_init', __NAMESPACE__ . '\oauth_add_demo_widget' );

/**
 * Add some scripts.
 */
function oath_add_demo_widget_scripts() {

	$OAuthDetails = array(
		'clientKey'    => '8fJDqwctqdFf',
		'clientSecret' => 'EFBoVjpjo9oVZKSEHZxO96jHpzU4tlbKzN6BowKOjLXvNPF2',
	);
	wp_enqueue_script( 'oauth-demo-widget', plugins_url( 'js/oauth-demo-widget.js', __FILE__ ), array( 'jquery', 'wp-api' ) );
	wp_localize_script( 'oauth-demo-widget', 'OAuthWidgetCredentials', $OAuthDetails );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\oath_add_demo_widget_scripts' );

