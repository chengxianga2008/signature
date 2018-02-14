<?php
class ReadAndDigestLike {

	private static $instance;

	private function __construct() {
		add_action('wp_enqueue_scripts', array( $this, 'enqueue_scripts'));
		add_action('wp_ajax_readanddigest_like', array( $this, 'ajax'));
		add_action('wp_ajax_nopriv_readanddigest_like', array( $this, 'ajax'));
	}

	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;

	}

	function enqueue_scripts() {

		wp_enqueue_script( 'eltdf-like', ELATED_ASSETS_ROOT . '/js/like.js', 'jquery', '1.0', TRUE );

		wp_localize_script( 'eltdf-like', 'eltdfLike', array(
			'ajaxurl' => admin_url('admin-ajax.php')
		));
	}

	function ajax(){

		//update
		if( isset($_POST['likes_id']) ) {

			$post_id = str_replace('eltdf-like-', '', $_POST['likes_id']);
			$post_id = substr($post_id, 0, -4);
			$type    = isset($_POST['type']) ? $_POST['type'] : '';

			echo wp_kses($this->like_post($post_id, 'update', $type), array(
				'span' => array(
					'class' => true,
					'aria-hidden' => true,
					'style' => true,
					'id' => true
				)
			));
		}

		//get
		else {
			$post_id = str_replace('eltdf-like-', '', $_POST['likes_id']);
			$post_id = substr($post_id, 0, -4);
			echo wp_kses($this->like_post($post_id, 'get'), array(
				'span' => array(
					'class' => true,
					'aria-hidden' => true,
					'style' => true,
					'id' => true
				)
			));
		}
		exit;
	}

	public function like_post($post_id, $action = 'get', $type = ''){
		if(!is_numeric($post_id)) return;

		switch($action) {

			case 'get':
				$like_count = get_post_meta($post_id, '_eltdf-like', true);
				if( !$like_count ){
					$like_count = 0;
					add_post_meta($post_id, '_eltdf-like', $like_count, true);
				}
				$return_value = "<span>" . $like_count . "</span>";

				return $return_value;
				break;

			case 'update':
				$like_count = get_post_meta($post_id, '_eltdf-like', true);

				if($type != 'portfolio_list' && isset($_COOKIE['eltdf-like_'. $post_id])) {
					return $like_count;
				}

				$like_count++;

				update_post_meta($post_id, '_eltdf-like', $like_count);
				setcookie('eltdf-like_'. $post_id, $post_id, time()*20, '/');

				if($type != 'portfolio_list') {
					$return_value = "<span>" . $like_count . "</span>";
					
					return $return_value;
				}

				return '';
				break;
			default:
				return '';
				break;
		}
	}

	public function add_like() {
		global $post;

		$output = $this->like_post($post->ID);

		$class = 'eltdf-like';
		$rand_number = rand(100, 999);
		$title = esc_html__('Like this', 'readanddigest');
		if( isset($_COOKIE['eltdf-like_'. $post->ID]) ){
			$class = 'eltdf-like liked';
			$title = esc_html__('You already like this!', 'readanddigest');
		}

		return '<a href="#" class="'. $class .'" id="eltdf-like-'. $post->ID .'-'. $rand_number.'" title="'. $title .'">'. $output .'</a>';
	}

	public function add_like_portfolio_list($portfolio_project_id){

		$class = 'eltdf-like';
		$rand_number = rand(100, 999);
		$title = esc_html__('Like this', 'readanddigest');
		if( isset($_COOKIE['eltdf-like_'. $portfolio_project_id]) ){
			$class = 'eltdf-like liked';
			$title = esc_html__('You already like this!', 'readanddigest');
		}

		return '<a class="'. $class .'" data-type="portfolio_list" id="eltdf-like-'. $portfolio_project_id .'-'. $rand_number.'" title="'. $title .'"></a>';
	}

	public function add_like_blog_list($blog_id){

		$class = 'eltdf-like';
		$rand_number = rand(100, 999);
		$title = esc_html__('Like this', 'readanddigest');
		if( isset($_COOKIE['eltdf-like_'. $blog_id]) ){
			$class = 'eltdf-like liked';
			$title = esc_html__('You already like this!', 'readanddigest');
		}

		return '<a class="hover_icon '. $class .'" data-type="portfolio_list" id="eltdf-like-'. $blog_id .'-'. $rand_number.'" title="'. $title .'"></a>';
	}
}

global $readanddigest_like;
$readanddigest_like = ReadAndDigestLike::get_instance();
