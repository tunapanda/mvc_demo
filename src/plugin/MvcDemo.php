<?php

namespace mvcdemo;

require_once __DIR__."/../utils/Singleton.php";
require_once __DIR__."/../controller/EstateController.php";

/**
 * This is the main class for the plugin. We should keep this as small as
 * possible and do as much of the main logic as we can in other files. We 
 * should only put things here that are related to the "overall" functioanlity
 * of the plugin, and that needs to be accessed by several other parts.
 */
class MvcDemo extends Singleton {

	/**
	 * Construct.
	 */
	protected function __construct() {
		EstateController::instance();
	}
}