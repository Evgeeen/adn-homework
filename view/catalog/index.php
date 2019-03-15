<!DOCTYPE html>
<?php
    include ROOT . '/template/header.php';
?>
<body>
<?php 
	include ROOT . '/template/navigation.php';
?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<?php foreach ($products_list as $product): ?>
					<div class="product-block">
						<div class="row">
							<div class="col-md-6">
								<div class="image-product-block">
									<?php foreach ($product['image'] as $image): ?>
										<img src="<?= $image ?>" alt="<?= $product['name']?>">	
									<?php endforeach ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="product-info">
									<b><?= $product['name'] ?></b>
									<p>Цена: <?= $product['price'] ?></p>	
									<p data="<?= $product['size'] ?>">Размер: <?= $product['width'] ?>X<?= $product['height'] ?></p>
									<!--<select size="5" multiple name="size">
										<option value="<?= $product['size'] ?>"></option>
									</select>-->
									<p></p>	
									<div class="descr">
										<p>Подробная инфомрация</p>
										<small><?= $product['descr'] ?></small>
									</div>
								</div>
								<a href="/cart/add/<?= $product['id'] ?>">Добавить в корзину</a>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</body>
</html>