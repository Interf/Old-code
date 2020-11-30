<?php

$db = Db::Connect();

$title = trim(strip_tags($_POST['title']));
$url = trim(strip_tags($_POST['url']));
$trans = trim(strip_tags($_POST['trans']));
$id = (int) $_POST['id'];

$change_db = $db->prepare("UPDATE `menu` SET `title` = :title, `url`= :url, `transcript`= :trans WHERE `id` = :id");
$change_db->execute(array(":title"=>$title, ":url"=>$url, ":trans"=>$trans, ":id"=>$id));

if ($change_db->rowCount() >= 1) {
	echo json_encode(1);
} else {
	echo json_encode("Ошибка при обновлении пункта меню");
}




?>