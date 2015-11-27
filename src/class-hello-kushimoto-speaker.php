<?php

/**
 * abstract class Hello_Kushimoto_Speaker
 */
abstract class Hello_Kushimoto_Speaker {

	/**
	 * @return string
	 */
	abstract public function whoami();

	/**
	 * @param int $size
	 * @return false|string
	 */
	public function get_avatar( $size = 50 ) {
		return get_avatar( 0, $size, get_option( 'avatar_default', 'mystery' ), $this->whoami() );
	}

	/**
	 * @return string
	 */
	abstract public function say();

	/**
	 * @return string
	 */
	final public function speak() {
		return apply_filters( 'hello_kushimoto_speak', $this->say() );
	}
}
