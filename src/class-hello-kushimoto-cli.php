<?php

/**
 * Getting a specific constant value.
 */
class Hello_Kushimoto_CLI extends WP_CLI_Command {

	/** @var Hello_Kushimoto_Speaker */
	private static $speaker;

	/**
	 * @param Hello_Kushimoto_Speaker $speaker
	 */
	public static function set_speaker( Hello_Kushimoto_Speaker $speaker ) {
		self::$speaker = $speaker;
	}

	/**
	 * Hello Kushimoto.
	 */
	public function __invoke() {
		echo esc_html( self::$speaker->speak() );
		echo "\n";
	}
}

