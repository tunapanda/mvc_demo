<?php

namespace mvcdemo;

/**
 * Simple template renderer. This is an example of how we can use this class:
 *
 * $t=new Template("mytemplate.tpl.php");
 * $data=array(
 *   "some_data"=>$somedata,
 *   "some_other_data"=>getSomeOtherData()
 * );
 * $t->display($data);
 *
 * In this example, we have a template called `mytemplate.tpl.php` that gets 
 * loaded and rendered using the `display` call. The variables passed in the
 * `$data` array will be made available to the template in the global scope. 
 */
class Template {

	/**
	 * Constructor.
	 */
	public function __construct($fileName) {
		$this->fileName=$fileName;
	}

	/**
	 * Render the template to a string and return that string.
	 */
	public function render($vars=array()) {
		foreach ($vars as $key=>$value)
			$$key=$value;

		ob_start();
		require $this->fileName;
		return ob_get_clean();
	}

	/**
	 * Display the rendered template.
	 */
	public function display($vars=array()) {
		if (!$vars)
			$vars=array();

		foreach ($vars as $key=>$value)
			$$key=$value;

		require $this->fileName;
	}
}
