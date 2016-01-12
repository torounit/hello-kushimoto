<?php

require_once 'mock/class-speaker-mock.php';


class Test_Hello_Kushimoto_Admin_Notices extends WP_UnitTestCase {

	public function test_enqueue_style() {

		$admin_notices = new Hello_Kushimoto_Admin_Notices( new Speaker_Mock() );
		$admin_notices->add_style();
		$this->assertTrue( wp_style_is( 'hello-kushimoto-admin-notices' ) );
		$this->assertFalse( wp_style_is( 'hello-kushimoto-admin-notices-rtl' ) );

	}

	public function test_enqueue_rtl_style() {
		global $wp_locale;
		$wp_locale->text_direction = 'rtl';
		$admin_notices             = new Hello_Kushimoto_Admin_Notices( new Speaker_Mock() );
		$admin_notices->add_style();
		$this->assertTrue( wp_style_is( 'hello-kushimoto-admin-notices' ) );
		$this->assertTrue( wp_style_is( 'hello-kushimoto-admin-notices-rtl' ) );
	}

	public function test_render() {
		$this->expectOutputString( "<p class='hello-kushimoto speaker-speaker_mock'>I'm Dummy Speaker.</p>" );
		$admin_notices = new Hello_Kushimoto_Admin_Notices( new Speaker_Mock() );
		$admin_notices->render();
	}
}
