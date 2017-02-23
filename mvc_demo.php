<?php
/*
Plugin Name: MVC Demo
Plugin URI: https://github.com/tunapanda/mvc-demo
GitHub Plugin URI: https://github.com/tunapanda/mvc-demo
Description: A demo that shows how to split the code into Model, View and Controller.
Version: 0.0.1
*/

/*
 * We keep this file as small as we possibly can. The things we do in
 * this file:
 *
 * - Find out the file system path and the root url to the plugin and store
 *   this as constants. We can only do this in this file since it is in the
 *   plugin root, we can't do it from a file that is deeper in the hierarchy.
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
