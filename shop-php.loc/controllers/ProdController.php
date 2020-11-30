<?php
include_once(ROOT.'/models/paginator.php');

include_once(ROOT.'/models/oneProd.php');

class ProdController
{
	public function actionIndex()
	{

		$sort = "all";

		$page = (int) $_GET['page'];

		$pagin_arr = Pagin::paginator($page, $sort);

		$max_page = Pagin::getCountPages($sort);

		include_once(ROOT.'/view/products/products.php');
		return true;
	}

	public function actionCategor($categor)
	{

		$sort = trim(strip_tags($categor));

		$page = (int) $_GET['page'];

		$pagin_arr = Pagin::paginator($page, $sort);

		$max_page = Pagin::getCountPages($sort);

		include_once(ROOT.'/view/products/products.php');

		return true;
	}

	public function actionOne($id)
	{
		$one_prod = Prod::getOneProd($id);

		include_once(ROOT.'/view/products/oneProd.php');
		return true;
	}




}


?>