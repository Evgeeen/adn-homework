<?php  

namespace models;

use core\classes\Form;

class LoginForm extends Form
{
	public $firstname;
	public $lastname;
	public $patronymic;
	public $phone;
	public $adress;

	public function __construct($data)
	{
		$this->firstname = $data['firstname'];
		$this->lastname = $data['lastname'];
		$this->patronymic = $data['patronymic'];
		$this->phone = $data['phone'];
		$this->adress = $data['adress'];
	}


	public function validate()
	{
		
	}
}

?>