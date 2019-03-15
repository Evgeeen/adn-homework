<?php  

use core\classes\{Controller, Session};
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
		if(isset($_POST['login']) && isset($_POST['password'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];

			$result = $this->model->loginUser($login, $password);

			if(is_array($result)){
				$errors = $result;
			}
			else if($result == true) {
				Session::init();
				Session::set('login', $login);

				$userStatus = $this->model->getUserType($login);
				
				/**
				 * $userStatus:
				 * 1 - usualy user
				 * 2 - personal discount user
				 * 3 - admin
				 */
				switch ($userStatus) {
					case 1:
						Session::set('type', 'user');
						break;
					case 2:
						Session::set('type', 'opt');
						break;
					case 3:
						Session::set('type', 'admin');
						break;
				}
				header('Location: /');
			} 
		} 

		require_once 'view/user/login.php';
		return true;
	}


	public function actionLogout()
	{
		Session::init();

		if(Session::get('login') !== NULL) {
			Session::destroy();
			header('Location: /');
		}
		return true;
	}
	
}

?>