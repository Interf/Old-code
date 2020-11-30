<?php

namespace App\Models;

trait getWere
{
	public static function getWere($cond)
	{
		switch ($cond) {
			case 'all':
				$were = "";
			break;
			case 'new':
				$were = "WHERE `is_new` = 1";
			break;
			case is_int($cond):
				$were = "WHERE `id` = :id";
			break;
			default:
				$were = "WHERE `for_who` = (SELECT `id` FROM `menu` WHERE `title` = :for)";
			break;
		}

		return $were;
	}
}