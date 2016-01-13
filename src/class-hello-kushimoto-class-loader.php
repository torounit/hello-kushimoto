<?php

/**
 * Class Hello_Kushimoto_Class_Loader
 */
class Hello_Kushimoto_Class_Loader {

	private $base_dir;

	/**
	 * Hello_Kushimoto_Class_Loader constructor.
	 *
	 * @param $base_dir
	 */
	public function __construct( $base_dir ) {

		$this->base_dir = $base_dir;
		$this->register_autoloader();

	}

	private function register_autoloader() {
		spl_autoload_register( array( $this, 'autoloader' ) );
	}

	/**
	 * @param $class_name
	 */
	public function autoloader( $class_name ) {
		$dir       = $this->base_dir;
		$file_name = 'class-' . strtolower( str_replace( '_', '-', $class_name ) ) . '.php';
		$file_path = $dir . '/' . $file_name;
		if ( is_readable( $file_path ) ) {
			include_once $file_path;
		}
	}
}



