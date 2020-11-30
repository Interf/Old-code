<?php
return array(

	"administrator/products" => "admin/prod",
	"administrator/menu" => "admin/menu",
	"administrator" => "admin/index",

	"cart/order" => "cart/order", // Оформление заказа
	"cart/add/([0-9]+)" => "cart/add/$1", // Добавление товара в корзину
	"cart/del/([0-9]+)" => "cart/del/$1", // Удаление товара из корзины
	"cart" => "cart/index", // Корзина


	"product/([0-9]+)" => "prod/one/$1", // Один товар
	"products/([a-z]+)" => "prod/categor/$1", // Товары по категории
	"products" => "prod/index", // Все товары

	"" => "home/index" // Главная страница

);









?>