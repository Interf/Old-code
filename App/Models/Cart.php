<?php

namespace App\Models;

class Cart
{
	public static function getCart()
	{
		if(empty($_SESSION['cart'])) {
			return false;
		} else {
			$db = \DB\DB::Connect();

			$arr_keys = array_keys($_SESSION['cart']);

			$pdo_in = str_repeat("?,", count($arr_keys));
			$in = trim($pdo_in,",");


			$cart_db = $db->prepare("SELECT * FROM `products` WHERE `id` IN ($in)");
			$cart_db->execute($arr_keys);

			while($cart = $cart_db->fetchObject()) {
				$arr_cart[] = $cart;
			}

			return $arr_cart;
		}
	}

	public static function addInCart($id)
	{
		$temp_arr = array();

		if(isset($_SESSION['cart'])) {
			$temp_arr = $_SESSION['cart'];
		}

		if(array_key_exists($id, $temp_arr)) {
			$temp_arr[$id]++;
		} else {
			$temp_arr[$id] = 1;
		}

		$_SESSION['cart'] = $temp_arr;
	}

	public static function delFromCart($id)
	{
		foreach($_SESSION['cart'] as $key=>$value) {
			if($id == $key) {
				unset($_SESSION['cart'][$id]);
				break;
			}
		}
	}
}