<?php

class Router
{
	private $routes;


	public function __construct()
	{
		$urlRoute = ROOT.'/config/routes.php';
		$this->routes = include_once($urlRoute);
	}

	private function getUrl()
	{
		if ( !empty($_SERVER['REQUEST_URI']) ) {
			return trim(strip_tags($_SERVER['REQUEST_URI']), "/");
		}
	}

	public function run()	
	{
		$url = self::getUrl();

		foreach ($this->routes as $urlPattern => $path) {
			if (preg_match("~$urlPattern~", $url)) {
				$innerPath = preg_replace("~$urlPattern~", $path, $url);
				$segments = explode("/", $innerPath);
				$controllerName = array_shift($segments)."Controller";
				$actionName = "action".array_shift($segments);
				$parametrs = $segments;
				$controlelrFile = ROOT."/controllers/".$controllerName.".php";

				if (file_exists($controlelrFile)) {
					include_once($controlelrFile);
				} else {
					echo "Ошибка в поиске контроллера";
				}

				if (!method_exists($controllerName, $actionName)) {
					echo "Ошибка в поиске экшена";
				}


				$controllerObject = new $controllerName;

				$result = call_user_func_array(array($controllerName, $actionName), $parametrs);

				if ($result != false) {
					break;
				}


			}
		}




	}



}


?>