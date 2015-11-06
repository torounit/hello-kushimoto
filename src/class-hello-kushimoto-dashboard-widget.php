<?php

class Hello_Kushimoto_Dashboard_Widget {

	/** @var Hello_Kushimoto_Random_Speaker */
	private $speaker;

	public function __construct( Hello_Kushimoto_Speaker $speaker ) {

		$this->speaker = $speaker;
		add_action( 'wp_dashboard_setup', [ $this, 'setup' ] );
	}

	public function setup() {
		wp_add_dashboard_widget(
			'hello_kushimoto_widget',
			'Hello Kushimoto Widget',
			[ $this, 'render' ]
		);
	}

	public function render() {
		echo '<p>' . esc_html( $this->speaker->talk_message() ) . '</p>';
	}
}