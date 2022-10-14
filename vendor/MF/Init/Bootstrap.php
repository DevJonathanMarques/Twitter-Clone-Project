<?php

	namespace MF\Init;

	abstract class Bootstrap {

		protected $routes;

		public function __construct(){
			$this->initRoutes();
			$this->run($this->getURL());
		}

		public function getRoutes(){
			return $this->routes;
		}

		public function setRoutes($valor){
			$this->routes = $valor;
		}

		public function run($url){
			
			foreach ($this->routes as $key => $route) {
				
				if ($url == $route['route']) {
					
					$controller = "App\\Controllers\\".$route['controller'];

					$action = $route['action'];

					$class = new $controller;
					$class->$action();

				}

			}

		}

		public function getURL(){
			return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		}

	}

?>