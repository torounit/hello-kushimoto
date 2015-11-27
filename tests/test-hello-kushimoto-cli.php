<?php

abstract class WP_CLI_Command {
	public function __construct() {}
}


class Test_Hello_Kushimoto_CLI  extends WP_UnitTestCase {

	public function test_invoke() {
		$speaker = new Miyasan();
		Hello_Kushimoto_CLI::set_speaker( $speaker );
		ob_start();
		$cli = new Hello_Kushimoto_CLI();
		$cli();
		$word = trim(ob_get_clean());
		$this->assertNotEmpty( $word );
		$words = $speaker->get_words();
		$this->assertContains( $word, $words );

	}
}