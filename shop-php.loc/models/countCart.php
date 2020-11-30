<?php

class Count
{
	public static function getCountCart()
	{
		return count($_SESSION['products']);
	}
}

?>