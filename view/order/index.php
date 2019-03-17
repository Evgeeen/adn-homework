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
				
			</div>
			<div class="col-md-6">
				<form method="POST" action="/order/confirm">
					<div class="form-group">
						<label for="firstname">Как к вам обращаться</label>
						<input class="form-control" type="input" name="firstname">
					</div>
					<div>
						<label for="lasttname">Фамилия</label>
						<input class="form-control" type="input" name="lasttname">
					</div>
					<div>
						<label for="patronymic">Отчество</label>
						<input class="form-control" type="input" name="patronymic">
					</div>
					<div>
						<label for="phone">Контактный телефон</label>
						<input class="form-control" type="input" name="phone">
					</div>
					<div>
						<label for="adress">Адрес</label>
						<input class="form-control" type="input" name="adress">
					</div>

					<input type="button" name="submit" value="Заказать">
				</form>
			</div>
		</div>
	</div>
</body>


</html>