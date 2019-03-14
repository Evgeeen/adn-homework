<?php  

class Router {

	/**
	 * [$routes description]
	 * @var [type]
	 */
	private $routes;

	/**
	 * [__construct description]
	 */
	public function __construct()
	{
		$routes_path = ROOT . '/config/routes.php';
		$this->routes = include($routes_path);
	}

	/**
	 * [getURI description]
	 * @return [type] [description]
	 */
	private function getURI() 
	{
		if(!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	/**
	 * [run description]
	 * @return [type] [description]
	 */
	public function run()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {
            
            if(preg_match("~$uriPattern~", $uri)) {
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode("/",$internalRoute);

                $controllerName = ucfirst(array_shift($segments)) . "Controller";
                $actionName = "Action" . ucfirst(array_shift($segments));

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if(file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $segments);

                if($result !== '') {
                    break;
                }
            }
        }
        
        if(!isset($result)) {
        	return header('Location: /404.php');
        }
    }
}

?>