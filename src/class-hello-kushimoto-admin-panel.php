<?php

class Hello_Kushimoto_Admin_Panel {


	/**
	 * @var Hello_Kushimoto_Option_Manager
	 */
	private $option_manager;

	public function __construct( Hello_Kushimoto_Option_Manager $option_manager ) {

		$this->option_manager = $option_manager;

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

		register_setting(
			'hello_kushimoto_setting',
			$this->option_manager->get_option_name()
		);

	}

	/**
	 * @return Hello_Kushimoto_Speaker[]
	 */
	private function get_speakers() {
		return array(
			new Miyasan(),
			new Taru_Wapuu()
		);
	}


	public function options_page() {

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		?>
		<div id="hello_kushimoto" class="wrap">
			<h2><?php _e( 'Hello Kushimoto', 'hello-kushimoto' ); ?></h2>

			<form method="post" action="options.php">
				<?php
				settings_fields( 'hello_kushimoto_setting' );
				do_settings_sections( 'hello_kushimoto_setting' );
				$options = $this->option_manager->get_options();
				$name = $this->option_manager->get_option_name();
				?>
				<table class="form-table">
					<tbody>
					<tr>
						<th scope="row"><label for="<?php echo esc_attr( $name );?>"><?php _e('キャラクター設定',
									'hello-kushimoto' );?>
								</label></th>
						<td>
							<select name="<?php echo esc_attr( $name );?>[speaker]" id="<?php echo esc_attr( $name );?>">
								<?php
								$current_speaker = $options['speaker'];
								$speakers = $this->get_speakers();
								foreach ( $speakers as $speaker ):
									$class_name = get_class( $speaker );
									?>
									<option value="<?php echo esc_attr( $class_name ); ?>" <?php selected
									($current_speaker, $class_name);?>>
										<?php echo esc_html( $speaker->whoami() ); ?>
									</option>
								<?php
								endforeach; ?>

							</select>
						</td>
					</tr>

					</tbody>
				</table>

				<?php submit_button(); ?>
			</form>
		</div><!-- #hello_kushimoto -->
		<?php
	}
}
