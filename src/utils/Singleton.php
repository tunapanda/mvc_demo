<?php

namespace mvcdemo;

/**
 * Singleton. A singleton is a class of which there should only ever
 * exist one instance. You can create a Singleton by extending this class.
 * For general information about the Singleton pattern, see:
 *
 * https://en.wikipedia.org/wiki/Singleton_pattern
 */
abstract class Singleton {

	private static $instances=array();

	/**
	 * Get the singleton instance.
	 */
	public static function instance() {
		$class=get_called_class();

		if (!isset(self::$instances[$class]))
			self::$instances[$class]=new $class;

		return self::$instances[$class];
	}
}