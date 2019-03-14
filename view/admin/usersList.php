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
				<p>Пользователи</p>
				<?php foreach ($user_list as $data): ?>
					<a href="/admin/user/<?= $data['id'] ?>">
						<p><?= $data['username'] ?></p>
					</a>
				<?php endforeach ?>		
			</div>
		</div>
	</div>
 
</body>
</html>