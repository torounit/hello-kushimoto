<?php

/*
Plugin Name: Hello Kushimoto
Plugin URI: https://github.com/torounit/hello-kushimoto/
Version: 2.5.1
Description: This is not just a plugin. When activated you will randomly see a Quotations of legendry engineer Mr. M in the upper right of your admin screen on every page.
Author: Toro_Unit
Author URI: https://github.com/torounit/
Text Domain: hello-kushimoto
Domain Path: /languages
*/

require 'src/class-hello-kushimoto-class-loader.php';

function hello_kushimoto_class_loaders_init() {
	$file_dir = dirname( __FILE__ );
	new Hello_Kushimoto_Class_Loader( $file_dir . '/src' );
	new Hello_Kushimoto_Class_Loader( $file_dir . '/src/speaker/abstract' );
	new Hello_Kushimoto_Class_Loader( $file_dir . '/src/speaker/concrete' );
}

hello_kushimoto_class_loaders_init();


/**
 * @return array
 */
function hello_kushimoto_get_plugin_data() {
	$headers = array(
		'Name' => 'Plugin Name',
		'PluginURI' => 'Plugin URI',
		'Version' => 'Version',
		'Description' => 'Description',
		'Author' => 'Author',
		'AuthorURI' => 'Author URI',
		'TextDomain' => 'Text Domain',
		'DomainPath' => 'Domain Path',
		'Network' => 'Network',
	);
	return get_file_data( __FILE__, $headers );
}


define( 'HELLO_KUSHIMOTO_DIR', dirname( __FILE__ ) );
define( 'HELLO_KUSHIMOTO_FILE', __FILE__ );
$hello_kushimoto_data = hello_kushimoto_get_plugin_data();
define( 'HELLO_KUSHIMOTO_VERSION', $hello_kushimoto_data['Version'] );


/**
 * run plugin.
 */
function hello_kushimoto_init() {

	new Hello_Kushimoto();
}

add_action( 'wp_loaded', 'hello_kushimoto_init' );
