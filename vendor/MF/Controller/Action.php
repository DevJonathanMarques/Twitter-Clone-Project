<?php

	namespace MF\Controller;

	abstract class Action {

		protected $view;

		public function __construct() {
			$this->view = new \stdClass();
		}

		public function render($page, $layout){

			$this->view->page = $page;
			
			require "../App/Views/".$layout.".phtml";

		}

		public function content(){

			$controller = get_class($this);

			$controller = str_replace('APP\\Controllers\\', '', $controller);

			$controller = str_replace('Controller', '', $controller);
			
			require "../App/Views/".$controller."/".$this->view->page.".phtml";

		}

	}

?>