<?php

$db = Db::Connect();

$id = (int) $_POST['id'];

$del_db = $db->prepare("DELETE FROM `menu` WHERE `id` = :id");
$del_db->execute(array(":id"=>$id));

if ($del_db->rowCount() >= 1) {
	echo json_encode(1);
} else {
	echo json_encode("Ошибка при удалении");
}




?>