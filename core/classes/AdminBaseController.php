<?php 

namespace core\classes;

use core\classes\Session;


class AdminBaseController extends Controller{
	
	public $status;

	public function __construct()
	{
		//Session::init();
		parent::__construct();

		if(Session::get('type') !== 'admin'){
			Session::destroy();
			header('location: /auth');
		}
	}
}


?>