<?php

/**
 * Class Hello_Kushimoto_Admin_Panel
 *
 * Create option page.
 */
class Hello_Kushimoto_Admin_Panel {

	/**
	 * @var Hello_Kushimoto_Option_Manager
	 */
	private $option_manager;
	/**
	 * @var Hello_Kushimoto_Speaker_Seeker
	 */
	private $speaker_seeker;

	/**
	 * Hello_Kushimoto_Admin_Panel constructor.
	 *
	 * @param Hello_Kushimoto_Option_Manager $option_manager
	 * @param Hello_Kushimoto_Speaker_Seeker $speaker_seeker
	 */
	public function __construct(
		Hello_Kushimoto_Option_Manager $option_manager,
		Hello_Kushimoto_Speaker_Seeker $speaker_seeker
	) {

		$this->option_manager = $option_manager;
		$this->speaker_seeker = $speaker_seeker;

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
				$name    = $this->option_manager->get_option_name();
				?>
				<table class="form-table">
					<tbody>
					<tr>
						<th scope="row"><label for="<?php echo esc_attr( $name ); ?>"><?php _e( 'キャラクター設定',
									'hello-kushimoto' ); ?>
							</label></th>
						<td>
							<select name="<?php echo esc_attr( $name ); ?>[speaker]"
							        id="<?php echo esc_attr( $name ); ?>">
								<?php
								$current_speaker_name = $options['speaker'];
								$speakers             = $this->speaker_seeker->get_all_speakers();
								foreach ( $speakers as $speaker ):
									$class_name = get_class( $speaker );
									?>
									<option value="<?php echo esc_attr( $class_name ); ?>" <?php
									selected( $current_speaker_name, $class_name ); ?>>
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
