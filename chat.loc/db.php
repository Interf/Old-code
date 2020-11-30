<?php

class Db
{
	public static function Connect()
	{
		try {
			$db = new PDO("mysql:dbname=myChat;localhost=localhost", "int", "123");
			return $db;
		} catch (PDOException $e) {
			exit("Ошбика БД").$e->getMessage();
		}
	}
}

?>