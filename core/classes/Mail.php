<?php 

namespace core\classes;


use core\components\PHPMailer\PHPMailer;
use core\components\PHPMailer\SMTP;

class Mail extends PHPMailer
{
	public function __construct()
	{
		$config = require_once ROOT . '/config/mail_config.php';
		parent::__construct();

		$this->isSMTP();
		$this->Host = $config['host'];
		$this->SMTPAuth = true;
		$this->Username = $config['username'];
		$this->Password =  $config['password'];
		$this->SMTPSecure = $config['secure'];
		$this->Port = $config['port'];

		$this->setFrom($config['username']); // Ваш Email
		

	}
}

?>