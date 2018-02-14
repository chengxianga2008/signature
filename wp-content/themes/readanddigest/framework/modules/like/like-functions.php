<?php

if ( ! function_exists('readanddigest_like') ) {
	/**
	 * Returns ReadAndDigestLike instance
	 *
	 * @return ReadAndDigestLike
	 */
	function readanddigest_like() {
		return ReadAndDigestLike::get_instance();
	}

}

function readanddigest_get_like() {

	echo wp_kses(readanddigest_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}

if ( ! function_exists('readanddigest_like_latest_posts') ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function readanddigest_like_latest_posts() {
		return readanddigest_like()->add_like();
	}

}

if ( ! function_exists('readanddigest_like_portfolio_list') ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 * @return string
	 */
	function readanddigest_like_portfolio_list($portfolio_project_id) {
		return readanddigest_like()->add_like_portfolio_list($portfolio_project_id);
	}

}