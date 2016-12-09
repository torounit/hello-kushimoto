<?php

/**
 * Hello Kushimoto
 *
 * @package Hello_Kushimoto
 * @version 2.10.0
 */


/*
Plugin Name: Hello Kushimoto
Plugin URI: https://github.com/torounit/hello-kushimoto/
Version: 2.10.0
Description: This is not just a plugin. When activated you will randomly see a Quotations of legendary engineer Mr. M in the upper right of your admin screen on every page.
Author: Toro_Unit
Author URI: https://github.com/torounit/
Text Domain: hello-kushimoto
Domain Path: /languages
*/

require_once 'src/class-hello-kushimoto-class-loader.php';

$hello_kushimoto_data = get_file_data( __FILE__, array(
	'Name' => 'Plugin Name',
	'PluginURI' => 'Plugin URI',
	'Version' => 'Version',
	'Description' => 'Description',
	'Author' => 'Author',
	'AuthorURI' => 'Author URI',
	'TextDomain' => 'Text Domain',
	'DomainPath' => 'Domain Path',
	'Network' => 'Network',
) );
define( 'HELLO_KUSHIMOTO_FILE', __FILE__ );
define( 'HELLO_KUSHIMOTO_DIR', dirname( __FILE__ ) );
define( 'HELLO_KUSHIMOTO_VERSION', $hello_kushimoto_data['Version'] );
define( 'HELLO_KUSHIMOTO_DOMAIN_PATH',  plugin_basename( HELLO_KUSHIMOTO_DIR ) . $hello_kushimoto_data['DomainPath'] );


new Hello_Kushimoto_Class_Loader( HELLO_KUSHIMOTO_DIR . '/src' );
new Hello_Kushimoto_Class_Loader( HELLO_KUSHIMOTO_DIR . '/src/speaker/abstract' );
new Hello_Kushimoto_Class_Loader( HELLO_KUSHIMOTO_DIR . '/src/speaker/concrete' );

/**
 * run plugin.
 */
function hello_kushimoto_init() {

	new Hello_Kushimoto();

}

add_action( 'wp_loaded', 'hello_kushimoto_init' );
