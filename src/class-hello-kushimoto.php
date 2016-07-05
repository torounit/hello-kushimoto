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
	 * Hello_Kushimoto constructor.
	 */
	public function __construct() {

		load_plugin_textdomain( 'hello-kushimoto', false, HELLO_KUSHIMOTO_DOMAIN_PATH );

		$option_manager = new Hello_Kushimoto_Option_Manager();
		$speaker_seeker = new Hello_Kushimoto_Speaker_Seeker( $option_manager );
		new Hello_Kushimoto_Option_Page( $option_manager, $speaker_seeker );

		$speaker = $speaker_seeker->get_current_speaker();

		if ( $speaker ) {
			$this->speaker = $speaker;
			$this->initialize_modules();
		}

	}

	/**
	 * @throws Exception
	 */
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
