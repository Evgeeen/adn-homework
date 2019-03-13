<?php 

namespace core\classes;

use core\components\Database;

class Model {

	public $db;

	public function __construct()
	{
		$this->db = Database::getConnection();
	}
}

?>