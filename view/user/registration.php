<!DOCTYPE html>
<?php
    include ROOT . '/template/header.php';
?>
<body>
<?php 
	//include ROOT . '/template/navigation.php';
?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="error-block">
					<ul>
						<?php 
							if(isset($errors)) {
								foreach ($errors as $error) {
									echo '<li>' . $error . '</li>';
								}	
							} 
						?>
					</ul>
				</div>
				<form class="form-auth" action="/registration" method="POST">
					<label for="login">login</label>
					<input class="form-control" type="text" name="username">
					<label for="login">email</label>
					<input class="form-control" type="email" name="email">
					<label for="password">password</label>
					<input class="form-control" type="password" name="password">
					<input type="submit" value="Войти">
				</form>
			</div>
		</div>
	</div>
</body>


</html>