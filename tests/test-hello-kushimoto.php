<?php

class Test_Hello_Kushimoto extends WP_UnitTestCase {

	public function test_shortcode() {
		$miyasan = new Miyasan();
		$words = $miyasan->get_words();
		$word = do_shortcode( '[kushimoto]' );
		$this->assertContains( $word, $words );
		$this->assertNotEmpty( $word );
	}
}