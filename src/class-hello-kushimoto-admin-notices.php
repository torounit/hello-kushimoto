<?php

class Hello_Kushimoto_Admin_Notices {

	/** @var Hello_Kushimoto_Speaker */
	private $speaker;

	/**
	 * @param Hello_Kushimoto_Speaker $speaker
	 */
	public function __construct( Hello_Kushimoto_Speaker $speaker ) {

		$this->speaker = $speaker;

		add_action( 'admin_enqueue_scripts', array( $this, 'add_style' ) );
		add_action( 'admin_notices', array( $this, 'render' ) );
	}

	/**
	 * show text in admin.
	 */
	public function render() {
		$chosen = $this->speaker->speak();
		$name   = $this->speaker->whoami();
		echo "<p class='hello-kushimoto speaker-$name'>$chosen</p>";
	}

	/**
	 * add styles.
	 */
	public function add_style() {

		$x     = is_rtl() ? 'left' : 'right';
		$style = "
			.hello-kushimoto {
				float: $x;
				padding-$x: 15px;
				padding-top: 5px;
				margin: 0;
				font-size: 11px;
			}
			";
		wp_add_inline_style( 'wp-admin', apply_filters( 'hello_kushimoto_style', $style ) );
	}
}