<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Movie extends Controller {

	public function action_get()
	{
		$ret = ORM::collection(ORM::factory('Movie'));
		
		$ret = json_encode($ret);
		
		$this->response->body($ret);
	}
	public function action_post()
	{
		
		$movie = new Model_Movie();
		$movie->title = $this->request->post('title');
		$movie->year = intval($this->request->post('year'));
		$movie->ip = Request::$client_ip;
		$movie->description = $this->request->post('description');
		
		$movie->save();
		
		$ret = json_encode($movie->toObj());

		$this->response->body($ret);
		
		
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
