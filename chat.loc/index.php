<?php
include_once('db.php');


$db = Db::Connect();


include_once("chat.php");

$chat_arr = Chat::getChat();




?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Chat</title>
	<!-- Css -->
	<link rel="stylesheet" href="/media/css/style.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	
	<div class="container">
		
		<h2 style="text-align: center;">Chat</h2>
		<div class="chat-container">
			<div class="chat">
				<?php if($chat_arr != null) : ?>
					<?php foreach($chat_arr as $chat) : ?>
						<div class="chat-item">
							<span class="chat-name"><?php echo $chat->autor; ?></span>
							<p class="chat-text">
								<?php echo $chat->message; ?>
							</p>
						</div>
					<?php endforeach; ?>
				<?php else : ?>
					Чат пуст
				<?php endif; ?>
			</div>
			<div class="form">
				<form action="/" class="form-add">
					<div class="form-item">
						<input type="text" name="autor" placeholder="Ваше имя">
					</div>
					<div class="form-item">
						<textarea name="message" id="" cols="22" rows="5" placeholder="Ваше сообщение"></textarea>
					</div>
					<div class="form-item">
						<button type="button" class="add_chat btn btn-primary" name="do_chat">Отправить</button>
					</div>
				</form>
			</div>
		</div>
		
		
	</div>




	<!-- JS -->
	<script type="text/javascript" src="/media/js/jquery-3.3.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/media/js/script.js"></script>


</body>
</html>