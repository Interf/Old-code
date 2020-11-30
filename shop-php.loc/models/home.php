<?php

class Home
{
	private static function getSortProd($sort)
	{
		$sort = trim(strip_tags($sort));

		if ($sort == "all") {
			$were = "";
		} 
		elseif($sort == "new") {
			$were = "WHERE `is_new` = 1";
		}
		elseif($sort == "discount") {
			$were = "WHERE `is_discount` = 1";
		}

		return $were;
	}



	public static function getHomeProd($sort)
	{
		$were = self::getSortProd($sort);

		$db = Db::Connect();

		$home_db = $db->query("SELECT * FROM `products` $were ORDER BY `id` DESC LIMIT 8");

		while($home = $home_db->fetchObject())
		{
			$home_arr[] = $home;
		}

		return $home_arr;
	}
}

?>