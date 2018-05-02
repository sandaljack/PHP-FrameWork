<?php

namespace core\lib;
use core\lib\conf;
use Medoo\Medoo;


//这是继承PDO的
// class model extends \PDO
// {
// 	public function __construct()
// 	{
// 		// $dsn = 'mysql:host=localhost;dbname=shop';
// 		// $username = 'root';
// 		// $passwd = '123';
// 		$database = conf::all('database');
// 		try {
// 			parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWD']);
// 		} catch (\PDOException $e) {
// 			p($e->getMessage());
// 		}
// 	}
// }

class model extends medoo
{
	public function __construct()
	{
		$option = conf::all('database');
		parent::__construct($option);
	} 
}