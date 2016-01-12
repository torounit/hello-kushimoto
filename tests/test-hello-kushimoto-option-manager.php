<?php

class Test_Hello_Kushimoto_Option_Manager extends WP_UnitTestCase {



	public function test_get_option() {
		$option_manager = new Hello_Kushimoto_Option_Manager();
		$options = $option_manager->get_options();
		$this->assertTrue( is_array( $options ) );
		$this->assertArrayHasKey( 'speaker', $options );
	}
}
