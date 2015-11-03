<?php

/*
Plugin Name: Hello Kushimoto
Version: 2.0.0
Description: This is not just a plugin. When activated you will randomly see a Quotations of legendry engineer Mr. M in the upper right of your admin screen on every page.
Author: Toro_Unit
Text Domain: hello-kushimoto
Domain Path: /languages
*/


require "src/class-hello-kushimoto.php";
require "src/class-hello-kushimoto-speaker.php";
require "src/class-miyasan.php";


/**
 * run plugin.
 */
function hello_kushimoto_init() {
	$speaker = apply_filters( 'hello_kushimoto_speaker', new Miyasan() );
	new Hello_Kushimoto( $speaker );
}

add_action( 'plugins_loaded', 'hello_kushimoto_init' );
