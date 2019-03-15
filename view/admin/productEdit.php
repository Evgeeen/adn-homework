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
			<div class="col-md-6">
				<div class="form-block">
					<form method="POST"  enctype="multipart/form-data">
						<input name="id" type="hidden" value="<?= $product_data['name'] ?>">
						<label for="name">name</label>
						<input class="form-control" name="name" type="text" value="<?= $product_data['name'] ?>">
						<label for="descr">descr</label>
						<input class="form-control" name="descr" type="text" value="<?= $product_data['descr'] ?>">
						<div class="current-images">
							<p>Текущие изображения</p>
							<?php foreach ($product_data['image'] as $image): ?>
								<img src="<?= $image ?>" alt="$product_data['name']">
							<?php endforeach ?>
						</div>
						<div id="image-container">
							<label for="image">image</label>
							<input class="form-control image-input" name="picture" type="file" value="/kek/kek.png">
						</div>
						<input id="add-image" type="button" value="Добавить">
						<input id="del-image" type="button" value="Удалить">
							
						<label for="size">size</label>
						<input class="form-control" name="size" type="text"  value="<?= $product_data['descr'] ?>">
						<input name="submit" type="submit" value="Сохранить" >
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>