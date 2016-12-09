<?php

/**
 * Class Hello_Kushimoto_Admin_Notices
 *
 * View class for render admin_notices.
 */
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
		$chosen = apply_filters( 'hello_kushimoto_admin_notices_word', $this->speaker->speak() );
		$name   = strtolower( get_class( $this->speaker ) );
		?><p class="hello-kushimoto speaker-<?php echo esc_attr( $name );?>"><?php echo  esc_html( $chosen );?></p><?php
	}

	/**
	 * add styles.
	 */
	public function add_style() {

		wp_enqueue_style(
			'hello-kushimoto-admin-notices',
			plugins_url( 'assets/styles/hello-kushimoto-admin-notices.css', HELLO_KUSHIMOTO_FILE ),
			array(),
			HELLO_KUSHIMOTO_VERSION
		);
		if ( is_rtl() ) {
			wp_enqueue_style(
				'hello-kushimoto-admin-notices-rtl',
				plugins_url( 'assets/styles/hello-kushimoto-admin-notices-rtl.css', HELLO_KUSHIMOTO_FILE ),
				array( 'hello-kushimoto-admin-notices' ),
				HELLO_KUSHIMOTO_VERSION
			);
		}

	}
}
