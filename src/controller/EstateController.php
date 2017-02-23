<?php

namespace mvcdemo;

require_once __DIR__."/../utils/Singleton.php";
require_once __DIR__."/../utils/Template.php";
require_once __DIR__."/../model/Estate.php";

/**
 * This is the implementation of the Estate controller. It is implemented 
 * as a singleton class. The tasks of the controller is to take information
 * from the model, and pass it on to the view, and then also take infromation
 * from the view and change the state of the model. In the context of a
 * WordPress plugin, it would make sense that the controller deals with the
 * following:
 * 
 * - Handle the init action and register the custom posttype.
 * - Handle the the_content filter to show a custom view based on the custom
 *   posttype. It does this by creating a view data structure, and passes
 *   the data structure on to a template rendered using the Template class.
 * - The controller shouldn't use such functions as get_post_meta. This should
 *   be abstracted by relevant methods in the model, so the code in the 
 *   controller will be easier to read.
 */
class EstateController extends Singleton {

	/**
	 * Constructor. We set up relevant hooks here.
	 */
	protected function __construct() {
		add_action("init",array($this,"handleInit"));
		add_filter("the_content",array($this,"handleTheContent"));
	}

	/**
	 * Handle the init action. This is where we register the custom
	 * posttype.
	 */
	public function handleInit() {
		register_post_type("estate",array(
			"labels"=>array(
				"name"=>"Estates",
				"singular_name"=>"Estate",
				"add_new_item"=>"Add new Estate",
				"not_found"=>"No Estates found.",
				"edit_item"=>"Edit Estate",
			),
			"public"=>true,
			"supports"=>array("title","editor","custom-fields"),
		));
	}

	/**
	 * Handle the content filter. Here we get the relevant information from
	 * the model, and we pass this on to the view. The view is rendered 
	 * using the Template class.
	 */
	public function handleTheContent($content) {
		$post=get_post();
		if ($post->post_type!="estate")
			return $content;

		$t=new Template(__DIR__."/../view/estate.tpl.php");
		$estate=Estate::getCurrent();

		$data=array(
			"description"=>$estate->getDescription(),
			"price"=>$estate->getPrice()
		);

		return $t->render($data);
	}
}