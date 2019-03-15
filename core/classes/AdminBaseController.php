<?php 

namespace core\classes;

use core\classes\Session;


class AdminBaseController {
	
	public $status;

	public function __construct()
	{
		Session::init();

		if(!Session::get('logged')){
			Session::destroy();
			header('location: /user/login');
		}
	}
}


?>