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


$add_prod = $db->prepare("INSERT INTO `products`(`brand`, `type`, `img`, `info`, `price`, `is_new`, `is_discount`, `location`) VALUES (:brand, :type, :img, :info, :price, :is_new, :is_discount, :location)");
$add_prod->execute(array(":brand"=>$brand, ":type"=>$type, ":img"=>$img, ":info"=>$info, ":price"=>$price, ":is_new"=>$is_new, ":is_discount"=>$is_discount, ":location"=>$location));

if ($add_prod->rowCount() >= 1) {
	echo json_encode(1);
} else {
	echo json_encode("Ошибка добавления продукта");
}




?>