<?php 

namespace core\classes;

use core\components;

class Controller {

	public $loggedUser = false;

	public function __construct()
	{
		Session::init();

		if(Session::get('login') !== NULL){
			$this->loggedUser = true;
		}
	}


}


?>