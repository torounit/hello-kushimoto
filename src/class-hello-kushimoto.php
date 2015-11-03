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

		add_action( 'admin_enqueue_scripts', array( $this, 'add_style' ) );
		add_action( 'admin_notices', array( $this, 'render' ) );

		$this->register_shortcode();
	}

	/**
	 * register shortcode [kushimoto]
	 */
	private function register_shortcode() {
		$shortcode_tags = apply_filters( 'hello_kushimoto_shortcode_name', 'kushimoto' );
		add_shortcode( $shortcode_tags, array( $this->speaker, 'say' ) );
	}

	/**
	 * show text in admin.
	 */
	public function render() {
		$chosen = $this->speaker->say();
		echo "<p id='kusimoto'>$chosen</p>";
	}

	/**
	 * add styles.
	 */
	public function add_style() {

		$x = is_rtl() ? 'left' : 'right';
		$style = "
        #kusimoto {
            float: $x;
            padding-$x: 15px;
            padding-top: 5px;
            margin: 0;
            font-size: 11px;
        }
        ";
		wp_add_inline_style( 'wp-admin', $style );
	}
}
