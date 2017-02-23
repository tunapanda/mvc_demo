<?php

namespace mvcdemo;

/**
 * Represents an Estate.
 */
class Estate {

	private $post;

	/**
	 * Construct.
	 */
	private function __construct($post) {
		$this->post=$post;
	}

	/**
	 * Get description for the estate.
	 */
	public function getDescription() {
		return $this->post->post_content;
	}

	/**
	 * Get the price.
	 */
	public function getPrice() {
		return get_post_meta($this->post->ID,"price",TRUE);
	}

	/**
	 * Get the estate represented by the current post.
	 */
	static function getCurrent() {
		$post=get_post();

		if ($post->post_type!="estate")
			throw new Exception("this is not an estate");

		return new Estate($post);
	}
}