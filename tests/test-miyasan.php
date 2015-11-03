<?php

class Test_Miyasan extends WP_UnitTestCase {

	public function test_getwords() {
		$miyasan = new Miyasan();
		$words = $miyasan->getWords();
		$this->assertTrue( is_array( $words ) );

	}

	public function test_say() {
		$miyasan = new Miyasan();
		$miyasan->say();
		$this->assertTrue( is_string( $miyasan->say() ) );
		$this->assertNotEmpty( $miyasan->say() );
	}
}