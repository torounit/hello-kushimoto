<?php

/**
 * Class Hello_Kushimoto
 *
 * plugin core class.
 */


class Hello_Kushimoto {

	/** @var Hello_Kushimoto_Speaker */
	private $speaker;

	/** @var Hello_Kushimoto_Option_Manager  */
	private $option_manager;

	/** @var Hello_Kushimoto_Speaker_Seeker  */
	private $speaker_seeker;

	/**
	 * Hello_Kushimoto constructor.
	 */
	public function __construct() {

		load_plugin_textdomain( 'hello-kushimoto', false, plugin_basename( HELLO_KUSHIMOTO_DIR ) . '/languages' );

		$this->option_manager = new Hello_Kushimoto_Option_Manager();
		$this->speaker_seeker = new Hello_Kushimoto_Speaker_Seeker();
		new Hello_Kushimoto_Admin_Panel( $this->option_manager,$this->speaker_seeker );

		$speaker_class = $this->option_manager->get_speaker();

		if( class_exists( $speaker_class, true ) ) {
			$speaker       = new $speaker_class;
			$this->speaker = apply_filters( 'hello_kushimoto_speaker', $speaker );
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
