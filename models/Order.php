<?php  

namespace models;

use PDO;
use core\classes\{Model, File};

class Order extends Model
{
	public function addOrder($username, $products)
	{
		$query_stmt = $this->db->prepare("
			INSERT INTO orders (`user_id`, `products`)
			VALUES ((SELECT id FROM users WHERE username = :username), :products)");
		$result = $query_stmt->execute(array('username' => $username, 'products' => $products));
	}
}

?>