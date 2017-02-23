<?php
/*
Plugin Name: MVC Demo
Plugin URI: https://github.com/tunapanda/mvc-demo
GitHub Plugin URI: https://github.com/tunapanda/mvc-demo
Description: A demo that shows how to split the code into Model, View and Controller.
Version: 0.0.1
*/

/*
 * Please note that this demo is one example of how the MVC design pattern can
 * be implemented in the context of a WordPress plugin. The concepts and
 * best practices described here does not necesarily dictate anything about 
 * how MVC should be implemented "in general". For general information about
 * the MVC pattern, see:
 * https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller
 * 
 * We keep this file as small as we possibly can. The things we do in
 * this file:
 *
 * - Find out the file system path and the root url to the plugin and store
 *   this as constants. We can only do this in this file since it is in the
 *   plugin root, we can't do it from a file that is deeper in the hierarchy.
 * - If our plugin has some external dependencies, this is also where we would
 *   do necesary things to set this up. Such a dependency could be for example
 *   the meta-box plugin, https://metabox.io/
 * - We load the main class using require_once. It would be possible to do
 *   this with class autoloading, and this would arguably be a bit cleaner
 *   and more efficient. However, class autoloading is beyond the scope of
 *   this demo. To learn more about class autoloading, see:
 *   http://php.net/manual/en/language.oop5.autoload.php
 * - Then, we require the main class for the plugin. This is a singleton
 *   class, so we call the static instance method to create an instance of
 *   the class. In order to make sure that the names of classes and functions
 *   will not clash with classes and functions declared in other plugins,
 *   we declare all classes in the namespace mvcdemo.
 */
define('MVC_DEMO_PATH',plugin_dir_path(__FILE__));
define('MVC_DEMO_URL',plugins_url('',__FILE__));

require_once __DIR__."/src/plugin/MvcDemo.php";

mvcdemo\MvcDemo::instance();
