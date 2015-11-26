<?php

/**
 * Class Hello_Kushimoto
 *
 * plugin core class.
 */
class Hello_Kushimoto {

	/** @var Hello_Kushimoto_Speaker */
	private $speaker;

	/**
	 * @param Hello_Kushimoto_Speaker $speaker
	 */
	public function __construct( Hello_Kushimoto_Speaker $speaker ) {

		load_plugin_textdomain( 'hello-kushimoto', false, plugin_basename( HELLO_KUSHIMOTO_DIR ) . '/languages' );

		$this->speaker = $speaker;

		new Hello_Kushimoto_Admin_Notices( $speaker );
		new Hello_Kushimoto_Shortcode( $speaker );

		if ( defined( 'WP_CLI' ) and WP_CLI ) {
			Hello_Kushimoto_CLI::set_speaker( $speaker );
			WP_CLI::add_command( 'hello-kushimoto', 'Hello_Kushimoto_CLI' );
		}
	}

}
