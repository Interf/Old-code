<?php include_once(ROOT.'/components/include_file/header.php'); ?>


<h2>Корзина</h2>

<div class="cart-container">			
	<?php if( empty($_SESSION['products']) ) : ?>
		<h2>Корзина пуста</h2>
	<?php else : ?>
		<div class="cart">
			<?php foreach($cart_arr as $cart) : ?>
				<div class="cart-item">
					<a href="/product/<?php echo $cart->id; ?>"><?php echo $cart->brand; ?> <?php echo  $cart->type; ?></a> | <a class="del-from-cart" href="" data-id="<?php echo $cart->id; ?>">Удалить</a>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="total_sum">
			<b>Итог: </b><span><?php echo $total_sum->total_sum; ?></span> руб.
		</div>
		<a href="/cart/order">Оформить заказ</a>

	<?php endif; ?>

</div>









<?php include_once(ROOT.'/components/include_file/footer.php'); ?>