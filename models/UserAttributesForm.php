<?php  

namespace models;

use core\classes\Form;

class UserAttributesForm extends Form
{
	public $firstname;
	public $lastname;
	public $patronymic;
	public $phone;
	public $city;
	public $adress;

	public function __construct($data)
	{
		$this->firstname = $data['firstname'];
		$this->lastname = $data['lastname'];
		$this->patronymic = $data['patronymic'];
		$this->phone = $data['phone'];
		$this->city = $data['city'];
		$this->adress = $data['adress'];
	}


	public function validate()
	{
		$data =  array(
			'firstname' => $this->firstname,
			'lastname' => $this->lastname,
			'patronymic' => $this->patronymic,
			'phone' => $this->phone,
			'city' => $this->city,
			'adress' => $this->adress,
		);
		
		return $data;

	}
}

?>