<?php

namespace App\Controllers;

use App\Models\getProd;

class ProdController
{
	public function actionIndex()
	{
		$prod_arr = getProd::getProdByCategor("all");
		
		echo "<pre>";
		print_r($prod_arr);
		echo "</pre>";

		return true;
	}

	public function actionGetProdByCategor($categor)
	{
		$prod_arr = getProd::getProdByCategor($categor);
		
		echo "<pre>";
		print_r($prod_arr);
		echo "</pre>";


		return true;
	}

	public function actionGetOneProd($id)
	{
		$id = (int) $id;
		
		$one_prod = getProd::getOneProd($id);

		var_dump($one_prod);
		echo "<pre>";
		print_r($one_prod);
		echo "</pre>";

		return true;
	}



}