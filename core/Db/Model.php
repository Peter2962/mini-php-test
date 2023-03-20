<?php

namespace Core\Db;

use Exception;

class Model
{
	
	public function __construct()
	{
		
	}

	private function cursor()
	{
		$config = config('database');
		$cursor = new mysqli(
			$config['host'],
			$config['username'],
			$config['password']
		);

		if ($cursor->connect_error) {
			throw new Exception('DB connection error: ' . $cursor->connect_error);
		}

		return $cursor;
	}

	public function insert()
	{

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