<?php

/*
Plugin Name: Hello Kushimoto
Plugin URI: https://github.com/torounit/hello-kushimoto/
Version: 2.2.2
Description: This is not just a plugin. When activated you will randomly see a Quotations of legendry engineer Mr. M in the upper right of your admin screen on every page.
Author: Toro_Unit
Author URI: https://github.com/torounit/
Text Domain: hello-kushimoto
Domain Path: /languages
*/


/**
 * Autoloader
 * @param string $class_name
 */
function hello_kushimoto_class_loader( $class_name ) {
	$dir = dirname( __FILE__ );
	$file_name = 'class-'.strtolower( str_replace('_', '-', $class_name) ).'.php';
	$file_path = $dir . '/src/'. $file_name;
	if ( is_readable( $file_path ) ) {
		include $file_path;
	}
}
spl_autoload_register( 'hello_kushimoto_class_loader' );



/**
 * run plugin.
 */
function hello_kushimoto_init() {
	$speaker = apply_filters( 'hello_kushimoto_speaker', new Miyasan() );
	new Hello_Kushimoto( $speaker );
	load_plugin_textdomain( 'hello-kushimoto', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}

add_action( 'plugins_loaded', 'hello_kushimoto_init' );
