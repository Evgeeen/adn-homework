<?php 

use core\classes\Controller;
use models\Cart;

class CartController extends Controller 
{
	public function actionIndex()
	{
		$cart = new Cart();
		$cart->getCart();

		require_once 'view/cart/index.php';
		return true;
	}
}

?>