<?php
// Регистрация
if (isset($_POST['do_reg'])) {
	$login = trim(strip_tags($_POST['login']));
	$email = trim(strip_tags($_POST['email']));
	$pass1 = trim(strip_tags($_POST['pass1']));
	$pass2 = trim(strip_tags($_POST['pass2']));


	$errors = array();


	if (mb_strlen($login) < 3) {
		$errors[] = "Введите корректное имя";
	}

	if (mb_strlen($email) < 3) {
		$errors[] = "Введите корректный email";
	}
	if (mb_strlen($pass1) < 3) {
		$errors[] = "Введите корректный пароль";
	}
	if ($pass1 != $pass2) {
		$errors[] = "Пароли не совпадают";
	}


	if (Check::checkLogin($login)) {
		$errors[] = "Есть такой логин";
	}

	if (Check::checkEmail($email)) {
		$errors[] = "Есть такой email";
	}

	if (empty($errors)) {
		$pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
		if (Reg::Registr($login, $email, $pass_hash)) {
			echo json_encode(1);
		} else {
			echo json_encode("Ошибка в регистрации");
		}
	} else {
		echo json_encode($errors);
	}







}

if (isset($_POST['do_auth'])) {
	$login = trim(strip_tags($_POST['login']));
	$pass = trim(strip_tags($_POST['pass']));

	$errors = array();

	if (mb_strlen($login) < 3 || mb_strlen($pass) < 3) {
		$errors[] = "Введите корректные данные";
	}

	if (!Check::checkLogin($login)) {
		$errors[] = "Нет такого юзера";
	}

	if (!Check::checkPass($login, $pass)) {
		$errors[] = "Неверный пароль.";
	}

	if (empty($errors)) {
		$_SESSION['admin'] = 1;
		echo json_encode(1);
	} else {
		echo json_encode($errors);
	}

}







?>