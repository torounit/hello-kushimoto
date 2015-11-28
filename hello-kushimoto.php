<?php

/*
Plugin Name: Hello Kushimoto
Plugin URI: https://github.com/torounit/hello-kushimoto/
Version: 2.3.0
Description: This is not just a plugin. When activated you will randomly see a Quotations of legendry engineer Mr. M in the upper right of your admin screen on every page.
Author: Toro_Unit
Author URI: https://github.com/torounit/
Text Domain: hello-kushimoto
Domain Path: /languages
*/

require 'autoloader.php';

define( 'HELLO_KUSHIMOTO_FILE', __FILE__ );
define( 'HELLO_KUSHIMOTO_DIR', dirname( __FILE__ ) );


/**
 * run plugin.
 */
function hello_kushimoto_init() {

	$speaker = apply_filters( 'hello_kushimoto_speaker', new Miyasan() );
	new Hello_Kushimoto( $speaker );
}

add_action( 'wp_loaded', 'hello_kushimoto_init' );
