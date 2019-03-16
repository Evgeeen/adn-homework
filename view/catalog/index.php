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
									<input class="quantity" type="number" name="quantity" value="1">
									<!--<select size="5" multiple name="size">
										<option value="<?= $product['size'] ?>"></option>
									</select>-->
									<p></p>	
									<div class="descr">
										<p>Подробная инфомрация</p>
										<small><?= $product['descr'] ?></small>
									</div>
									<a class="add-cart" data-id="<?= $product['id'] ?>" href="javascript:;">Добавить в корзину</a>
								</div>
								
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	 $('.add-cart').click(function(e){
        var id = $(this).attr('data-id')
        var quantity = $(this).parent().find('.quantity').val();
        console.log(id);
        console.log(quantity);

        $.ajax({
            type: "POST",
            url: '/cart/add',
            data: {
            	id: id,
            	quantity: quantity 
            },
            success: function(data) {
                console.log(data);
            }   
        })
    })
</script>
</html>