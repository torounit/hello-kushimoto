<?php

/**
 * Class Louis_Armstrong
 *
 * @package hello-kushimoto
 */
class Louis_Armstrong extends Hello_Kushimoto_Speaker {

	/**
	 * NickName
	 * @var string
	 */
	protected $name = 'Louis Armstrong';


	/**
	 * Get Avatar.
	 * @param int $size
	 *
	 * @return string
	 */
	public function get_avatar( $size = 50 ) {
		$src = 'https://ps.w.org/hello-dolly/assets/icon-256x256.jpg';

		return '<img alt="" src="' . $src . '" class="avatar avatar-50" height="' . esc_attr( $size ) . '" width="' . esc_attr( $size ) . '">
';

	}

	/**
	 *
	 * @return String
	 */
	public function say() {

		$lyrics = "Hello, Dolly
Well, hello, Dolly
It's so nice to have you back where you belong
You're lookin' swell, Dolly
I can tell, Dolly
You're still glowin', you're still crowin'
You're still goin' strong
We feel the room swayin'
While the band's playin'
One of your old favourite songs from way back when
So, take her wrap, fellas
Find her an empty lap, fellas
Dolly'll never go away again
Hello, Dolly
Well, hello, Dolly
It's so nice to have you back where you belong
You're lookin' swell, Dolly
I can tell, Dolly
You're still glowin', you're still crowin'
You're still goin' strong
We feel the room swayin'
While the band's playin'
One of your old favourite songs from way back when
Golly, gee, fellas
Find her a vacant knee, fellas
Dolly'll never go away
Dolly'll never go away
Dolly'll never go away again";

		// Here we split it into lines
		$lyrics = explode( "\n", $lyrics );

		// And then randomly choose a line
		return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
	}
}
