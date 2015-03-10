<?php defined('SYSPATH') or die('No direct script access.');

class Model_Movie extends ORM
{
    protected $_table_columns = array(
    	'id' => NULL,
    	'title'=> NULL,
    	'year' => NULL,
    	'ip' => NULL,
	);
	protected $_has_many = array(
		'ratings'=>array(
			'model' => 'movie',
			'foreign' => 'movie_id'
		)

	);

	public function list_columns()
	{
		// Proxy to database
		return $this->_table_columns;
	}

	
}