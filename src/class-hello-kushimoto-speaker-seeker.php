<?php

/**
 * Class Hello_Kushimoto_Speaker_Seeker
 *
 * Search concrete Speaker class from 'src/speaker/concrete'.
 */
class Hello_Kushimoto_Speaker_Seeker {

	/**
	 * @return array
	 */
	public function search_classes() {

		$files = glob( HELLO_KUSHIMOTO_DIR . '/src/speaker/concrete/*.php' );

		if( empty( $files ) ) {
			return array();
		}

		if( !is_array( $files ) ) {
			return array();
		}

		$class_names = array_map( array( $this, 'convert_to_class_name' ), $files );
		return array_filter( $class_names , array( $this, 'class_exists')) ;

	}

	/**
	 * @param $filename
	 *
	 * @return string
	 */
	public function convert_to_class_name( $filename ) {
		$basename  = basename( $filename, '.php' );
		$words = explode( '-', str_replace( 'class-', '', $basename ) );
		return implode( '_', array_map( 'ucfirst', $words ) );
	}

	public function class_exists( $class_name ) {
		return class_exists( $class_name, true );
	}
}
