<?php


/**
 * Class Hello_Kushimoto_Option_Page
 *
 * Create option page view.
 */
class Hello_Kushimoto_Option_Page_View {


	/**
	 * @var string
	 */
	private $page_slug = '';
	/**
	 * @var string
	 */
	private $option_group = '';
	/**
	 * @var string
	 */
	private $name = '';


	public function __construct( $name, $page_slug, $option_group ) {

		$this->name = $name;
		$this->page_slug = $page_slug;
		$this->option_group = $option_group;

	}

	/**
	 * @param $args
	 *
	 * @internal param array $name
	 */
	public function create_select_field( $args ) {
		$name    = $args['name'];
		$current = $args['current'];
		$options = $args['options'];
		?>
		<select name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>">
			<?php
			foreach ( $options as $option ) :
				?>
				<option value="<?php echo esc_attr( $option['value'] ); ?>" <?php
				selected( $current, $option['value'] ); ?>>
					<?php echo esc_html( $option['label'] ); ?>
				</option>
				<?php
			endforeach; ?>

		</select>
		<?php
	}

	public function create_page() {

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.' ) );
		}
		?>
		<div class="wrap">
			<h1><?php echo esc_html( $this->name );?></h1>
			<div id="hello_kushimoto" class="wrap">

				<form method="post" action="options.php">
					<?php
					settings_fields( $this->option_group );
					do_settings_sections( $this->page_slug );
					submit_button();
					?>

				</form>
			</div>
		</div>
		<?php
	}
}
