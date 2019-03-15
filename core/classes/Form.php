<?php  

namespace core\classes;

abstract class Form 
{
	protected $_errors = array();

	public function addError($attribute, $error)
	{
		$this->_errors[$attribute] = $error;
	}

	public function getErrors()
	{
		return $this->_errors;
	}
}

?>