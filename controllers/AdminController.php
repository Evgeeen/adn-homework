<?php 

use core\classes\AdminBaseController;
use models\{User, Cart, Catalog};

class AdminController extends AdminBaseController 
{
	public function __construct()
	{
		parent::__construct();
	}


	public function actionIndex()
	{
		

		require_once 'view/admin/index.php';
		return true;
	}


	public function actionUsers($page = 1)
	{
		$user = new User();
		$user_list = $user->getUsersList();
		
		require_once 'view/admin/usersList.php';
		return true;
	}


	public function actionUser($id)
	{
		$user = new User();
		$user_data = $user->getUser($id);

		require_once 'view/admin/user.php';
		return true;
	}


	public function actionUserEdit($id)
	{
		$user = new user();

		if(isset($_POST['submit'])) {
			$user->editUser($id, $_POST);	
		}
		
		$user_data = $user->getUser($id);

		require_once 'view/admin/userEdit.php';
		return true;
	}	


	public function actionCatalog()
	{
		$catalog = new Catalog();
		$products_list = $catalog->getProducts();

		require_once 'view/admin/catalog.php';
		return true;
	}


	public function actionProduct($id)
	{
		$catalog = new Catalog();
		$product_data = $catalog->getProducts();

		return true;
	}


	public function actionProductAdd()
	{
		$catalog = new Catalog();

		if(isset($_POST['submit'])) {
			$add_result = $catalog->addProduct($_POST, $_FILES);	
		}
		
		require_once 'view/admin/productAdd.php';
		return true;
	}


	public function actionProductEdit($id)
	{
		$catalog = new Catalog();
		
		if(isset($_POST['submit'])) {
			$product_data = $catalog->getProduct($id);
			$edit_result = $catalog->editProduct($id, $_POST, $_FILES, $product_data['image']);	
		}

		$product_data = $catalog->getProduct($id);

		require_once 'view/admin/productEdit.php';
		return true;
	}
}

?>