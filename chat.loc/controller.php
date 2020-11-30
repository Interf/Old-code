<?php
include_once("db.php");
include_once("chat.php");
include_once("delMesDB.php");

if (isset($_POST['do_chat']) && !empty($_POST['do_chat'])) {
	
	$autor = $_POST['autor'];
	$message = $_POST['message'];

	$errors = array();

	if (mb_strlen($autor) < 3 || mb_strlen($message) < 3) {
		$errors[] = "Введите данные";
	}






	DbBot::delMessDb();





	if (empty($errors)) {
		$result = Chat::addChat($autor, $message);
		echo json_encode($result);


		








	} else {
		echo json_encode($errors);
	}


}

if (isset($_POST['get_chat']) && !empty($_POST['get_chat'])) {
	$result = Chat::getChat();
	echo json_encode($result);
}


?>