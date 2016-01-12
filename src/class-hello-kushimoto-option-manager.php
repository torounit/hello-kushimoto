<?php

class Hello_Kushimoto_Option_Manager {

	const OPTION_NAME = 'hello_kushimoto_options';

	/**
	 * Hello_Kushimoto_Option constructor.
	 */
	public function __construct() {
		register_uninstall_hook( HELLO_KUSHIMOTO_FILE, array( __CLASS__, 'uninstall' ) );
	}

	public static function uninstall() {
		delete_option( 'hello_kushimoto_options' );
	}

	/**
	 * @return string
	 */
	public function get_option_name() {
		return self::OPTION_NAME;
	}

	/**
	 * @return array
	 */
	public function get_options() {
		return get_option( 'hello_kushimoto_options', array(
			'speaker' => 'Miyasan'
		) );
	}

	/**
	 * @return string
	 */
	public function get_speaker() {
		$options = $this->get_options();
		return $options['speaker'];
	}
}
