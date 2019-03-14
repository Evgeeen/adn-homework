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
				<ul>
					<li><?= $user_data['id'] ?></li>
					<li><?= $user_data['firstname'] ?></li>
					<li><?= $user_data['lastname'] ?></li>
					<li><?= $user_data['email'] ?></li>
					<li><?= $user_data['username'] ?></li>
					<li><a href="/admin/userEdit/<?= $user_data['id'] ?>">Редактировать</a></li>
					<li><a href="/admin/userDelete/<?= $user_data['id'] ?>">Удалить</a></li>

				</ul>
			</div>
		</div>
	</div>
</body>
</html>