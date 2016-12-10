<?php

/**
 * Class Hello_Kushimoto_Option_Manager
 *
 * Management Plugin Option.
 */

class Hello_Kushimoto_Option_Manager {


	/**
	 * Hello_Kushimoto_Option constructor.
	 */
	public function __construct() {
		register_activation_hook( HELLO_KUSHIMOTO_FILE, array( __CLASS__, 'register_uninstall_hook' ) );
	}

	/**
	 * Register uninstall hooks. fire on activate this plugin.
	 */
	public static function register_uninstall_hook() {
		register_uninstall_hook( HELLO_KUSHIMOTO_FILE, array( __CLASS__, 'uninstall' ) );
	}

	/**
	 * Action for uninstall.
	 */
	public static function uninstall() {
		delete_option( 'hello_kushimoto_speaker' );
	}


	/**
	 * @return string
	 */
	public function get_speaker_name() {
		return get_option( 'hello_kushimoto_speaker', 'Miyasan' );
	}
}
