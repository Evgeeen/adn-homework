<?php 

use core\classes\Controller;
use models\Cart;

class CartController extends Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->model = new Cart();
	}

	public function actionIndex()
	{
		$cart_list = $this->model->getCart();

		require_once 'view/cart/index.php';
		return true;
	}


	public function actionAdd()
	{
		if(isset($_POST) AND $_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->model->addToCart($_POST['id'], $_POST['quantity']);				
		}
		return true;
	}


	public function actionQuantity()
	{
		if(isset($_POST) AND $_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->model->changeQuantity($_POST['id'], $_POST['type']);
		}
		return true;
	}


	public function actionClear()
	{
		if(isset($_POST) AND $_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->model->clearCart();
		}
		return true;
	}


	public function actionRemoveItem()
	{

		if(isset($_POST) AND $_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->model->deleteCartItem($_POST['id']);
		}
		return true;
	}


	
}

?>