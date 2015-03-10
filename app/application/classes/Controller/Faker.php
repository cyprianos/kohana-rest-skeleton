<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faker extends Controller {

	public function action_setup()
	{
		echo '<pre>';
		$faker = Faker\Factory::create();
		$count = $this->request->param('count', 100);
		
		for ($i=0; $i < $count; $i++) {
			
			$movie = new Model_Movie();
			$movie->title = $faker->name;
			$movie->year = $faker->year($max='now');
			$movie->save();
			echo "------------------Random movie nr $i------------------";
			var_dump($movie->toObj());

				$digit = $faker->randomDigitNotNull;

			for($j=0; $j< $digit; $j++) {
				$rating = new Model_Rating();
				// $value = 
				$rating->value = $faker->randomDigitNotNull;
				if($j%2===0) {

					$rating->ip = $faker->ipv4;

				} else {
					$rating->ip = $faker->ipv6;
				}
				$rating->movie_id = $movie->id;
				$rating->save();
				echo "Random rating nr $j ";
				var_dump($rating->toObj());

			}

		}
		echo '</pre>';
		echo 'successfully created';
	}
} // End Welcome