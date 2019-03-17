<?php 

namespace models;

use core\classes\Form;

class RegistrationForm extends Form
{
	public $username;
	public $email;
	public $password;


	public function __construct($data)
	{
		$this->username = $data['username'];
		$this->email = $data['email'];
		$this->password = $data['password'];
	}


	public function validate()
	{
		if(empty($this->username) OR empty($this->password) OR empty($this->email)) {
			$this->addError('all', 'Все поля обязательны для заполнения');
			return false;
		}
		if(strlen($this->password) < 6) {
			$this->addError('password', 'Пароль слишком короткий');
			return false;
		}

		$this->password = md5($this->password);	
		
		$data =  array(
			'username' => $this->username,
			'email' => $this->email,
			'password' => $this->password
		);
		
		return $data;
	}
}

?>