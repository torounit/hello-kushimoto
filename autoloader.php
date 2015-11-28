<?php

/**
 * Autoloader
 *
 * @param string $class_name
 */
function hello_kushimoto_class_loader( $class_name ) {
	$dir       = dirname( __FILE__ );
	$file_name = 'class-' . strtolower( str_replace( '_', '-', $class_name ) ) . '.php';
	$file_path = $dir . '/src/' . $file_name;
	if ( is_readable( $file_path ) ) {
		include $file_path;
	}
}

spl_autoload_register( 'hello_kushimoto_class_loader' );

function hello_kushimoto_speaker_class_loader( $class_name ) {
	$dir       = dirname( __FILE__ );
	$file_name = 'class-' . strtolower( str_replace( '_', '-', $class_name ) ) . '.php';
	$file_path = $dir . '/src/speaker/' . $file_name;
	if ( is_readable( $file_path ) ) {
		include $file_path;
	}
}
spl_autoload_register( 'hello_kushimoto_speaker_class_loader' );
