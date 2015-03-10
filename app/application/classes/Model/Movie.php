<?php defined('SYSPATH') or die('No direct script access.');

class Model_Movie extends ORM
{
    protected $_table_columns = array(
    	'id' => NULL,
    	'title'=> NULL,
    	'year' => NULL
	);


	public function list_columns()
	{
		// Proxy to database
		return $this->_table_columns;
	}

	
}