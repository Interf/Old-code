<?php

include_once(ROOT.'/models/home.php');

class HomeController
{
	public function actionIndex()
	{
		if (isset($_POST["do_sort"]) && !empty($_POST["do_sort"])) {
			
			$home_arr = Home::getHomeProd($_POST['sort']);

			foreach ($home_arr as $home) {
				if (@array_key_exists($home->id, $_SESSION['products'])) {
					$home->btn = 1;
				} else {
					$home->btn = 0;
				}
			}

			echo json_encode($home_arr);


		} else {
			include_once(ROOT.'/view/home/home.php');
		}


		
		return true;
	}
}


?>