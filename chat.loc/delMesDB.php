<?php

class DbBot
{
	private static function checkCountMessDb()
	{
		$db = Db::Connect();

		$count = $db->query("SELECT COUNT(`id`) as `count` FROM `chat`");
		$result = $count->fetchObject();

		return $result;
	}

	public static function delMessDb()
	{
		$count_db = self::checkCountMessDb();


		if ($count_db->count >= 20) {
			$db = Db::Connect();




			$first_db = $db->query("SELECT `id` FROM `chat` LIMIT 1");
			$first_id = $first_db->fetchObject();

			for ($i=$first_id->id; $i <=($first_id->id+9) ; $i++) { 
				$idArr[] = $i;
			}

			$idList = implode(",", $idArr);

			$del_db = $db->query("DELETE FROM `chat` WHERE `id` IN ($idList)");



		} else {
			return false;
		}


	}


}

?>