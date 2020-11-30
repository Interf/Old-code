<?php
include_once(ROOT."/models/menu.php");
$menu_arr = Menu::getMenu();
include_once(ROOT.'/models/countCart.php');


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>My Shop</title>
	<!-- CSS -->
	<link rel="stylesheet" href="/media/css/style.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	
	<div class="container">
		
		<!-- Logo -->
		<div class="logo">
			<a href="/"><img src="/media/images/logo.png" alt=""></a>
		</div>

		<!-- Menu -->
		<nav class="navbar navbar-expand-lg">

			<!-- Hide button -->
			<button style="width: 100%;" class="navbar-toggler navbar-right" type="button" data-toggle="collapse" data-target="#navbarNav">
				<span>Открыть меню</span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">

				<ul class="navbar-nav mr-auto" style="text-align: center;">
					<li class="nav-item">
						<a href="/products" class="nav-link">Все товары</a>
					</li>
					<li class="nav-item">
						<a href="/products/new" class="nav-link">Новинки</a>
					</li>

					<?php foreach($menu_arr as $menu) : ?>
						<li class="nav-item">
							<a href="/products<?php echo $menu->url; ?>" class="nav-link"><?php echo $menu->title; ?></a>
						</li>
					<?php endforeach; ?>
					<li class="nav-item">
						<a href="/cart" class="nav-link">Корзина(<span class="count_cart"><?php echo Count::getCountCart(); ?></span>)</a>
					</li>
					<li class="nav-item">
						<a href="/administrator" class="nav-link">Админка</a>
					</li>

				</ul>

			</div>
		</nav>

		<hr>
