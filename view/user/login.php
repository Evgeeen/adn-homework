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
				<form class="form-auth" action="/auth" method="POST">
					<label for="login">login</label>
					<input class="form-control" type="text" name="login">
					<label for="password">password</label>
					<input class="form-control" type="password" name="password">
					<input type="submit" value="Войти">
				</form>
			</div>
		</div>
	</div>
</body>


</html>