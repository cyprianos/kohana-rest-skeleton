<?php defined('SYSPATH') or die('No direct script access.');

class Model_Rating extends ORM
{
    protected $_table_columns = array(
    	'id' => NULL,
    	'value'=> NULL,
    	'movie_id' => NULL
	);

	protected $_belongs_to = array(
		'movie' => array(
			'model'=>'Movie'
		)
	);

	public function list_columns()
	{
		// Proxy to database
		return $this->_table_columns;
	}
}