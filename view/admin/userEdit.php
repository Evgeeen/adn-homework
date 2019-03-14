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
					<form method="POST" action="/admin/userEdit/<?= $user_data['id']?>">
						<input type="hidden" class="form-control" value="<?= $user_data['id']?>">
						<label for="username">username</label>
						<input name="username" class="form-control" type="text" value="<?= $user_data['username']?>">
						<label for="email">email</label>
						<input name="email" class="form-control" type="text" value="<?= $user_data['email']?>">
						<label for="status">status</label>
						<input name="status" class="form-control" type="text" value="<?= $user_data['status']?>">
						<label for="firstname">firstname</label>
						<input name="firstname" class="form-control" type="text" value="<?= $user_data['firstname']?>">
						<label for="lastname">lastname</label>
						<input name="lastname" class="form-control" type="text" value="<?= $user_data['lastname']?>">
						<label for="patronymic">patronymic</label>
						<input name="patronymic" class="form-control" type="text" value="<?= $user_data['patronymic']?>">
						<label for="phone">phone</label>
						<input name="phone" class="form-control" type="text" value="<?= $user_data['phone']?>">
						<label for="adress">adress</label>
						<input name="adress" class="form-control" type="text" value="<?= $user_data['adress']?>">
						<label for="type">type</label>
						<input name="type" class="form-control" type="text" value="<?= $user_data['type']?>">

						<label for="password">type</label>
						<input name="password" class="form-control" type="password" value="">

						<input name="submit" class="form-control" type="submit" value="Сохранить">
					</form>	
				</div>
				
				
			</div>
		</div>
	</div>
</body>
</html>