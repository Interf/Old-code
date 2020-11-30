<?php

class Products
{
	public static function getProducts()
	{
		$db = Db::Connect();

		$prod_db = $db->query("SELECT * FROM `products`");

		while($prod = $prod_db->fetchObject()) {
			$prod_arr[] = $prod;
		}

		return $prod_arr;
	}
}

?>