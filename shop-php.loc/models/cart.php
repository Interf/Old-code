<?php

class Cart
{
	public static function getTotalSum()
	{
		if( empty($_SESSION['products']) ) {
			return false;
		} else {
			$db = Db::Connect();

			$keys_arr = array_keys($_SESSION['products']);
			$keysList = implode(",", $keys_arr);

			$cart_db_sum = $db->query("SELECT SUM(`price`) as `total_sum` FROM `products` WHERE `id` IN ($keysList)");

			$cart_sum = $cart_db_sum->fetchObject();
			

			return $cart_sum;
		}
	}

	public static function getCart()
	{
		if( empty($_SESSION['products']) ) {
			return false;
		} else {
			$db = Db::Connect();

			$keys_arr = array_keys($_SESSION['products']);
			$keysList = implode(",", $keys_arr);

			$cart_db = $db->query("SELECT `id`, `brand`, `type` FROM `products` WHERE `id` IN ($keysList)");

			while( $cart = $cart_db->fetchObject() ) {
				$cart_arr[] = $cart;
			}

			return $cart_arr;
		}
	}



	public static function AddToCart($id)
	{
		$id = (int) $id;

		$tempList = array();

		if(!empty($_SESSION['products'])) {
			$tempList = $_SESSION['products'];
		}

		if( array_key_exists($id, $tempList) ) {
			$tempList[$id] ++;
		} else {
			$tempList[$id] = 1;
		}

		$_SESSION['products'] = $tempList;


	}

	public static function DelFromCart($id)
	{
		foreach ($_SESSION['products'] as $key => $value)
		{
			if($id == $key) {
				unset($_SESSION['products'][$id]);
				break;
			}
		}
	}

}


?>