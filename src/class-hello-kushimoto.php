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
		add_shortcode( $shortcode_tags, array( $this->speaker, 'talk_message' ) );
	}

	/**
	 * show text in admin.
	 */
	public function render() {
		$chosen = $this->speaker->talk_message();
		echo "<p class='hello-kushimoto'>$chosen</p>";
	}

	/**
	 * add styles.
	 */
	public function add_style() {

		$x = is_rtl() ? 'left' : 'right';
		$style = "
        .hello-kushimoto {
            float: $x;
            padding-$x: 15px;
            padding-top: 5px;
            padding-right: 70px;
            margin: 0;
            font-size: 11px;
            background: #fff url('https://avatars0.githubusercontent.com/u/309946?v=3&s=50') no-repeat;
            color: #444;
            border: 1px solid #E5E5E5;
            border-radius: 1px;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.04);
        }
        ";
		wp_add_inline_style( 'wp-admin', $style );
	}
}
