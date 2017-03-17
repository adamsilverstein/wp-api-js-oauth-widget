<?php

class OauthDemoWidget extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'OAuth Demo Widget' );
	}

	function widget( $args, $instance ) {
		// Widget output
		?>
		<div class="oath-demo-widget">
			<form id="oauth-connect-form">
			<h3>OAuth Credentials</h3>
			<p>
				<div scope="row">
					<label for="oauth-site">WordPress Site</label>
				</div>
				<div>
					<input type="text" class="regular-text" name="oath-site" id="oauth-site" placeholder="http://yoursite.com" value="http://demo.localhost/">
				<p class="description">The URL of the WordPress site you want to connect to.</p>
				</div>
			</p>
			<p>
				<div scope="row">
					<label for="oauth-clientkey">Client Key</label>
				</div>
				<div>
					<input type="text" class="regular-text" name="oauth-clientkey" id="oauth-clientkey" placeholder="" value="BrJCeu1O2fOS">
				<p class="description"></p>
				</div>
			</p>
			<p>
				<div scope="row">
					<label for="oauth-clientsecret">Client Secret</label>
				</div>
				<div>
					<input type="text" class="regular-text" name="oauth-clientsecret" id="oauth-clientsecret" placeholder="" value="AaGkONzHucixHO9Mp5YuqFv3KJqWLwh9GkqSuNUh8KIsnckW">
				<p class="description"></p>
				</div>
			</p>
			<p class="submit">
				<input type="submit" name="submit-oauth-signup" id="submit-oauth-signup" class="button button-primary" value="Connect"
			></p>
			</form>
			<div class="oath-loader">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<style>
			.oath-demo-widget.loading form {
				display: none;
			}
			.oath-loader {
			text-align: center;
			display: none;
			}
			.oath-demo-widget.loading .oath-loader {
				display: inline-block;
			}
			.oath-loader span {
			display: inline-block;
			vertical-align: middle;
			width: 10px;
			height: 10px;
			margin: 50px auto;
			background: black;
			border-radius: 50px;
			-webkit-animation: loader 0.9s infinite alternate;
			-moz-animation: loader 0.9s infinite alternate;
			}
			.oath-loader span:nth-of-type(2) {
			-webkit-animation-delay: 0.3s;
			-moz-animation-delay: 0.3s;
			}
			.oath-loader span:nth-of-type(3) {
			-webkit-animation-delay: 0.6s;
			-moz-animation-delay: 0.6s;
			}
			@-webkit-keyframes loader {
			0% {
			width: 10px;
			height: 10px;
			opacity: 0.9;
			-webkit-transform: translateY(0);
			}
			100% {
			width: 24px;
			height: 24px;
			opacity: 0.1;
			-webkit-transform: translateY(-21px);
			}
			}
			@-moz-keyframes loader {
			0% {
			width: 10px;
			height: 10px;
			opacity: 0.9;
			-moz-transform: translateY(0);
			}
			100% {
			width: 24px;
			height: 24px;
			opacity: 0.1;
			-moz-transform: translateY(-21px);
			}
		}
		</style>
						<?php
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		// Output admin widget options form
	}
}
