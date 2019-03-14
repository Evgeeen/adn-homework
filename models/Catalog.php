<?php  

namespace models;

use PDO;
use core\classes\{Model, File};


class Catalog extends Model
{
	public function getProducts()
	{
		$query_stmt = $this->db->prepare("
			SELECT products.*,  pr_size.width, pr_size.height
			FROM products 
			INNER JOIN product_sizes pr_size ON products.size = pr_size.id;");
		$query_stmt->execute();
		$result = $query_stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $key => $product ) {
			$result[$key]['image'] = unserialize($product['image']);
		}

		return $result;
	}	


	public function getProduct($id)
	{
		$query_stmt = $this->db->prepare("
			SELECT products.*,  pr_size.width, pr_size.height
			FROM products 
			INNER JOIN product_sizes pr_size ON products.size = pr_size.id
			WHERE product.id = :id;");
		$query_stmt->execute(array('id' => $id));
		$result = $query_stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}


	public function addProduct($params, $file = 0)
	{
		unset($params['submit']);

		if($file['picture']['size'] !== 0){
			$files = File::upload($file);
			$params['image'] = serialize($files);
		}

		$query_stmt = $this->db->prepare("
			INSERT INTO products (name, descr, image, size) 
			VALUES (:name, :descr, :image, :size)");
		$result = $query_stmt->execute($params);

		return $result;
	}


	public function editProduct($id, $params)
	{
		unset($params['submit']);
		$params['id'] = $id;

		$query_stmt = $this->db->prepare("
			UPDATE products
			SET id = ?, name = ?, descr = ?, image = ?, size = ?");
		$result = $query_stmt->execute($params);

		return $result;

	}
}

?>