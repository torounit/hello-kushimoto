<?php

/*
Plugin Name: Hello-kushimoto
Version: 1.0
Description: これはただのプラグインではありません。
このプラグインが有効にされると、プラグイン管理画面以外の管理パネルの右上に 伝説上のエンジニア Mr. Kushimoto の名言がランダムに表示されます。

Author: Toro_Unit
Text Domain: hello-kushimoto
Domain Path: /languages
*/

Class Hello_Kushimoto {

	/** @var Speaker */
	private $speaker;

	public function __construct( Speaker $speaker ) {

		$this->speaker = $speaker;

		add_action( 'admin_enqueue_scripts', array( $this, 'add_style' ) );
		add_action( 'admin_notices', array( $this, 'render' ) );
		
		add_shortcode( 'kushimoto', array( $this->speaker, 'say' ) );

	}

	/**
	 * show text in admin.
	 */
	public function render() {
		$chosen = $this->speaker->say();
		echo "<p id='kusimoto'>$chosen</p>";
	}

	/**
	 * add styles.
	 */
	public function add_style() {

		$x = is_rtl() ? 'left' : 'right';

		$style = "
        #kusimoto {
            float: $x;
            padding-$x: 15px;
            padding-top: 5px;
            margin: 0;
            font-size: 11px;
        }
        ";
		wp_add_inline_style( 'wp-admin', $style );
	}


}

interface Speaker {

	/**
	 * @return string
	 */
	public function say();
}

Class Miyasan implements Speaker {

	public function say() {
		$words = $this->getWords();

		return $words[ array_rand( $words ) ];
	}

	/**
	 * @return array
	 */
	public function getWords() {
		return array(
			"台風中継でおなじみの 和歌山県串本町から来ました。",
			"お客さんから不吉なメールが来た。見なかったことにしよう。。。",
			"めんどくさい案件を全部断って楽な案件だけを求め続けてたらいつのまにか串本に住んでました。",
			"え？まだMAMPで消耗してるの？",
			"え？まだこれからもMAMPで消耗してるの？",
			"Windowsはガン無視です 笑",
			"sudoならインストールできた？ だめですよそんなのずっとsudoですることになりますよ？",
			"sudoなんて邪道ですよ。そんなもんできたことになりません。",
			"あのねみなさんね ブログに書いてあるコマンドとか実行しちゃうでしょ あれ大体間違ってますよ",
			"みなさん自分が苦労したこと記事に書きたくなるでしょ？ 苦労したって事はそれはどっか間違ってんですよ",
			"CMSのコアのソースを読むとか時間の無駄"
		);
	}


}

function hello_kushimoto_init() {
	$miyasan = new Miyasan();
	new Hello_Kushimoto( $miyasan );
}

add_action( 'plugins_loaded', 'hello_kushimoto_init' );

