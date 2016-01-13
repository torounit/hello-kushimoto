<?php

/**
 * Class Taruwapuu
 */
class Taru_Wapuu extends Hello_Kushimoto_Random_Speaker_Base {

	/**
	 * @var string NickName
	 */
	protected $name = 'Taru Wapuu';


	/**
	 * @param int $size
	 *
	 * @return string
	 */
	public function get_avatar( $size = 50 ) {
		$src = 'https://wordbash.github.io/kyoto-vol1/assets/dest/images/wapuu.svg';
		return '<img alt="" src="' . $src . '" class="avatar avatar-50" height="' . esc_attr( $size ) . '" width="' . esc_attr( $size ) . '">
';

	}

	/**
	 *
	 * @return String[]
	 */
	public function get_words() {
		return array(
			__( 'Cheers!', 'hello-kushimoto' ),
			__( 'カンパーイ!', 'hello-kushimoto' ),
			__( 'おさけがのみたーい', 'hello-kushimoto' ),
			__( 'びーるがたりなーい', 'hello-kushimoto' ),
			__( 'I want Beer!!!', 'hello-kushimoto' ),
			__( 'びーるがたりなーい', 'hello-kushimoto' ),
		);
	}


}
