<?php


class Test_Hello_Kushimoto_Speaker_Seeker extends WP_UnitTestCase {

	public function test_search() {
		$seeker      = new Hello_Kushimoto_Speaker_Seeker();
		$class_names = $seeker->search_classes();
		$this->assertTrue( is_array( $class_names ) );
		$this->assertNotEmpty( $class_names );

		foreach ( $class_names as $class_name ) {
			$this->assertTrue( class_exists( $class_name, true ) );
		}
	}

	public function test_convert_name() {
		$seeker   = new Hello_Kushimoto_Speaker_Seeker();
		$expected = 'Miyasan';
		$actual   = $seeker->convert_to_class_name( HELLO_KUSHIMOTO_DIR . '/src/speaker/concrete/class-miyasan.php' );
		$this->assertEquals( $expected, $actual );
	}
}
