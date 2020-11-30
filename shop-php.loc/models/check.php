<?php

class Check
{
	public static function checkLogin($login)
	{
		$log = trim(strip_tags($login));

		$db = Db::Connect();

		$check_log_db = $db->prepare("SELECT COUNT(`id`) as `count` FROM `users` WHERE `login` = :log");
		$check_log_db->execute(array(":log"=>$log));
		$check_result = $check_log_db->fetchObject();

		if ($check_result->count >= 1) {
			$result = 1; // Есть такой юзер
		} else {
			$result = 0; // Нет такого юзера
		}

		return $result;
	}

	public static function checkEmail($email)
	{
		$email = trim(strip_tags($email));

		$db = Db::Connect();

		$check_email_db = $db->prepare("SELECT COUNT(`id`) as `count` FROM `users` WHERE `email` = :email");
		$check_email_db->execute(array(":email"=>$email));
		$check_result = $check_email_db->fetchObject();

		if ($check_result->count >= 1) {
			$result = 1; // Есть такой юзер
		} else {
			$result = 0; // Нет такого юзера
		}

		return $result;
	}

	public static function checkPass($log,$pass)
	{
		$log = trim(strip_tags($log));
		$pass = trim(strip_tags($pass));

		$db = Db::Connect();

		$log_db = $db->prepare("SELECT `pass` FROM `users` WHERE `login` = :log");
		$log_db->execute(array(":log"=>$log));

		$pass_result = $log_db->fetchObject();

		if (password_verify($pass, $pass_result->pass)) {
			$result = 1; // Совпадает пароль
		} else {
			$result = 0; // Не совпадает пароль
		}

		return $result;
	}

}



?>