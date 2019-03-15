<?php  

use core\classes\Controller;
use models\Catalog;

class CatalogController extends Controller 
{


	public function __construct()
	{
		parent::__construct();
		$this->model = new Catalog();
	}


	public function actionIndex()
	{
		$products_list = $this->model->getProducts();

		require_once 'view/catalog/index.php';
		return true;
	}
}

?>