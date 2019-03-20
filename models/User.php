<?php  

namespace models;

use PDO;
use core\classes\Model;

class User extends Model 
{
	/**
	 * getting user data by username
	 * @param  string $username 
	 * @return array           user data
	 */
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

	/**
	 * getting user attributes by username
	 * @param  string $username 
	 * @return array           user attributes
	 */
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
	 * getting a list of user with full information about them
	 * @return array  full user list data
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
	 * getting data of user by user ID
	 * @param  number $userID unique user ID
	 * @return array         user data
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
	 * adding new user
	 * @param array $data user data
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
	 * editing user 
	 * @param  number $id     unique user ID
	 * @param  array $params  new user data
	 * @return boolean
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
				u.type = :type,			
				ua.firstname = :firstname,
				ua.lastname = :lastname,
				ua.patronymic = :patronymic,
				ua.phone = :phone,
				ua.adress = :adress
			WHERE u.id = :id AND ua.id = :id");
		$result = $query_stmt->execute($params);

		return $result;
	}

	/**
	 * seting user status adfter registration
	 * @param string $token     unique user token
	 * @param array $user_data array with username and email
	 */
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

	/**
	 * setting new user atributes 
	 * @param string $login      username
	 * @param array  $parameters user attributes data
	 */
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

	/**
	 * check on the existence of the user in the database
	 * @param  string $username 
	 */
	public function checkUsername($username)
	{
		$query_stmt = $this->db->prepare("
			SELECT id
			FROM users 
			WHERE username = :username;");
		$query_stmt->execute(array('username' => $username));
		$result = $query_stmt->fetch(PDO::FETCH_ASSOC);
		
		if(!$result) {
			return true;
		}
		return false;
	}

	/**
	 * check on the existence of the email in the database
	 * @param  string $email 
	 */
	public function checkEmail($email)
	{
		$query_stmt = $this->db->prepare("
			SELECT id
			FROM users 
			WHERE email = :email;");
		$query_stmt->execute(array('email' => $email));
		$result = $query_stmt->fetch(PDO::FETCH_ASSOC);
		
		if(!$result) {
			return true;
		}
		return false;
	}
}


?>