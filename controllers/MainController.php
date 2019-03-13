<?php 

//namespace controllers;

use core\classes\Controller;

class MainController extends Controller {

	public function actionIndex() {

		var_dump('Main Controller, action Index');
		return true;
	}

}

?>