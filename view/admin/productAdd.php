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
					<form method="POST" action="/admin/productAdd" enctype="multipart/form-data">
						<div class="form-group">
							<label for="name">name</label>
							<input class="form-control" name="name" type="text">
						</div>
						<div class="form-group">
							<label for="descr">descr</label>
							<input class="form-control" name="descr" type="text">	
						</div>
						<div class="form-group">
							<div id="image-container">
								<label for="image">image</label>
								<input class="form-control image-input" name="picture" type="file" >
							</div>	
							<input id="add-image" type="button" value="Добавить">
							<input id="del-image" type="button" value="Удалить">
						</div>
						<div class="form-group">
							<label for="size">size</label>
							<input class="form-control" name="size" type="text">
						</div>
						<input name="submit" type="submit" value="Сохранить" >
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>