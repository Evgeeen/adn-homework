<?php  

namespace models;

use PDO;
use core\classes\{Model, File};


class Catalog extends Model
{
	/**
	 * getting products list
	 */
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

	/**
	 * getting product by id
	 * @param  number $id product ID
	 */
	public function getProduct($id)
	{
		$query_stmt = $this->db->prepare("
			SELECT products.*, product_sizes.width, product_sizes.height
			FROM products 
			INNER JOIN product_sizes ON products.id = product_sizes.id
			WHERE  products.id = :id;");
		$query_stmt->execute(array('id' => $id));
		$result = $query_stmt->fetch(PDO::FETCH_ASSOC);
		$result['image'] = unserialize($result['image']);

		return $result;
	}

	/**
	 * adding new product with image
	 * @param array  $params product data array
	 * @param array $file   image data array
	 */
	public function addProduct($params, $file = 0)
	{
		unset($params['submit']);
		
		if($file['picture']['name'] !== NULL){
			$files = File::upload($file);
			$params['image'] = serialize($files);
		} else {
			$params['image'] = 'default-image';
		}

		$query_stmt = $this->db->prepare("
			INSERT INTO products (name, descr, image, size) 
			VALUES (:name, :descr, :image, :size)");
		$result = $query_stmt->execute($params);

		return $result;
	}

	/**
	 * editing product
	 * @param  number $id            product ID
	 * @param  array  $params        product params
	 * @param  array  $files         new image for product catalog
	 * @param  array  $current_image currently image from catalog
	 */
	public function editProduct($id, $params, $files, $current_image)
	{
		unset($params['submit']);
		$params['id'] = $id;

		if($files['picture']['size'] !== 0){
			$file_array = File::upload($files);
			$file_array = array_merge($file_array, $current_image);
			$params['image'] = serialize($file_array);
		}

		$query_stmt = $this->db->prepare("
			UPDATE products
			SET name = :name, descr = :descr, image = :image, size = :size
			WHERE id = :id");
		var_dump($params);
		$result = $query_stmt->execute($params);

		return $result;

	}
}

?>