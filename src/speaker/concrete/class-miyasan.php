<?php
/**
 * Class Miyasan
 *
 * @package hello-kushimoto
 */

class Miyasan extends Hello_Kushimoto_Random_Speaker {

	/**
	 * NickName
	 *
	 * @var string
	 */
	protected $name = 'Mr. M';

	/**
	 * Apply original filter whoami method
	 *
	 * @return string
	 */
	public function whoami() {
		return (string) apply_filters( 'miyasan_name', parent::whoami() );
	}

	/**
	 * Avator image.
	 *
	 * @param int $size
	 *
	 * @return string
	 */
	public function get_avatar( $size = 50 ) {
		$src = 'https://ps.w.org/hello-kushimoto/assets/icon.svg';
		return '<img alt="" src="' . $src . '" class="avatar avatar-50" height="' . esc_attr( $size ) . '" width="' . esc_attr( $size ) . '">
';
	}

	/**
	 * Apply original filter say method.
	 *
	 * @return String
	 */
	public function say() {
		return (string) apply_filters( 'miyasan_say', parent::say() );
	}

	/**
	 * Dictionary of Mr.M's Quotations.
	 *
	 * @return String[]
	 */
	public function get_words() {
		return array(
			__( '台風中継でおなじみの和歌山県串本町から来ました。', 'hello-kushimoto' ),
			__( 'お客さんから不吉なメールが来た。見なかったことにしよう。。。', 'hello-kushimoto' ),
			__( 'めんどくさい案件を全部断って楽な案件だけを求め続けてたらいつのまにか串本に住んでました。', 'hello-kushimoto' ),
			__( 'え？まだMAMPで消耗してるの？', 'hello-kushimoto' ),
			__( 'え？まだこれからもMAMPで消耗してるの？', 'hello-kushimoto' ),
			__( 'Windowsはガン無視です 笑', 'hello-kushimoto' ),
			__( 'sudoならインストールできた？ だめですよそんなのずっとsudoですることになりますよ？', 'hello-kushimoto' ),
			__( 'sudoなんて邪道ですよ。そんなもんできたことになりません。', 'hello-kushimoto' ),
			__( 'あのねみなさんね ブログに書いてあるコマンドとか実行しちゃうでしょ あれ大体間違ってますよ', 'hello-kushimoto' ),
			__( 'みなさん自分が苦労したこと記事に書きたくなるでしょ？ 苦労したって事はそれはどっか間違ってんですよ', 'hello-kushimoto' ),
			__( 'CMSのコアのソースを読むとか時間の無駄', 'hello-kushimoto' ),
			__( 'お見積依頼ですか？', 'hello-kushimoto' ),
			__( 'それプルリクください', 'hello-kushimoto' ),
			__( 'プルリクお待ちしてます!', 'hello-kushimoto' ),
			__( 'なぜそうなるかわかりますか？', 'hello-kushimoto' ),
			__( '整理できていない知識はないのと同じですよ', 'hello-kushimoto' ),
			__( 'とりあえず何か公開しろ。話はそれからじゃっ！', 'hello-kushimoto' ),
			__( 'オープンソースっぽくない奴はほんとダメ', 'hello-kushimoto' ),
			__( 'すげー、熱烈に握手をもとめられたのでどうしたのかと思ったら、Contact Form 7の作者とまたもや間違えられました', 'hello-kushimoto' ),
			__( '高速が開通したんだって！大阪まで３時間切るかも！', 'hello-kushimoto' ),
			__( 'つくるのはなんでも作りますｗ（岡本さんがｗ', 'hello-kushimoto' ),
			__( '仕事や！ 行ってこい！', 'hello-kushimoto' ),
			__( 'まじに楽しいのになー。自分が使いたい物を大っぴらに作って放置しとくだけで世界がどれだけ広がるか。', 'hello-kushimoto' ),
			__( '自慢じゃないですが、1日で作りました。（自慢ですけど）', 'hello-kushimoto' ),
			__( 'え？そんなんできたうちに入りませんよ。rootに変わるなんてうんこです。', 'hello-kushimoto' ),
			__( 'MAMPなんてアンインストールしちゃえばいいんですよ。', 'hello-kushimoto' ),
			__( '世界は変化してるんです。半年前はそんなのありませんでした。', 'hello-kushimoto' ),
			__( 'すぐにsudoしたら？って言うエンジニアは信用しちゃいけません。', 'hello-kushimoto' ),
			__( '串本の海？台風の後に犬の散歩してると、サメが打ち上げられたりしてますね。', 'hello-kushimoto' ),
			__( 'こころが汚いみなさんには見えないと思うけど、今日の串本の星空はめっちゃきれい！', 'hello-kushimoto' ),
			__( 'I\'m fake Takayuki', 'hello-kushimoto' ),
			__( 'DMで質問をいただいても回答できないので、GitHubのIssueに書いていただけると助かります。', 'hello-kushimoto' ),
			__( 'FTPなんてまだあるのか。。。', 'hello-kushimoto' ),
			__( 'プルリクエストありがとうございます！', 'hello-kushimoto' ),
			__( 'できてしまった。', 'hello-kushimoto' ),
			__( 'もっとみんなでいろいろ作ってコードを見せびらかしあったりしたいなーと思うんですよね。', 'hello-kushimoto' ),
			__( '今度腰カクカクしながらハグしてあげる！', 'hello-kushimoto' ),
			__( 'おいこらー仕事やでー。おらおらー！', 'hello-kushimoto' ),
			__( '自分でやると言っておいてめんどくさくなって押し付けた。', 'hello-kushimoto' ),
			__( 'Hiroshi UrabeさんがVCCW 2.18.0をリリースしてくれました！バグがあったら全部この人のせいです！', 'hello-kushimoto' ),
			__( 'なかなか感動すると思うから試せ。すぐ試せ。それまでご飯抜きね。', 'hello-kushimoto' ),
			__( 'オープンソースは課題を解決するためのワークフローです！', 'hello-kushimoto' ),
		);
	}
}
