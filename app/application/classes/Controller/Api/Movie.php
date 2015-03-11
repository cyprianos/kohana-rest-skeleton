<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Movie extends Controller {

	public function action_get()
	{
		
		$collection = ORM::factory('Movie')->find_all();
		$ret=[];
		
		foreach($collection as $item) {

			$ratings = ORM::collection($item->ratings);
			$sum = array_reduce($ratings, function($all, $rating){
				return $all+=$rating->value;
			});
			$avg = $sum/(count($ratings));

			$obj = $item->toObj();
			$obj->rating = round($avg,2);
			array_push($ret, $obj);

		}
		
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
