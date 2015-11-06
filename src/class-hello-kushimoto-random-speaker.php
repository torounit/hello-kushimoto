<?php

/**
 * Created by PhpStorm.
 * User: torounit
 * Date: 15/11/03
 * Time: 16:53
 */
abstract class Hello_Kushimoto_Random_Speaker extends Hello_Kushimoto_Speaker {

	/**
	 * @var string
	 */
	protected $name = "unknown";

	/**
	 * @return string Name
	 */
	public function whoami() {
		return $this->name;
	}

	/**
	 * @return String
	 */
	public function say() {
		$words = $this->get_words();

		$word =  $words[ array_rand( $words ) ];
		return apply_filters( 'miyasan_say', $word );
	}

	/**
	 * @return String[]
	 */
	abstract public function get_words();

}