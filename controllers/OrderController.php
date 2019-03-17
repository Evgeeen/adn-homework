<?php  

use core\classes\Controller;
use models\Order;

class OrderController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->model = new Order();
	}


	public function actionIndex()
	{

		require_once 'view/order/index.php';
		return true;
	}
}

?>