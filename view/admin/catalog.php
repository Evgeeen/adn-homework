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
						<b><?= $product['name'] ?></b>
						<small><?= $product['descr'] ?></small>

						<?php foreach ($product['image'] as $image): ?>
							<img src="<?= $image ?>" alt="<?= $product['name']?>">	
						<?php endforeach ?>
						<p><?= $product['size'] ?></p>
						<a href="/admin/productEdit/<?= $product['id'] ?>">Редактировать</a>
						<a href="/admin/productDel/<?= $product['id'] ?>">Удалить</a>

					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</body>
</html>