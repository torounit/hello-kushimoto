<?php

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = '/tmp/wordpress-tests-lib';
}

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/hello-kushimoto.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );


function _remove_action_hello_kushimoto_init() {
	remove_action( 'wp_loaded', 'hello_kushimoto_init' );
}
tests_add_filter( 'plugins_loaded', '_remove_action_hello_kushimoto_init');

require $_tests_dir . '/includes/bootstrap.php';
