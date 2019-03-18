<?php  

namespace core\classes;

class Cookie
{
	public static function set($key, $value, $time = 604800)
	{
		setcookie($key, $value, time() + $time, '/');
	}


	public static function get($key)
	{
		if(isset($_COOKIE[$key])) {
			return $_COOKIE[$key];
		}
		return false;
	}


	public static function delete($key)
	{
		if(isset($_COOKIE[$key])) {
			setcookie($key, "", time() - 100);
		}
	}
}

?>