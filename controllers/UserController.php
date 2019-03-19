<?php  

use core\classes\{Controller, Session};
use models\{User, RegistrationForm, LoginForm};

class UserController extends Controller 
{
	public function  __construct()
	{
		parent::__construct();
		$this->model = new User();
	}

	/**
	 * user data from the form checked
	 * if the data is correct - logging in
	 * @return boolean
	 */
	public function actionLogin()
	{
		if(isset($_POST) AND $_SERVER['REQUEST_METHOD'] == 'POST') {
			$user_login_form = new LoginForm($_POST);

			if($data = $user_login_form->validate()) {
				Session::set('login', $data['username']);

				switch ($data['type']) {
					case 1:
						Session::set('type', 'user'); // usualy user
						break;
					case 2:
						Session::set('type', 'opt'); // personal discount user
						break;
					case 3:
						Session::set('type', 'admin'); // admin
						break;
				}
				header('Location: /');
			} 
			else {
				$errors = $user_login_form->getErrors();
			}
		}
		require_once 'view/user/login.php';
		return true;		
	}

	/**
	 * create a new user if the data is validated
	 * @return boolean
	 */
	public function actionRegistration()
	{
		if($this->loggedUser) {
			header('Location: /');
		}

		if(isset($_POST) AND $_SERVER['REQUEST_METHOD'] == 'POST') {
			$user_reg_form = new RegistrationForm($_POST);	

			if($data = $user_reg_form->validate()) {
				$test = $this->model->addUser($data);	
				if($test == true) {
					$token = md5($data['email']) . md5($data['username']);
					$link .= $_SERVER['HTTP_HOST'] . "/user/activate/" . $token . '&' . $data['username'] ."\n";

					$to      = 'evgeniyy.lapin@gmail.com';
					$subject = 'Новый заказ shop';
					$message = $link;
					$headers = 'From: shop@example.com' . "\r\n" .
					    'Reply-To: shop@example.com' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();
					
					header('Location: /registration/success/');
				}
			}
			else {
				$errors = $user_reg_form->getErrors();
			}
		}
		require_once 'view/user/registration.php';
		return true;
	}

	/**
	 * successful registration
	 * @return boolean
	 */
	public function actionRegistrationSuccess()
	{
		require_once 'view/user/registrationSucces.php';
		return true;
	}

	/**
	 * user activation, checks token sen by email
	 * @param  string $token unique user token
	 * @return boolean       
	 */
	public function actionActivate($token)
	{
		$parts = explode('&', $token);
		$user_data = $this->model->getUserData($parts[1]);

		if($user_data) {
			$this->model->setStatus($parts[0], $user_data);
			require_once 'view/user/activateSuccess.php';
		}
		return true;
	}

	/**
	 * user logout
	 * @return boolean
	 */
	public function actionLogout()
	{
		Session::init();

		if(Session::get('login') !== NULL) {
			Session::destroy();
			header('Location: /');
		}
		return true;
	}


	/**
	 * change user personal data
	 * @return boolean
	 */
	public function actionSettings()
	{
		$login = Session::get('login');

		if(isset($_POST) AND $_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->model->setAttributes($login, $_POST);
		}
		
		$user_data = $this->model->getUserData($login);
		$user_attributes = $this->model->getUserAttributes($login);
		
		require_once 'view/user/settings.php';
		return true;
	}
	
}

?>