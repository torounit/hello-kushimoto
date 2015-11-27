<?php

class Test_Hello_Kushimoto_Shortcode extends WP_UnitTestCase {

	private $speaker;

	public function setUp() {
		parent::setUp();

		$this->speaker = apply_filters( 'hello_kushimoto_speaker', new Miyasan() );
		new Hello_Kushimoto( $this->speaker );
	}

	public function test_shortcode() {
		$word = do_shortcode( '[kushimoto]' );
		$words = $this->speaker->get_words();
		$this->assertContains( $word, $words );
		$this->assertNotEmpty( $word );
	}
}