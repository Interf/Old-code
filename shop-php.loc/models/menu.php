<?php

class Menu
{
	public static function getMenu()
	{
		$db = Db::Connect();

		$menu_db = $db->query("SELECT * FROM `menu`");

		while( $menu = $menu_db->fetchObject() ) {
			$menu_arr[] = $menu;
		}

		return $menu_arr;
	}
}


?>