<nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php 
					if($this->loggedUser) {
						echo '<a href="/logout">Выход</a>';
					} 
					else {
						echo '<a href="/auth">Вход</a> ';
						echo '<a href="/registration">Регистрация</a>';	
					}
				?>
			</div>
		</div>
	</div>
</nav>