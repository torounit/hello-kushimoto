<?php

/**
 * Getting a specific constant value.
 */
class Hello_Kushimoto_CLI extends WP_CLI_Command {

	/** @var Hello_Kushimoto_Speaker_Base */
	private static $speaker;

	/**
	 * @param Hello_Kushimoto_Speaker_Base $speaker
	 */
	public static function set_speaker( Hello_Kushimoto_Speaker_Base $speaker ) {
		self::$speaker = $speaker;
	}

	/**
	 * Hello Kushimoto.
	 *
	 */
	public function __invoke() {
		echo self::$speaker->speak();
		echo "\n";
	}

}

