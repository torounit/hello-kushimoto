<?php

/**
 * Class Hello_Kushimoto_Admin_Panel
 *
 * Create option page.
 */
class Hello_Kushimoto_Admin_Panel {

	/**
	 * @var string
	 */
	private $page_slug = 'hello_kushimoto';
	/**
	 * @var string
	 */
	private $option_group = 'hello_kushimoto_settings';

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
			$this->page_slug,
			array( $this, 'options_page' )
		);
	}

	public function admin_init() {

		$section = 'default';

		add_settings_section(
			$section,
			__( 'Hello Kushimoto 設定', 'hello-kushimoto' ),
			array( $this, 'section_description' ),
			$this->page_slug
		);

		add_settings_field(
			'hello_kushimoto_speaker',
			__( 'キャラクター設定', 'hello-kushimoto' ),
			array( $this, 'speaker_field' ),
			$this->page_slug,
			$section,
			'hello_kushimoto_speaker'
		);

		register_setting(
			$this->option_group,
			'hello_kushimoto_speaker'
		);

	}

	public function section_description() {
		//echo sprintf( '<p>%s</p>', __( 'Hello Kushimoto の設定ページ。', 'hello-kushimoto' ) );

	}

	/**
	 * @param $name
	 */
	public function speaker_field( $name ) {
		?>
		<select name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>">
			<?php
			$current_speaker_name = $this->option_manager->get_speaker_name();
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
		<?php
	}

	public function options_page() {

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		?>
		<div class="wrap">
			<h1>Hello Kushimoto</h1>
			<div id="hello_kushimoto" class="wrap">

				<form method="post" action="options.php">
					<?php
					settings_fields( $this->option_group );
					do_settings_sections( $this->page_slug );
					submit_button();
					?>

				</form>
			</div><!-- #hello_kushimoto -->
		</div>
		<?php


	}
}
