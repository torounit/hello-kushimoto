<?php

/**
 * Class Hello_Kushimoto_Shortcode
 *
 * Shortcode [kushimoto]
 */
class Hello_Kushimoto_Shortcode {

	/** @var Hello_Kushimoto_Speaker */
	private $speaker;

	/**
	 * @param Hello_Kushimoto_Speaker $speaker
	 */
	public function __construct( Hello_Kushimoto_Speaker $speaker ) {

		$this->speaker = $speaker;
		$this->register_shortcode();
	}

	/**
	 * register shortcode [kushimoto]
	 */
	private function register_shortcode() {
		$shortcode_tags = apply_filters( 'hello_kushimoto_shortcode_name', 'kushimoto' );
		add_shortcode( $shortcode_tags, array( $this->speaker, 'speak' ) );
	}
}
