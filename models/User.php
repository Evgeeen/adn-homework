<?php  

namespace models;

use PDO;
use core\classes\Model;

class User extends Model 
{
	public function getUserData($username)
	{
		$query_stmt = $this->db->prepare("
			SELECT username, email, password, status, type
			FROM users 
			WHERE username = :username;");
		$query_stmt->execute(array('username' => $username));
		$result = $query_stmt->fetch(PDO::FETCH_ASSOC);
	
		return $result;
	}


	public function getUserAttributes($username)
	{
		$query_stmt = $this->db->prepare("
			SELECT firstname, lastname, patronymic, phone, city, adress
			FROM user_attributes 
			WHERE id = (SELECT id FROM users WHERE username = :username)");
		$query_stmt->execute(array('username' => $username));
		$result = $query_stmt->fetch(PDO::FETCH_ASSOC);
		
		return $result;
	}


	/**
	 * [getUsersList description]
	 * @return [type] [description]
	 */
	public function getUsersList()
	{
		$query_stmt = $this->db->query('
			SELECT u.id, ua.firstname, ua.lastname, u.email, u.username, u.email
			FROM users u 
			INNER JOIN user_attributes ua ON u.id = ua.id');
		$query_stmt->execute();
		$result = $query_stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	/**
	 * [getUser description]
	 * @param  [type] $userID [description]
	 * @return [type]         [description]
	 */
	public function getUser($userID)
	{
		$query_stmt = $this->db->prepare('
			SELECT u.*, ua.*
			FROM users u 
			INNER JOIN user_attributes ua ON u.id = ua.id
			WHERE u.id = :userID');
		$query_stmt->execute(array('userID' => $userID));
		$result = $query_stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}

	/**
	 * [addUser description]
	 * @param [array] $data [description]
	 */
	public function addUser($data)
	{
		$data['status'] = 0;
		$data['type'] = 1;

		$query_stmt = $this->db->prepare("
			INSERT INTO users (username, email, password, status, type)
			VALUES (:username, :email, :password, :status, :type)");
		$query_stmt->execute($data);
		$id = $this->db->lastInsertId();

		$query_stmt = $this->db->prepare("INSERT INTO user_attributes (id) VALUES (:id)");
		$result = $query_stmt->execute(array('id' => $id));
		
		return $result;
	}

	/**
	 * [editUser description]
	 * @param  [type] $id     [description]
	 * @param  [type] $params [description]
	 * @return [type]         [description]
	 */
	public function editUser($id, $params)
	{
		unset($params['submit']);
		$params['id'] = $id;

		$query_stmt = $this->db->prepare("
			UPDATE users u, user_attributes ua SET
				u.username = :username, 
				u.email = :email, 
				u.status = :status,
				u.password = :password, 
				ua.firstname = :firstname,
				ua.lastname = :lastname,
				ua.patronymic = :patronymic,
				ua.phone = :phone,
				ua.adress = :adress,
				ua.type = :type			
			WHERE u.id = :id AND ua.id = :id");
		$result = $query_stmt->execute($params);

		return $result;
	}


	public function setStatus($token, $user_data)
	{
		$current_token = md5($user_data['email']) . md5($user_data['username']);

		if($token == $current_token) {
			$query_stmt = $this->db->prepare("
				UPDATE users SET status = '1'
				WHERE username = :username");
			$query_stmt->execute(array('username' => $user_data['username']));
			return true;
		}
		return false;
	}


	public function setAttributes($login, array $parameters)
	{
		$parameters['username'] = $login;
		$query_stmt = $this->db->prepare("
			UPDATE user_attributes 
			SET firstname = :firstname, lastname = :lastname, patronymic = :patronymic, 
				phone = :phone, city = :city, adress = :adress
			WHERE (SELECT id FROM users WHERE username = :username)");
		$query_stmt->execute($parameters);
	}
}


?>