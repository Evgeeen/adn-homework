<?php  

namespace models;

use core\classes\Form;
use models\User;

class LoginForm extends Form
{
	public $login;
	public $password;

	public function __construct($data)
	{
		$this->login = $data['login'];
		$this->password = $data['password'];
	}


	public function validate()
	{
		$user = new User();
		
		if(empty($this->login) || empty($this->password)) {
			$this->addError('all', 'Все поля обязательны для заполнения');
			return false;
		}
		$user_data = $user->getUserData($this->login);
		
		if($user_data) {
			
			if($user_data['password'] !== md5($this->password)) {
				$this->addError('password', 'Неверный логин или пароль');
				return false;
			}
			if($user_data['status'] == 0) {
				$this->addError('status', 'Пользователь не активирован');
				return false;
			}
		}
		else {
			$this->addError('user', 'Пользователь не зарегестрирован, пройти <a href="/registration">регистрацию.</a>');
			return false;
		}
		return $user_data;
	}
}

?>