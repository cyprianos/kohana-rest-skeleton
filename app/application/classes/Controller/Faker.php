<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faker extends Controller {

	public function action_setup()
	{
		$faker = Faker\Factory::create();
		$count = $this->request->param('count', 10);
		
		for ($i=0; $i < $count; $i++) {
			$movie = new Model_Movie();
			$movie->title = $faker->name;
			$movie->year = $faker->year($max='now');
			$movie->save();
		}
		echo 'successfully created';
	}
} // End Welcome