<?php

$db = Db::Connect();

$title = trim(strip_tags($_POST['title']));
$url = trim(strip_tags($_POST['url']));
$trans = trim(strip_tags($_POST['trans']));

$add_menu_db = $db->prepare("INSERT INTO `menu`(`title`, `url`, `transcript`) VALUES (:title, :url, :trans)");
$add_menu_db->execute(array(":title"=>$title, ":url"=>$url, ":trans"=>$trans));

if ($add_menu_db->rowCount() >= 1) {
	echo json_encode(1);
} else {
	echo json_encode("Ошибка добовления пункта меню");
}

?>