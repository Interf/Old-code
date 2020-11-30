<?php

namespace App\Models;

use DB\DB;

class getProd
{
	use \App\Models\getWere;

	public static function getProdByCategor($categor)
	{
		$were = getWere::getWere($categor);
		
		$db = DB::Connect();
		$prod_db = $db->prepare("SELECT * FROM `products` $were");
		$prod_db->execute(['for'=>$categor]);

		while($prod = $prod_db->fetchObject()) {
			$prod_arr[] = $prod;
		}

		return $prod_arr;
	}

	public static function getOneProd($id)
	{
		$were = getWere::getWere($id);
		
		$db = DB::Connect();

		$prod_db = $db->prepare("SELECT * FROM `products` $were");
		$prod_db->execute(['id'=>$id]);

		$one_prod = $prod_db->fetchObject();

		return $one_prod;
	}

}