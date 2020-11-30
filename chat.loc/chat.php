<?php

class Chat
{
	public static function getChat()
	{
		$db = Db::Connect();

		$chat_db = $db->query("SELECT * FROM `chat` ORDER BY `id` DESC LIMIT 7");

		while ($chat = $chat_db->fetchObject()) {
			$chat_arr[] = $chat;
		}

 		return $chat_arr;
	}

	public static function addChat($autor,$message)
	{
		$autor = trim(strip_tags($autor));
		$message = trim(strip_tags($message));

		$db = Db::Connect();

		$add_db = $db->prepare("INSERT INTO `chat`(`autor`, `message`) VALUES(:autor, :message)");
		$add_db->execute(array(":autor"=>$autor, ":message"=>$message));

		if ($add_db->rowCount() >=1 ) {
			$result = 1;
		} else {
			$result = "Ошибка в добавлении";
		}

		return $result;
	}

}


?>