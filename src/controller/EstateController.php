<?php

namespace mvcdemo;

require_once __DIR__."/../utils/Singleton.php";
require_once __DIR__."/../utils/Template.php";
require_once __DIR__."/../model/Estate.php";

/**
 * Estate controller.
 */
class EstateController extends Singleton {

	/**
	 * Constructor.
	 */
	protected function __construct() {
		add_action("init",array($this,"handleInit"));
		add_filter("the_content",array($this,"handleTheContent"));
	}

	/**
	 * Handle the init action.
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
	 * Handle the content filter.
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