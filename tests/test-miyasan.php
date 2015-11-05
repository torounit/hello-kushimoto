<?php

class Test_Miyasan extends WP_UnitTestCase {

	public function test_get_words() {
		$miyasan = new Miyasan();
		$words   = $miyasan->get_words();
		$this->assertTrue( is_array( $words ) );

	}

	public function test_say() {
		$miyasan = new Miyasan();
		$miyasan->say();
		$this->assertTrue( is_string( $miyasan->say() ) );
		$this->assertNotEmpty( $miyasan->say() );
	}

	public function test_name() {
		$miyasan = new Miyasan();
		$name    = $miyasan->whoami();
		$this->assertTrue( is_string( $name ) );
		$this->assertRegExp( '/-?[_a-zA-Z]+[_a-zA-Z0-9-]*/', $name );
	}
}