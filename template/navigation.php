<nav>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<ul>
					<li><a href="/">Главная</a></li>
					<li><a href="/catalog">Каталог</a></li>
					<li><a href="/cart">Корзина</a></li>
				</ul>
			</div>
			<div class="col-md-2">
				<?php 
					if($this->loggedUser) {
						echo '<a href="/user/settings">Настройки</a>';
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