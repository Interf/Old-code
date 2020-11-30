<?php

$db = Db::Connect();

$id = (int) $_POST['id'];

$prod_db = $db->prepare("DELETE FROM `products` WHERE `id` = :id");
$prod_db->execute(array(":id"=>$id));

if ($prod_db->rowCount() >= 1) {
	echo json_encode(1);
} else {
	echo json_encode("Ошбика удаления");
}


?>