<?php

namespace mvcdemo;

/**
 * Represents an Estate. An estate is represented internally by a WordPress
 * post. However, we try to encapsulate this as an implementation detail, and
 * we expose as much of the relevant information as possible using getter
 * functions. This is the reason why the internal `$post` field is private.
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
	 * Get description for the estate. This is implemented as getting the
	 * content from the underlying post.
	 */
	public function getDescription() {
		return $this->post->post_content;
	}

	/**
	 * Get the price. This is implemented by getting the value of a meta field
	 * from the underlying post.
	 */
	public function getPrice() {
		return get_post_meta($this->post->ID,"price",TRUE);
	}

	/**
	 * Get the estate represented by the current post. First, make sure that
	 * the current post is actually representing an estate. If it is, create
	 * an instance of this class and return it. If the current post is not 
	 * an estate, then something has gone wrong, so throw an Exception.
	 */
	static function getCurrent() {
		$post=get_post();

		if ($post->post_type!="estate")
			throw new Exception("this is not an estate");

		return new Estate($post);
	}
}