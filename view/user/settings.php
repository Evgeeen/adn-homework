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
				<div class="col-md-6">
					<p>Настройки пользовательских данных</p>
					<form method="POST" action="/user/settings">
						<div class="form-group">
							<label for="username">Логин</label>
							<input class="form-control" type="input" value="username" value="<?= $user_data['username']?>" disabled>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control" type="input" value="<?= $user_data['email']?>" disabled>
						</div>
						<div class="form-group">
							<label for="firstname">Как к вам обращаться</label>
							<input class="form-control changeable" type="input" name="firstname" value="<?= $user_attributes['firstname']?>" disabled>
						</div>
						<div>
							<label for="lastname">Фамилия</label>
							<input class="form-control changeable" type="input" name="lastname" value="<?= $user_attributes['lastname']?>" disabled>
						</div>
						<div>
							<label for="patronymic">Отчество</label>
							<input class="form-control changeable" type="input" name="patronymic" value="<?= $user_attributes['patronymic']?>" disabled>
						</div>
						<div>
							<label for="phone">Контактный телефон</label>
							<input class="form-control changeable" type="input" name="phone" value="<?= $user_attributes['phone']?>" disabled>
						</div>
						<div>
							<label for="city">Город</label>
							<input class="form-control changeable" type="input" name="city" value="<?= $user_attributes['city']?>" disabled>
						</div>
						<div>
							<label for="adress">Адрес</label>
							<input class="form-control changeable" type="input" name="adress" value="<?= $user_attributes['adress']?>" disabled>
						</div>
						<input class="change-settings" type="button" value="Изменить">
						<input type="submit" value="Сохранить">
					</form>
				</div>
				<div class="col-md-6">
					<table>
						<tr>
							<td>Номер</td>
							<td>Количество</td>
							<td>Дата</td>
						</tr>
						<?php foreach ($orders_list as $order): ?>
							<a href="">
								
								<tr>
									<td><?= $order['id'] ?></td>
									<td><?= count(unserialize($order['products'])) ?></td>
									<td><?= $order['date'] ?></td>
								</tr>
							</a>
						<?php endforeach ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$('.change-settings').click(function(e){
		var inputs = $('.changeable');
		if(inputs.attr('disabled')) {
			inputs.removeAttr('disabled');
			$(this).remove();
		}
	})
</script>
</html>