<?php

class Hello_Kushimoto_Admin_Panel {


	public function __construct() {

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );
	}

	public function admin_menu() {

		add_options_page(
			__( 'Hello Kushimoto', 'hello-kushimoto' ),
			__( 'Hello Kushimoto', 'hello-kushimoto' ),
			'manage_options',
			'hello-kushimoto',
			array( $this, 'options_page' )
		);
	}

	public function admin_init() {
		if ( ! empty( $_POST['_wpnonce_hello_kushimoto'] ) ) {
			check_admin_referer( 'hello-kushimoto', '_wpnonce_hello_kushimoto' );
			wp_safe_redirect( menu_page_url( 'hello-kushimoto', false ) );
		}

	}

	public function options_page() {
		?>
		<div id="hello_kushimoto" class="wrap">
			<h2><?php _e( 'Hello Kushimoto', 'hello-kushimoto' ); ?></h2>

			<form method="post" action="<?php echo esc_attr( $_SERVER['REQUEST_URI'] ); ?>">
				<?php wp_nonce_field( 'hello-kushimoto', '_wpnonce_hello_kushimoto' ); ?>

				Admin Panel Here!

				<p class="submit">
					<input type="submit" name="submit" id="submit" class="button button-primary"
					       value="<?php _e( "Save Changes", "hello_kushimoto" ); ?>"></p>
			</form>
		</div><!-- #hello_kushimoto -->
		<?php
	}
}