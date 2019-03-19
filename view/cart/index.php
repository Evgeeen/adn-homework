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
			<div class="col-md-12 cart-block">

				<?php if (!$this->model->exist_cart): ?>
					<p>В корзине ничего нет</p>
				<?php elseif($this->model->exist_cart): ?>
					<?php foreach ($cart_list as $product): ?>
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
										<div class="product-quantity">
											<button class="cart-change minus" change-type="minus" data-id="<?= $product['id'] ?>">-</button>
											<input class="quantity" type="number" name="quantity" value="<?= $product['quantity'] ?>">
											<button class="cart-change plus" change-type="plus" data-id="<?= $product['id'] ?>">+</button>
										</div>
										<!--<select size="5" multiple name="size">
											<option value="<?= $product['size'] ?>"></option>
										</select>-->
										<p></p>	
										<div class="descr">
											<p>Подробная инфомрация</p>
											<small><?= $product['descr'] ?></small>
										</div>
										<input data-id="<?= $product['id'] ?>" class="cart-change" change-type="remove" type="submit" value="Удалить из корзины" >
									</div>
									
								</div>
							</div>
						</div>
					<?php endforeach ?>
					<?php if (!$this->loggedUser): ?>
						<div class="col-md-12">
							<p>Для оформления заказа вам необходимо зарегетрироваться</p>
						</div>
					<?php elseif($this->loggedUser): ?>
						<div class="col-md-12">
							<form method="POST" id="form-order">
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstname">Login</label>
										<input class="form-control" type="input" value="<?= $user_data['username'] ?>" disabled>
									</div>
									<div>
										<label for="lasttname">Email</label>
										<input class="form-control" type="email" value="<?= $user_data['email'] ?>" disabled>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstname">Как к вам обращаться</label>
										<input class="form-control" type="input" name="firstname" value="<?= $user_attributes['firstname'] ?>">
									</div>
									<div>
										<label for="lasttname">Фамилия</label>
										<input class="form-control" type="input" name="lastname" value="<?= $user_attributes['lastname'] ?>">
									</div>
									<div>
										<label for="patronymic">Отчество</label>
										<input class="form-control" type="input" name="patronymic" value="<?= $user_attributes['patronymic'] ?>">
									</div>
									<div>
										<label for="phone">Контактный телефон</label>
										<input class="form-control" type="input" name="phone" value="<?= $user_attributes['phone'] ?>">
									</div>
									<div>
										<label for="adress">Город</label>
										<input class="form-control" type="input" name="city" value="<?= $user_attributes['city'] ?>">
									</div>
									<div>
										<label for="adress">Адрес</label>
										<input class="form-control" type="input" name="adress" value="<?= $user_attributes['adress'] ?>">
									</div>
									<input  class="send-order" type="submit" name="submit" value="Заказать">
								</div>
							</form>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$('.cart-change').click(function(e){
        var id = $(this).attr('data-id');
        var type = $(this).attr('change-type');
        
        if(type == 'remove') {
        	var url = '/cart/remove';
        } else {
        	var url = '/cart/quantity';
        }
        $.ajax({
            type: "POST",
            url: url,
            data: {
            	id: id,
            	type: type 
            },
            success: function(data) {
                console.log(data);
            }   
        })
    });
    $('#form-order').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        
        $.ajax({
            type: "POST",
            url: '/order/send',
            data: formData,
            processData: false,
			contentType: false,
            success: function(res) {
            	setCookie('cart', "", {
				    expires: -1
				})
				$('.cart-block').html(res);
            }   
        })
    })
</script>
</body>
</html>