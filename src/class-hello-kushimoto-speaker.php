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
	 * @return string
	 */
	abstract public function say();

	/**
	 * @return string
	 */
	final public function talk_message() {
		return apply_filters( 'hello_kushimoto_talk_message', $this->say() );
	}
}
