<?php defined('SYSPATH') OR die('No direct script access.');

class ORM extends Kohana_ORM {
	
	public function toObj () {
		$ret = new stdClass();
		foreach($this->_table_columns as $col => $default) {
			$ret->{$col} = $this->{$col};
		}
		return $ret;
	}

	public static function collection($factory){
		$a = $factory->find_all()->as_array();
		$ret = array();
		foreach($a as $item) {
			array_push($ret, $item->toObj());
		}
		return $ret;
	}
}
