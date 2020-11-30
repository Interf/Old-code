<?php

class Reg
{
	public static function Registr($login, $email, $pass)
	{
		$log = trim(strip_tags($login));
		$email = trim(strip_tags($email));
		$pass = trim(strip_tags($pass));

		$db = Db::Connect();

		$reg_db = $db->prepare("INSERT INTO `users`(`login`, `email`, `pass`) VALUES (:log, :email, :pass)");
		$reg_db->execute(array(":log"=>$log, ":email"=>$email, ":pass"=>$pass));

		if ($reg_db->rowCount() >= 1) {
			$result = 1; // Успешная регистрация
		} else {
			$result = 0; // Ошибка в регистрации
		}

		return $result;
	}
}


?>