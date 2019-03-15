<?php  

use core\classes\Controller;
use models\{User};

class UserController extends Controller 
{
	public function  __construct()
	{
		//parent::__construct();
		$this->model = new User();
	}
	public function actionLogin()
	{
		var_dump($_POST['login']);
		var_dump($_POST['password']);
		if(isset($_POST['name']) && isset($_POST['password'])) {
			var_dump($_POST['name']);
			$this->model->loginUser($_POST['name'], $_POST['password']);
		} 

		require_once 'view/user/login.php';
		return true;
	}


	public function actionLogout()
	{
		
	}
	
}

?>