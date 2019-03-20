<?php 

use core\classes\{Controller, Cookie, Mail};
use models\{User, Order, UserAttributesForm};

class OrderController extends Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->model = new Order();
	}

	/**
	 * adding order
	 */
	public function actionAdd()
	{
		if(isset($_POST) AND $_SERVER['REQUEST_METHOD'] == 'POST') {
			$to      = 'evgeniyy.lapin@gmail.com';
			$subject = 'Новый заказ shop';
			$message = 'hello';
			$headers = 'From: shop@example.com' . "\r\n" .
			    'Reply-To: shop@example.com' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers);

			/*$mail = new Mail();
			$mail->isHTML(true); 
			$mail->Subject = "Заголовок"; 
			$mail->Body = "Тело"; 
			$mail->addAddress("evgeniyy.lapin@gmail.com"); 
			
			if(!$mail->send()) {
			 echo "Message could not be sent.";
			 echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			 echo "ok";
			}*/

			$user_attributes_form = new UserAttributesForm($_POST);
		
			if($data = $user_attributes_form->validate()) {
				$user = new User();
				$user->setAttributes($this->username, $data);
				$this->model->addOrder($this->username, Cookie::get('cart'));
				
			}
		}

		require_once 'view/order/addOrder.php';
		return true;
	}
}