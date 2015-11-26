<?php

/**
 * Class Hello_Kushimoto
 *
 * plugin core class.
 */
class Hello_Kushimoto {

	/** @var Hello_Kushimoto_Speaker */
	private $speaker;

	/**
	 * @param Hello_Kushimoto_Speaker $speaker
	 */
	public function __construct( Hello_Kushimoto_Speaker $speaker ) {

		$this->speaker = $speaker;

		new Hello_Kushimoto_Admin_Notices( $speaker );
		new Hello_Kushimoto_Shortcode( $speaker );
	}

}
