
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
		


		<h2 class="reg-btn" style="cursor: pointer;">Регистрация</h2>
		<form action="/" class="reg" style="display: none;">

			<div class="form-input">
				<input type="text" name="login" placeholder="Ваш логин">
			</div>

			<div class="form-input">
				<input type="email" name="email" placeholder="Ваш E-mail">
			</div>

			<div class="form-input">
				<input type="password" name="pass1" placeholder="Ваш пароль">
			</div>

			<div class="form-input">
				<input type="password" name="pass2" placeholder="Повторите ваш пароль">
			</div>

			<div class="form-input" style="margin-top: 5px;">
				<button type="button" class="btn btn-primary do_reg" name="do_reg">Зарегистрироваться</button>
			</div>

		</form>
		<div class="error-reg"></div>

		<h2 class="auth-btn" style="cursor: pointer;">Авторизация</h2>
		<form action="/" class="auth" style="display: none;">

			<div class="form-input">
				<input type="text" name="login" placeholder="Ваш логин">
			</div>

			<div class="form-input">
				<input type="password" name="pass" placeholder="Ваш пароль">
			</div>

			<div class="form-input" style="margin-top: 5px;">
				<button type="button" class="btn btn-primary do_auth" name="do_auth">Войти</button>
			</div>

		</form>
		<div class="error-auth"></div>

	</div>

	<!-- JS -->
	<script type="text/javascript" src="/media/js/jquery-3.3.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/media/js/script.js"></script>

</body>
</html>