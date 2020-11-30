<?php include_once(ROOT.'/components/include_file/header.php'); ?>



<!-- Product list -->
<div class="product-container row">



	<?php foreach($pagin_arr as $pagin) : ?>


		<div class="prod-item col-md-3">
			<?php if($pagin->is_new == 1) : ?>
				<div class="is_new">Новинка</div>
			<?php endif; ?>
			<?php if($pagin->is_discount == 1) : ?>
				<div class="is_discount">-20%</div>
			<?php endif; ?>
			<a href="/product/<?php echo $pagin->id; ?>">
				<img src="/media/images/<?php echo $pagin->img; ?>" alt="">
				<p class="prod-name">
					<span class="prod-brand"><?php echo $pagin->brand; ?></span>
					<span class="prod-type"><?php echo $pagin->type; ?></span>
				</p>
			</a>
			<div class="prod-info">
				<?php echo $pagin->info; ?>
			</div>
			<div class="prod-price">
				<?php echo $pagin->price; ?> &#8381;
			</div>
			<?php if( @array_key_exists($pagin->id, $_SESSION['products']) ) : ?>
				<button class="btn in-cart">В корзине</button>
			<?php else : ?>
				<button class="btn btn-success add-to-cart" data-id="<?php echo $pagin->id; ?>">Добавить в корзину</button>
			<?php endif; ?>

		</div>


	<?php endforeach; ?>


	

</div>


<div class="paginator" style="margin-top: 50px;">
	<?php for($i = 1; $i <= $max_page; $i ++) :?>
		<?php if($i == $page ||  ($i == 1 && $page == 0) ) : ?>
			<span style="color: green; font-size: 20px;"><?php echo $i; ?></span>
			<?php continue; endif;  ?>
			<a href="/products/<?php echo $sort; ?>/?page=<?php echo $i; ?>"><?php echo $i; ?></a>


		<?php endfor; ?>
	</div>









	<?php include_once(ROOT.'/components/include_file/footer.php'); ?>