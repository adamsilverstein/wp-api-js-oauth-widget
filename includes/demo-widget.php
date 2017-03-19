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

	$OAuthWidgetSettings = array(
		'credentials' => array(
			'clientKey'    => '8fJDqwctqdFf',
			'clientSecret' => 'EFBoVjpjo9oVZKSEHZxO96jHpzU4tlbKzN6BowKOjLXvNPF2',
		),
		'postId' => get_the_id(),
	);
	wp_enqueue_script( 'oauth-demo-widget', plugins_url( 'js/oauth-demo-widget.js', __FILE__ ), array( 'jquery', 'wp-api', 'wp-backbone' ) );
	wp_localize_script( 'oauth-demo-widget', 'OAuthWidgetSettings', $OAuthWidgetSettings );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\oath_add_demo_widget_scripts' );

