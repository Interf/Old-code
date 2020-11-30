<?php include_once(ROOT.'/components/include_file/header.php'); ?>



		<h2>Оформление заказа</h2>

		<div class="order-container">			

			<form action="/">
				
				<div class="form-input">
					<input type="text" name="name" placeholder="Ваше имя">
				</div>

				<div class="form-input">
					<input type="email" name="email" placeholder="Ваш E-mail">
				</div>

				<div class="form-input">
					<input type="number" name="phone" placeholder="Ваш телефон">
				</div>

				<div class="form-input" style="margin-top: 5px;">
					<button type="button" class="btn btn-primary do_order" name="do_order">Заказать</button>
				</div>

			</form>

		</div>

	
<?php include_once(ROOT.'/components/include_file/footer.php'); ?>