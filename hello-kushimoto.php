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
		return "hello";
	}

}

function hello_kushimoto_init() {
	$miyasan = new Miyasan();
	new Hello_Kushimoto( $miyasan );
}

add_action( 'plugins_loaded', 'hello_kushimoto_init' );
