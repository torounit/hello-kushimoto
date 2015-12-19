<?php

/**
 * Class Hello_Kushimoto
 *
 * plugin core class.
 */


class Hello_Kushimoto {

	/** @var Hello_Kushimoto_Speaker */
	private $speaker;

	public function __construct() {

		load_plugin_textdomain( 'hello-kushimoto', false, plugin_basename( HELLO_KUSHIMOTO_DIR ) . '/languages' );

		new Hello_Kushimoto_Admin_Panel();

		$this->speaker = apply_filters( 'hello_kushimoto_speaker', new Miyasan() );

		$this->initialize_modules();

	}

	private function initialize_modules() {

		new Hello_Kushimoto_Dashboard_Widget( $this->speaker );
		new Hello_Kushimoto_Admin_Notices( $this->speaker );
		new Hello_Kushimoto_Shortcode( $this->speaker );

		if ( defined( 'WP_CLI' ) and WP_CLI ) {
			Hello_Kushimoto_CLI::set_speaker( $this->speaker );
			WP_CLI::add_command( 'hello-kushimoto', 'Hello_Kushimoto_CLI' );
		}
	}

}
