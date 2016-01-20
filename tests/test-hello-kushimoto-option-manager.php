<?php

class Test_Hello_Kushimoto_Option_Manager extends WP_UnitTestCase {


	public function test_get_speaker_name() {
		$option_manager = new Hello_Kushimoto_Option_Manager();
		$options        = $option_manager->get_speaker_name();
		$this->assertTrue( class_exists( $options, true ) );
	}
}
