<?php  

namespace models;

use PDO;
use core\classes\{Model, File};

class Order extends Model
{
	/**
	 * adding new order
	 * @param string $username 
	 * @param string $products serialized string with products id
	 */
	public function addOrder($username, $products)
	{
		$query_stmt = $this->db->prepare("
			INSERT INTO orders (`user_id`, `products`)
			VALUES ((SELECT id FROM users WHERE username = :username), :products)");
		$result = $query_stmt->execute(array('username' => $username, 'products' => $products));
	}

	/**
	 * getting orders by username
	 * @param  string $username 
	 * @return array           order list
	 */
	public function getOrders($username)
	{
		$query_stmt = $this->db->prepare("
			SELECT * FROM orders WHERE user_id = (SELECT id FROM users WHERE username = :username)");
		$query_stmt->execute(array('username' => $username));
		$result = $query_stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}
}

?>