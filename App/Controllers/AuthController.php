<?php

	namespace APP\Controllers;

	use MF\Controller\Action;
	use MF\Model\Container;

	use App\Models\Usuario;

	class AuthController extends Action {

		//LOGA O USUÁRIO CASO A CONTA EXISTA
		public function autenticar(){
			
			$usuario = Container::getModel('Usuario');
			$usuario->__set('email', $_POST['email']);
			$usuario->__set('senha', md5($_POST['senha']));

			$validacao = $usuario->validarUsuario();

			if ($validacao == '') {
				
				header('location: /?erro=erro3');

			} else {

				session_start();

				$_SESSION['id'] = $validacao['id'];
				$_SESSION['nome'] = $validacao['nome'];

				header('location: /timeline');

			}

		}

		//USUÁRIO DESLOGA
		public function sair(){
			
			session_start();

			session_destroy();

			header('location: /');

		}

	}

?>