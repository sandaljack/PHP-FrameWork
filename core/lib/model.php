<?php

namespace core\lib;

class model extends \PDO
{
	public function __construct()
	{
		// $dsn = 'mysql:host=localhost;dbname=shop';
		// $username = 'root';
		// $passwd = '123';
		$database = conf::all('database');
		try {
			parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWD']);
		} catch (\PDOException $e) {
			p($e->getMessage());
		}
	}
}