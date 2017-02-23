<?php

namespace mvcdemo;

require_once __DIR__."/../utils/Singleton.php";
require_once __DIR__."/../controller/EstateController.php";

/**
 * This is the main class for the plugin.
 */
class MvcDemo extends Singleton {

	/**
	 * Construct.
	 */
	protected function __construct() {
		EstateController::instance();
	}
}