
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Change Menu</title>
	<!-- CSS -->
	<link rel="stylesheet" href="/media/css/style.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	
	<div class="container">
		<h2>Удаление пунктов меню</h2>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Url</th>
					<th>Transcript</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($menu_arr as $menu) : ?>
				<tr>
					<th scope="row"><?php echo $menu->id; ?></th>
					<td><?php echo $menu->title; ?></td>
					<td><?php echo $menu->url; ?></td>
					<td><?php echo $menu->transcript; ?></td>
					<td><a class="del_menu" href="#" data-id="<?php echo $menu->id; ?>">Удалить</a></td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>

		<h2>Изменение пунктов меню</h2>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Url</th>
					<th>Transcript</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($menu_arr as $menu) : ?>
				<tr class="change-menu">
					<th scope="row"><?php echo $menu->id; ?></th>
					<td><input type="text" name="title" value="<?php echo $menu->title; ?>"></td>
					<td><input type="text" name="url" value="<?php echo $menu->url; ?>"></td>
					<td><input type="text" name="transcript" value="<?php echo $menu->transcript; ?>"></td>
					<td><a class="change_menu" href="#" data-id="<?php echo $menu->id; ?>">Изменить</a></td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>

		<h2>Добавление пунктов меню</h2>
		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
					<th>Url</th>
					<th>Transcript</th>
				</tr>
			</thead>
			<tbody>
				<tr class="add-menu">
					<td><input type="text" name="title"></td>
					<td><input type="text" name="url"></td>
					<td><input type="text" name="trans"></td>
					<td><a class="add_menu" href="#" name="add_menu">Добавить</a></td>
				</tr>
			</tbody>
		</table>


	</div>

	<!-- JS -->
	<script type="text/javascript" src="/media/js/jquery-3.3.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/media/js/script.js"></script>

</body>
</html>