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
		$this->response->body('POST');
	}
	public function action_delete()
	{
		$this->response->body('DELETE');
	}
	public function action_put()
	{
		$this->response->body('PUT');
	}

} // End Welcome
