<?php

class Pagin
{

	private static $limit = 5;



	private static function sort($sort)
	{

		if( $sort == "all" ) {
			$were = "";
		}
		elseif($sort == "new") {
			$were = "WHERE `is_new` = 1";
		}
		else {
			$were = "WHERE `location` = (SELECT `id` FROM `menu` WHERE `transcript` = '$sort')";
		}


		return $were;
	}


	private static function getCountProd($sort)
	{

		$were = self::sort($sort);

		$db = Db::Connect();

		$count_db = $db->query("SELECT COUNT(`id`) as `count` FROM `products` $were");

		$count = $count_db->fetchObject();

		return $count;

	}

	public static function getCountPages($sort)
	{
		$count_prod = self::getCountProd($sort);
		$count_pages = ceil($count_prod->count / self::$limit);

		return $count_pages;
	}

	public static function paginator($page, $sort)
	{
		$were = self::sort($sort);

		$page = (int) $page;

		$count_page = self::getCountPages($sort);

		if ($page < 1 || $page > $count_page) {
			$page = 1;
		}

		$start = ($page * self::$limit) - self::$limit;

		$db = Db::Connect();

		$pagin_db = $db->prepare("SELECT * FROM `products` $were ORDER BY `id` DESC LIMIT :start, :lim");
		$pagin_db->bindParam(":start", $start, PDO::PARAM_INT);
		$pagin_db->bindParam(":lim", self::$limit, PDO::PARAM_INT);
		$pagin_db->execute();

		while( $pagin = $pagin_db->fetchObject() ) {
			$pagin_arr[] = $pagin;
		}

		return $pagin_arr;
	}



}

?>