<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Movie extends Controller {

	public function action_get()
	{
		$ret = ORM::collection(ORM::factory('Movie'));
		$ret = json_encode($ret);
		$this->response->body($ret);
		//array('records'=>$ret)
	}
	public function action_post()
	{
		$this->response->body('hello, world!');
	}
	public function action_delete()
	{
		$this->response->body('hello, world!');
	}
	public function action_put()
	{
		$this->response->body('hello, world!');
	}

} // End Welcome
