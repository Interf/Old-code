<?php include_once(ROOT.'/components/include_file/header.php'); ?>

<!-- One Product  -->
<div class="product-container row">

	<?php if($one_prod != null) : ?>

		<div class="prod-item col-md-6">
			<?php if($one_prod->is_new == 1) : ?>
				<div class="is_new">Новинка</div>
			<?php endif; ?>
			<?php if($one_prod->is_discount == 1 ) : ?>
				<div class="is_discount">-20%</div>
			<?php endif; ?>
			<a href="/product/<?php echo $one_prod->id; ?>">
				<img src="/media/images/<?php echo $one_prod->img; ?>" alt="">
				<p class="prod-name">
					<span class="prod-brand"><?php echo $one_prod->brand; ?></span>
					<span class="prod-type"><?php echo $one_prod->type; ?></span>
				</p>
			</a>
			<div class="prod-info">
				<?php echo $one_prod->info; ?>
			</div>
			<div class="prod-price">
				<?php echo $one_prod->price; ?> &#8381;
			</div>
			<?php if( @array_key_exists($one_prod->id, $_SESSION['products']) ) : ?>
				<button class="btn in-cart">В корзине</button>
			<?php else : ?>
				<button class="btn btn-success add-to-cart" data-id="<?php echo $one_prod->id; ?>">Добавить в корзину</button>
			<?php endif; ?>

		</div>

	<?php else : ?>

		Нет данного товара
	<?php endif; ?>


</div>

<?php include_once(ROOT.'/components/include_file/footer.php'); ?>