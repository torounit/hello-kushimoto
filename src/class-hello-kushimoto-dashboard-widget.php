<?php

class Hello_Kushimoto_Dashboard_Widget {

	/** @var Hello_Kushimoto_Random_Speaker */
	private $speaker;

	public function __construct( Hello_Kushimoto_Speaker $speaker ) {

		$this->speaker = $speaker;
		add_action( 'wp_dashboard_setup', array( $this, 'setup' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_style'));
	}

	public function setup() {
		wp_add_dashboard_widget(
			'hello_kushimoto_widget',
			'Hello Kushimoto',
			array( $this, 'render' )
		);
	}

	public function render() {
		?>
		<div class="hello-kushimoto-dashboard-widget">
			<img alt="" src="https://ps.w.org/hello-kushimoto/assets/icon.svg" class="avatar avatar-50 hello-kushimoto-dashboard-widget-avatar" height="50" width="50">
			<div class="hello-kushimoto-dashboard-widget-message">
				<strong><?php echo esc_html( $this->speaker->speak() );?></strong>
			</div>
		</div>
		<?php
	}

	public function enqueue_style() {
		wp_enqueue_style(
				'hello-kushimoto-dashboard-widget',
				plugins_url( 'assets/styles/dashboard-widget.css', HELLO_KUSHIMOTO_FILE )
		);
	}
}