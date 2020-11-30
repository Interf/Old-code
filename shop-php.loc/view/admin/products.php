<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Change Products</title>
	<!-- CSS -->
	<link rel="stylesheet" href="/media/css/style.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	
	<div class="container">


		<h2 class="del-prod-toggle" style="cursor: pointer;">Удаление товара</h2>
		<table class="table del-prod" style="display: none;">
			<thead>
				<tr>
					<th>ID</th>
					<th>brand</th>
					<th>type</th>
					<th>img</th>
					<th>info</th>
					<th>price</th>
					<th>is_new</th>
					<th>is_discount</th>
					<th>location</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($prod_arr as $prod) : ?>
					<tr>
						<th scope="row"><?php echo $prod->id; ?></th>
						<td><?php echo $prod->brand; ?></td>
						<td><?php echo $prod->type; ?></td>
						<td><?php echo $prod->img; ?></td>
						<td><?php echo $prod->info; ?></td>
						<td><?php echo $prod->price; ?></td>
						<td><?php echo $prod->is_new; ?></td>
						<td><?php echo $prod->is_discount; ?></td>
						<td><?php echo $prod->location; ?></td>
						<td><a class="del_prod" href="#" data-id="<?php echo $prod->id; ?>">Удалить</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<h2 class="add-prod-toggle" style="cursor: pointer;">Добавление товара</h2>
		<table class="table add-prod" style="display: none;">
			<thead>
				<tr>
					<th>brand</th>
					<th>type</th>
					<th>img</th>
					<th>info</th>
					<th>price</th>
					<th>is_new</th>
					<th>is_discount</th>
					<th>location</th>
				</tr>
			</thead>
			<tbody>

				<tr>
					<td><input type="text" name="brand"></td>
					<td><input type="text" name="type"></td>
					<td><input type="text" name="img"></td>
					<td><input type="text" name="info"></td>
					<td><input type="number" name="price"></td>
					<td><input type="checkbox" name="is_new"></td>
					<td><input type="checkbox" name="is_discount"></td>
					<td><input type="number" name="location"></td>
					<td><a class="add_prod btn btn-success" href="#">Добавить товар</a></td>
				</tr>

			</tbody>
		</table>

		<h2 class="change-prod-toggle" style="cursor: pointer;">Редактирование товаров</h2>
		<table class="table change-prod" style="display: none;">
			<thead>
				<tr>
					<th>ID</th>
					<th>brand</th>
					<th>type</th>
					<th>img</th>
					<th>info</th>
					<th>price</th>
					<th>is_new</th>
					<th>is_discount</th>
					<th>location</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($prod_arr as $prod) : ?>
					<tr>
						<th scope="row"><?php echo $prod->id; ?></th>
						<td><input type="text" name="brand" value="<?php echo $prod->brand; ?>"></td>
						<td><input type="text" name="type" value="<?php echo $prod->type; ?>"></td>
						<td><input type="text" name="img" value="<?php echo $prod->img; ?>"></td>
						<td><input type="text" name="info" value="<?php echo $prod->info; ?>"></td>
						<td><input type="number" name="price" value="<?php echo $prod->price; ?>"></td>

						<td><input type="checkbox" name="is_new" <?php if($prod->is_new) :?> checked <?php endif; ?>></td>

						<td><input type="checkbox" name="is_discount" <?php if($prod->is_discount) :?> checked <?php endif; ?>  ></td>

						<td><input type="number" name="location" value="<?php echo $prod->location; ?>"></td>
						<td><a class="change_prod" href="#" data-id="<?php echo $prod->id; ?>">Изменить</a></td>
					</tr>
				<?php endforeach; ?>
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