<?php

namespace Core\Db;

use mysqli;
use Exception;

abstract class Model
{
	
	public $tableName = null;

	private function cursor()
	{
		$config = config('database');
		$cursor = new mysqli(
			$config['host'],
			$config['username'],
			$config['password'],
			$config['database']
		);

		if ($cursor->connect_error) {
			throw new Exception('DB connection error: ' . $cursor->connect_error);
		}

		return $cursor;
	}

	public function insert(Array $params, $table = '')
	{
		$cursor = $this->cursor();
		if (!$this->tableName) {
			$this->tableName = $table;
		}
		$fieldNames = implode(',', array_keys($params));
		$fieldValues = implode("', '", array_values($params));
		$query = "INSERT INTO $this->tableName (". $fieldNames .") VALUES (". $fieldValues .")";

		if ($cursor->query($query)) {
			return true;
		}

		throw new Exception($cursor->error);
	}

	public function update()
	{

	}

	public function delete()
	{

	}

	public function select()
	{

	}

}