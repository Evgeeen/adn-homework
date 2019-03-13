<?php  

namespace models;

use PDO;
use core\classes\Model;

class User extends Model 
{
	public function getUsersList()
	{
		$query_stmt = $this->db->query('
			SELECT u.id, ua.firstname, ua.lastname, u.email, u.username, ua.email
			FROM users u 
			INNER JOIN user_attributes ua ON u.id = ua.id');
		$query_stmt->execute();
		$result = $query_stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}


	public function getUser($userID)
	{
		$query_stmt = $this->db->prepare('
			SELECT u.id, ua.firstname, ua.lastname, u.email, u.username, u.status, u.regdate, ua.email
			FROM users u 
			INNER JOIN user_attributes ua ON u.id = ua.id
			WHERE u.id = :userID');
		$query_stmt->execute(array('userID' => $userID));
		$result = $query_stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}


	public function editUser($id, $params)
	{
		unset($params['submit']);
		array_push($params, 'id' => $id);

		$query_stmt = $this->db->prepare("
			UPDATE users
			SET email = ?, password = ?, username = ?, status = ?");
		$result = $query_stmt->execute($params);

		return $result;
	}
}


?>