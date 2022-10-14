<?php

	namespace APP\Controllers;

	use MF\Controller\Action;
	use MF\Model\Container;

	use App\Models\Usuario;

	class IndexController extends Action {

		//CARREGA A PÁGINA PRINCIPAL
		public function index(){
			
			$this->render('index', 'layout');

		}

		//CARREGA A PÁGINA DE CADASTRO
		public function inscreverse(){

			$this->view->erro = '';

			$this->view->nome = '';
			$this->view->email = '';
			$this->view->senha = '';
			
			$this->render('inscreverse', 'layout');

		}

		//REGISTRA UM USUÁRIO
		public function registrar(){

			$usuario = Container::getModel('Usuario');
			$usuario->__set('nome', $_POST['nome']);
			$usuario->__set('email', $_POST['email']);
			$usuario->__set('senha', md5($_POST['senha']));

			if (strlen($usuario->__get('nome')) <= 3 || strlen($usuario->__get('email')) <= 3 || strlen($usuario->__get('senha')) <= 3) {
				
				$this->view->erro = 'erro1';

				$this->erro();

			} else if (!$usuario->verificarEmail() == '') {

				$this->view->erro = 'erro2';

				$this->erro();

			} else {
				$usuario->registrar();

				$this->render('cadastro', 'layout');
			}


		}

		//PÁGINA PARA ERRO NO REGISTRO
		public function erro(){
			$this->view->nome = $_POST['nome'];
			$this->view->email = $_POST['email'];
			$this->view->senha = $_POST['senha'];

			$this->render('inscreverse', 'layout');
		}

	}

?>