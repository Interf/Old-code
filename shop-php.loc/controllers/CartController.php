<?php

include_once(ROOT.'/models/cart.php');

class CartController
{
	public function actionIndex()
	{
		$cart_arr = Cart::getCart();
		$total_sum = Cart::getTotalSum();

		include_once(ROOT.'/view/cart/cart.php');
		return true;
	}

	public function actionAdd($id)
	{
		$id = (int) $id;
		Cart::AddToCart($id);
		echo count($_SESSION['products']);
		
		return true;
	}

	public function actionDel($id)
	{
		$id = (int) $id;
		Cart::DelFromCart($id);

		$total_sum = Cart::getTotalSum();
		if($total_sum == false) {
			$sum = 0;
		} else {
			$sum = $total_sum->total_sum = $_SESSION['total'];
		}
		

		$del_arr["total_sum"] = $sum;
		$del_arr["count_cart"] = count($_SESSION['products']);


		echo json_encode($del_arr);

		
		

		return true;
	}

	public function actionOrder()
	{

		if(isset($_SESSION['products']) && !empty($_SESSION['products'])) {

			if (isset($_POST['do_order'])) {
				$keys_arr = array_keys($_SESSION['products']);
				$keysList = implode(",", $keys_arr);

				$message = "От: ".$_POST['email']."\nИмя: ".$_POST['name']."\nId товаров: ".$keysList;


				mail("user@test.ru", "Заказ товара", $message);

				unset($_SESSION['products']);

				echo 1;




			} else {
				include_once(ROOT.'/view/cart/order.php');
			}





			
		} else {
			header("Location: /");
		}


		
		return true;
	}


}

?>