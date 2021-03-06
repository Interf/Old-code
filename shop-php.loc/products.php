<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>My Shop Products</title>
	<!-- CSS -->
	<link rel="stylesheet" href="media/css/style.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	
	<div class="container">
		
		<!-- Logo -->
		<div class="logo">
			<a href=""><img src="media/images/logo.png" alt=""></a>
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
						<a href="/" class="nav-link">Пункт 1</a>
					</li>
					<li class="nav-item">
						<a href="/" class="nav-link">Пункт 2</a>
					</li>
					<li class="nav-item">
						<a href="/" class="nav-link">Пункт 3</a>
					</li>
				</ul>

			</div>
		</nav>

		<hr>

		<!-- Product list -->
		<div class="product-container row">

			<div class="prod-item col-md-3">

				<div class="is_new">Новинка</div>
				<div class="is_discount">-20%</div>
				<a href="/">
					<img src="media/images/1.png" alt="">
					<p class="prod-name">
						<span class="prod-brand">Brand</span>
						<span class="prod-type">Type</span>
					</p>
				</a>
				<div class="prod-info">
					Длина 23м, ширина 55м, высота 5м
				</div>
				<div class="prod-price">
					20999 руб.
				</div>
				<button class="btn btn-success add-to-cart" data-id="1">Добавить в корзину</button>

			</div>

		</div>

	</div>

	<!-- JS -->
	<script type="text/javascript" src="media/js/jquery-3.3.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script type="text/javascript" src="media/js/script.js"></script>

</body>
</html>