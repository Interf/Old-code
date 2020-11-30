<?php


class Prod
{
	public static function getOneProd($id)
	{
		$id = (int) $id;

		$db = Db::Connect();

		$one_db = $db->prepare("SELECT * FROM `products` WHERE `id` = :id");
		$one_db->execute(array("id"=>$id));

		$one_prod = $one_db->fetchObject();

		return $one_prod;
	}
}


?>