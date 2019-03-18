<?php 

namespace core\classes;

use core\components;

class Controller 
{
	/**
	 * [$model description]
	 * @var [type]
	 */
	public $model;

	/**
	 * [$loggedUser description]
	 * @var boolean
	 */
	public $loggedUser = false;

	/**
	 * usernmae
	 * @var string
	 */
	public $username;

	/**
	 * [__construct description]
	 */
	public function __construct()
	{
		Session::init();

		if(Session::get('login') !== NULL){
			$this->loggedUser = true;
			$this->username = Session::get('login');
		}
	}


}


?>