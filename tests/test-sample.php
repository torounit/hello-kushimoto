<?php

class SampleTest extends WP_UnitTestCase {

	public function test_shortcode() {
		$miyasan = new Miyasan();
		$words = $miyasan->getWords();
		$word = do_shortcode( '[kushimoto]' );
		$this->assertContains( $word, $words );
	}
}