<?php

	namespace APP\Controllers;

	use MF\Controller\Action;
	use MF\Model\Container;

	use App\Models\Usuario;

	class AppController extends Action {

		//FUNÇÃO PARA VERIFICAR SE O USUÁRIO ESTÁ LOGADO
		public function validaLogin(){
			
			session_start();

			if (count($_SESSION) == 0) {
				header('location: /?erro=erro4');
			}

		}

		//CARREGA A TIMELINE E OS POSTS
		public function timeline(){

			//validação do login
			$this->validaLogin();

			//instância de Usuário
			$tweet = Container::getModel('Tweet');
			$tweet->__set('id_usuario', $_SESSION['id']);

			//paginação
			$total_tweets = $tweet->totalRegistros()[0];
			$tweetsPorPagina = 5;
			$total_de_paginas = ceil($total_tweets / $tweetsPorPagina);
			$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
			$deslocamento = ($pagina - 1) * $tweetsPorPagina;

			//info do usuário
			$this->view->tweets_usuário = $tweet->tweets_usuario()[0];
			$this->view->seguidores_usuario = $tweet->seguidores_usuario()[0];
			$this->view->usuario_seguindo = $tweet->usuario_seguindo()[0];

			//View
			$this->view->total_de_paginas = $total_de_paginas;
			$this->view->tweets = $tweet->exibir($tweetsPorPagina, $deslocamento);
			$this->render('timeline', 'layout');

		}

		//INSERE UM TWEET
		public function inserirTweet(){

			$this->validaLogin();

			$tweet = Container::getModel('Tweet');
			$tweet->__set('id_usuario', $_SESSION['id']);
			$tweet->__set('nome', $_SESSION['nome']);
			$tweet->__set('tweet', $_POST['tweet']);

			$tweet->inserir();

			header('location: /timeline');

		}

		//REMOVE UM TWEET
		public function removerTweet(){

			$this->validaLogin();

			$tweet = Container::getModel('Tweet');
			$tweet->__set('id', $_GET['id']);
			$tweet->__set('id_usuario', $_SESSION['id']);

			$tweet->remover();

			header('location: /timeline');

		}

		//EXIBE PAG DE PESQUISA POR USUÁRIOS
		public function quemSeguir(){

			$this->validaLogin();

			$tweet = Container::getModel('Tweet');
			$tweet->__set('id_usuario', $_SESSION['id']);

			//info do usuário
			$this->view->tweets_usuário = $tweet->tweets_usuario()[0];
			$this->view->seguidores_usuario = $tweet->seguidores_usuario()[0];
			$this->view->usuario_seguindo = $tweet->usuario_seguindo()[0];

			$this->view->usuarios = array();

			$this->render('quemSeguir', 'layout');

		}

		//PESQUISA POR UM USUÁRIO
		public function pesquisarPor(){

			$this->validaLogin();

			$tweet = Container::getModel('Tweet');
			$tweet->__set('id_usuario', $_SESSION['id']);

			$this->view->tweets_usuário = $tweet->tweets_usuario()[0];
			$this->view->seguidores_usuario = $tweet->seguidores_usuario()[0];
			$this->view->usuario_seguindo = $tweet->usuario_seguindo()[0];

			$usuario = Container::getModel('Usuario');
			$usuario->__set('nome', $_POST['pesquisarPor']);
			$usuario->__set('id', $_SESSION['id']);

			$usuarios = $usuario->getUsuarios();

			$this->view->usuarios = $usuarios;

			$this->render('quemSeguir', 'layout');

		}

		//SEGUE UM USUÁRIO
		public function follow(){

			$this->validaLogin();

			$usuario = Container::getModel('Usuario');
			$usuario->__set('id', $_GET['id']);

			$usuario->follow();

			header('location: /quem_seguir');

		}

		//PARA DE SEGUIR UM USUÁRIO
		public function unfollow(){

			$this->validaLogin();

			$usuario = Container::getModel('Usuario');
			$usuario->__set('id', $_GET['id']);

			$usuario->unfollow();

			header('location: /quem_seguir');

		}

	}

?>