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
			<div class="hello-kushimoto-dashboard-widget-avatar">
				<?php echo $this->speaker->get_avatar(); ?>
			</div>

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