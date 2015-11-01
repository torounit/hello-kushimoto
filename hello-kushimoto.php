<?php

/*
Plugin Name: Hello-kushimoto
Version: 1.0
Description: PLUGIN DESCRIPTION HERE
Author: Toro_Unit
Text Domain: hello-kushimoto
Domain Path: /languages
*/

Class Hello_Kushimoto {

	private $megumi;

	public function __construct( Megumi $megumi ) {

		$this->megumi = $megumi;

		add_action( 'admin_head', array( $this, 'admin_head' ) );
		add_action( 'admin_notices', array( $this, 'admin_notices' ) );
		add_shortcode( 'kushimoto', array( $this->megumi, 'say' ) );
	}

	public function admin_notices() {
		$chosen = $this->megumi->say();
		echo "<p id='kusimoto'>$chosen</p>";
	}

	public function admin_head() {
		$x = is_rtl() ? 'left' : 'right';

		echo "
        <style type='text/css'>
        #kusimoto {
            float: $x;
            padding-$x: 15px;
            padding-top: 5px;
            margin: 0;
            font-size: 11px;
        }
        </style>
        ";
	}


}

interface Megumi {

	public function say();
}

Class Miyasan implements Megumi {

	public function say() {

		$words = explode( "\n", $this->getWords() );
		return wptexturize( $words[ mt_rand( 0, count( $words ) - 1 ) ] );
	}

	public function getWords() {
		return  "Hello, Dolly
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
	}



}

function hello_kushimoto_init() {
	$miyasan = new Miyasan();
	new Hello_Kushimoto( $miyasan );
}

add_action( 'plugins_loaded', 'hello_kushimoto_init' );
