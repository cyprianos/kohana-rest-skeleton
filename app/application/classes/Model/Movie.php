<?php defined('SYSPATH') or die('No direct script access.');

class Model_Movie extends ORM
{
    protected $_table_columns = array(
    	'id' => NULL,
    	'title'=> NULL,
    	'year' => NULL,
    	'ip' => NULL,
    	'description'=>NULL
	);
	protected $_has_many = array(
		'ratings'=> array('model'=>'Rating', 'foreign_key'=>'movie_id')
	);
	

	// public $rating;

	public function list_columns()
	{
		// Proxy to database
		return $this->_table_columns;
	}

	// public function getRating() {
		
	// 	$sum = 0;
	// 	$counter=0;
	// 	$arr = [];
	// 	// var_dump($this->ratings);exit;
	// 	// var_dump($this->ratings);exit;
	// 	// var_dump($this->ratings);exit;
	// 	// var_dump($this->ratings);
	// 	foreach($this->ratings as $item) {
	// 		var_dump($item);
	// 	// array_push($arr, $item);
	// 		// var_dump($item);exit;
	// 		// var_dump($item->toObj());exit;
	// 		// var_dump($item);exit;
	// 		// $sum += $item->value;
	// 		$counter++;
	// 	}
	// 	exit;
	// 	// var_dump($arr);exit;
	// 	return $sum/$counter;
	// }

	// public function rules() {
	// 	return array(
	// 		'title' => array(
	// 			array('not_empty'),
	// 			array('min_length',array(':value',3)
	// 		),
	// 		'year' => array(
	// 			array('not_empty').
	// 			array('range', array(':value'),20,500)
	// 		)
	// 	)
	// }

	
}