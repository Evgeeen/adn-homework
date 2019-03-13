<?php 

namespace core\components;

use PDO;

class Database {

	/**
	 * [getConnection description]
	 * @return [type] [description]
	 */
	public static function getConnection()
	{
		$config = include ROOT . '/config/config.php';

		$host = $config['host'];
		$dbname = $config['dbname'];
		$dsn = "mysql:host=$host;dbname=$dbname";

		try {
            $conn = new PDO(
                $dsn,
                $config['dbuser'],
                $config['dbpassword'],
                [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
            );

            $conn->exec("set names utf8");
        }
        catch (\Exception $e) {
            var_dump($e);
        }

        return $conn;
	}

}

?>