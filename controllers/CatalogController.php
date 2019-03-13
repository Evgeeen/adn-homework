<?php  

use core\classes\Controller;

class CatalogController extends Controller 
{
	public function actionIndex()
	{
		echo 'Catalog';

		require_once 'view/catalog/index.php';
		return true;
	}
}

?>