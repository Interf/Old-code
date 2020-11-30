<?php

namespace App;



class Router extends Data
{
	private $routes;

	public function __construct()
	{
		$this->routes = include_once(Data::ROUTES);
	}

	private function getUri()
	{
		if(!empty($_SERVER['REQUEST_URI'])) {
			return trim(strip_tags($_SERVER['REQUEST_URI']));
		}
	}

	public function run()
	{
		$uri = $this->getUri();

		foreach($this->routes as $uriPattern => $path) {
			if(preg_match("~$uriPattern~", $uri)) {
				$str_path = preg_replace("~$uriPattern~", $path, $uri);
				$arr_path = explode("/", $str_path);
				$controllerName = "\App\Controllers\\".ucfirst(array_shift($arr_path))."Controller";
				$actionName = "action".ucfirst(array_shift($arr_path));
				$parametrs = $arr_path;
				$controllerFile = ROOT.$controllerName.".php";

				if(file_exists($controllerFile)) {
					include_once($controllerFile);
				} else {
					echo "Загрузка контроллера";
				}

				if(!method_exists($controllerName, $actionName)) {
					echo "Ошибка метода";
				}

				$controllerObj = new $controllerName;
				$result = call_user_func_array([$controllerName, $actionName], $parametrs);
				if($result != false) {
					break;
				}
			}
		}
	}

}