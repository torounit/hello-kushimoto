<?php

/**
 * Class Hello_Kushimoto_Option_Page
 *
 * Create option page.
 */
class Hello_Kushimoto_Option_Page {

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
	private $option_seeker;
	/**
	 * @var Hello_Kushimoto_Option_Page_View
	 */
	private $option_page_view;

	/**
	 * Hello_Kushimoto_Option_Page constructor.
	 *
	 * @param Hello_Kushimoto_Option_Manager $option_manager
	 * @param Hello_Kushimoto_Speaker_Seeker $option_seeker
	 */
	public function __construct(
		Hello_Kushimoto_Option_Manager $option_manager,
		Hello_Kushimoto_Speaker_Seeker $option_seeker
	) {
		$option_page_view  = new Hello_Kushimoto_Option_Page_View( 'Hello Kushimoto', $this->page_slug,
		$this->option_group );

		$this->option_page_view = $option_page_view;
		$this->option_manager = $option_manager;
		$this->speaker_seeker = $option_seeker;

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );

	}

	public function admin_menu() {

		add_options_page(
			__( 'Hello Kushimoto', 'hello-kushimoto' ),
			__( 'Hello Kushimoto', 'hello-kushimoto' ),
			'manage_options',
			$this->page_slug,
			array( $this->option_page_view, 'create_page' )
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
			array( $this->option_page_view, 'create_select_field' ),
			$this->page_slug,
			$section,
			array(
				'name'    => 'hello_kushimoto_speaker',
				'options' => $this->create_options(),
				'current' => $this->option_manager->get_speaker_name(),
			)
		);

		register_setting(
			$this->option_group,
			'hello_kushimoto_speaker'
		);

	}

	/**
	 * @return array
	 */
	public function create_options() {
		$options      = $this->speaker_seeker->get_all_speakers();
		$classes      = array_map( 'get_class', $options );
		$option_names = array_map( array( $this, 'get_speaker_name' ), $options );

		return array_map( array( $this, 'create_option' ), $classes, $option_names );
	}

	/**
	 * @param $class
	 * @param $option_name
	 *
	 * @return array
	 */
	private function create_option( $class, $option_name ) {
		return array(
			'value' => $class,
			'label' => $option_name,
		);
	}

	/**
	 * @param Hello_Kushimoto_Speaker $option
	 *
	 * @return string
	 */
	private function get_speaker_name( Hello_Kushimoto_Speaker $option ) {
		return $option->whoami();
	}

	public function section_description() {
		//echo sprintf( '<p>%s</p>', __( 'Hello Kushimoto の設定ページ。', 'hello-kushimoto' ) );

	}
}
