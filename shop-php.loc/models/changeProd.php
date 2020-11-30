<?php

$db = Db::Connect();

$brand = trim(strip_tags($_POST['brand']));
$type = trim(strip_tags($_POST['type']));
$img = trim(strip_tags($_POST['img']));
$info = trim(strip_tags($_POST['info']));
$price = trim(strip_tags($_POST['price']));
$is_new = trim(strip_tags($_POST['is_new']));
$is_discount = trim(strip_tags($_POST['is_discount']));
$location = trim(strip_tags($_POST['location']));
$id = (int) $_POST['id'];

$change_db = $db->prepare("UPDATE `products` SET `brand`=:brand, `type`=:type,`img`=:img,`info`=:info,`price`=:price,`is_new`=:is_new,`is_discount`=:is_discount,`location`=:location WHERE `id` = :id");
$change_db->execute(array(":brand"=>$brand,":type"=>$type,":img"=>$img,":info"=>$info,":price"=>$price,":is_new"=>$is_new,":is_discount"=>$is_discount,":location"=>$location, ":id"=>$id 	));

if ($change_db->rowCount() >= 1) {
	echo json_encode(1);
} else {
	echo json_encode("Ошибка редактирования товара");
}





?>