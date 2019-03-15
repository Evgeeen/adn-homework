<?php 

namespace core\classes;

use core\classes\Session;


class AdminBaseController {
	
	public $status;

	public function __construct()
	{
		Session::init();

		if(Session::get('type') !== 'admin'){
			Session::destroy();
			header('location: /auth');
		}
	}
}


?>