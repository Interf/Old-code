<?php

namespace DB;

use \App\Data;

class DB extends Data
{
	public static function Connect()
	{

		$db_param = Data::DB_TYPE.":localhost=".Data::DB_LOCAL.";dbname=".Data::DB_NAME;
		$db = new \PDO($db_param, Data::DB_LOGIN, Data::DB_PASSWORD);
		return $db;

	}
}