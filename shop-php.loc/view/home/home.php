<?php
include_once(ROOT.'/components/include_file/header.php'); 


$home_arr = Home::getHomeProd("all");




?>

<!-- Sort on main page -->
<div class="main_page_sort">
	<button class="btn-sort btn btn-success active" data-sort="all">Все</button>
	<button class="btn-sort btn btn-success" data-sort="new">Новинки</button>
	<button class="btn-sort btn btn-success" data-sort="discount">Скидки</button>
</div>


<!-- Product list -->
<div class="product-container row">
	<?php foreach($home_arr as $home) : ?>
		<div class="prod-item col-md-3">
			<?php if($home->is_new == 1) : ?>
				<div class="is_new">Новинка</div>
			<?php endif; ?>
			<?php if($home->is_discount == 1) : ?>
				<div class="is_discount">-20%</div>
			<?php endif; ?>
			<a href="/product/<?php echo $home->id; ?>">
				<img src="/media/images/<?php echo $home->img; ?>" alt="">
				<p class="prod-name">
					<span class="prod-brand"><?php echo $home->brand; ?></span>
					<span class="prod-type"><?php echo $home->type; ?></span>
				</p>
			</a>
			<div class="prod-info">
				<?php echo $home->info; ?>
			</div>
			<div class="prod-price">
				<?php echo $home->price; ?> руб
			</div>
			<?php if( @array_key_exists($home->id, $_SESSION['products']) ) : ?>
				<button class="btn in-cart">В корзине</button>
			<?php else : ?>
				<button class="btn btn-success add-to-cart" data-id="<?php echo $home->id; ?>">Добавить в корзину</button>
			<?php endif; ?>

		</div>
	<?php endforeach; ?>

</div>




<?php include_once(ROOT.'/components/include_file/footer.php'); ?>