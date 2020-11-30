<?php

include_once(ROOT.'/models/check.php');
include_once(ROOT.'/models/reg.php');
include_once(ROOT.'/models/menu.php');
include_once(ROOT.'/models/getProducts.php');

class AdminController
{
	public function actionIndex()
	{
		if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
			header("Location: /");
		} else {

			if (isset($_POST['do_reg']) || isset($_POST['do_auth'])) {
				include_once(ROOT.'/models/admin.php');
			} else {
				include_once(ROOT.'/view/admin/admin.php');
			}

		}

		return true;
	}

	public function actionMenu()
	{

		if (isset($_POST['del_menu']) && !empty($_POST['del_menu'])) {
			include_once(ROOT.'/models/delMenu.php');
		} 
		elseif (isset($_POST['change_menu']) && !empty($_POST['change_menu'])) {
			include_once(ROOT.'/models/changeMenu.php');
		}
		elseif(isset($_POST['add_menu']) && !empty($_POST['add_menu'])) {
			include_once(ROOT.'/models/addMenu.php');
		}
		else {
			$menu_arr = Menu::getMenu();

			include_once(ROOT.'/view/admin/menu.php');
		}

		

		return true;
	}

	public function actionProd()
	{


		if (isset($_POST['del_prod']) && !empty($_POST['del_prod'])) {
			include_once(ROOT.'/models/delProd.php');
		}
		elseif(isset($_POST['add_prod']) && !empty($_POST['add_prod'])) {
			include_once(ROOT.'/models/addProd.php');
		}
		elseif(isset($_POST['change_prod']) && !empty($_POST['change_prod'])) {
			include_once(ROOT.'/models/changeProd.php');
		}
		else {
			$prod_arr = Products::getProducts();

			include_once(ROOT.'/view/admin/products.php');
		}


		


		return true;
	}

}

?>