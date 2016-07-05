<?php

/**
 * Class Hello_Kushimoto_Speaker_Seeker
 *
 * Search concrete Speaker class from 'src/speaker/concrete'.
 */
class Hello_Kushimoto_Speaker_Seeker {

	/**
	 * @var Hello_Kushimoto_Option_Manager
	 */
	private $option_manager;

	/**
	 * @var array
	 */

	private $classes;

	/**
	 * Hello_Kushimoto_Speaker_Seeker constructor.
	 *
	 * @param Hello_Kushimoto_Option_Manager $option_manager
	 */
	public function __construct( Hello_Kushimoto_Option_Manager $option_manager ) {
		$this->option_manager = $option_manager;
		$this->classes = array();
	}

	/**
	 * @return array
	 */
	public function search_classes() {

		if ( ! empty( $this->classes ) ) {
			return $this->classes;
		}

		$files = glob( HELLO_KUSHIMOTO_DIR . '/src/speaker/concrete/*.php' );

		if ( empty( $files ) ) {
			return array();
		}

		if ( ! is_array( $files ) ) {
			return array();
		}

		$class_names = array_map( array( $this, 'convert_to_class_name' ), $files );
		$this->classes = array_filter( $class_names, array( $this, 'class_exists' ) );
		return $this->classes;

	}

	/**
	 * @param $filename
	 *
	 * @return string
	 */
	private function convert_to_class_name( $filename ) {
		$basename = basename( $filename, '.php' );
		$words    = explode( '-', str_replace( 'class-', '', $basename ) );

		return implode( '_', array_map( 'ucfirst', $words ) );
	}

	/**
	 * @param $class_name
	 *
	 * @return bool
	 */
	private function class_exists( $class_name ) {
		return class_exists( $class_name, true );
	}


	/**
	 * @return Hello_Kushimoto_Speaker[]
	 */
	public function get_all_speakers() {

		$classes  = $this->search_classes();
		$speakers = array_map( array( $this, 'create_speaker' ), $classes );

		return array_filter( $speakers );
	}


	/**
	 * @param $speaker_class_name
	 *
	 * @return Hello_Kushimoto_Speaker|null
	 */
	private function create_speaker( $speaker_class_name ) {
		if ( $this->class_exists( $speaker_class_name ) ) {
			$speaker = new $speaker_class_name();
			if ( $speaker instanceof Hello_Kushimoto_Speaker ) {
				return new $speaker;
			}
		}

		return null;
	}

	/**
	 *
	 * Factory Method for Speaker.
	 *
	 * @return Hello_Kushimoto_Speaker|void
	 */
	public function get_current_speaker() {
		$speaker_class = $this->option_manager->get_speaker_name();

		return apply_filters( 'hello_kushimoto_speaker', $this->create_speaker( $speaker_class ) );

	}
}
