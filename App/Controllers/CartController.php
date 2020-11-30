<?php

namespace App\Controllers;

use App\Models\Cart;

class CartController
{
	public function actionIndex()
	{
		$cart = Cart::getCart();
		echo "<pre>";
		var_dump($cart);
		echo "</pre>";
		return true;
	}

	public function actionAddInCart($id)
	{
		$id = (int) $id;
		Cart::addInCart($id);
		var_dump($_SESSION['cart']);
		return true;
	}

	public function actionDelFromCart($id)
	{
		$id = (int) $id;
		$cart = Cart::delFromCart($id);
		var_dump($_SESSION['cart']);
		return true;
	}
}