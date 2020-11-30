<?php


class Db
{
	public function Connect()
	{
		try {
			$db = new PDO("mysql:dbname=myShopTest;localhost=localhost", "int", "123");
			return $db;
		} catch (PDOException $e) {
			exit("Access failed.").$e->getMessage();
		}
	}
}






?>