<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	public function initRoutes($value=''){
		
		$routes['home'] = array(
			'route' => '/',
			'controller' => 'IndexController',
			'action' => 'index'
		);

		$routes['inscreverse'] = array(
			'route' => '/inscreverse',
			'controller' => 'IndexController',
			'action' => 'inscreverse'
		);

		$routes['registrar'] = array(
			'route' => '/registrar',
			'controller' => 'IndexController',
			'action' => 'registrar'
		);

		$routes['cadastro'] = array(
			'route' => '/cadastro',
			'controller' => 'IndexController',
			'action' => 'cadastro'
		);

		$routes['autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);

		$routes['sair'] = array(
			'route' => '/sair',
			'controller' => 'AuthController',
			'action' => 'sair'
		);

		$routes['timeline'] = array(
			'route' => '/timeline',
			'controller' => 'AppController',
			'action' => 'timeline'
		);

		$routes['inserirTweet'] = array(
			'route' => '/inserir_tweet',
			'controller' => 'AppController',
			'action' => 'inserirTweet'
		);

		$routes['removerTweet'] = array(
			'route' => '/remover_tweet',
			'controller' => 'AppController',
			'action' => 'removerTweet'
		);

		$routes['quemSeguir'] = array(
			'route' => '/quem_seguir',
			'controller' => 'AppController',
			'action' => 'quemSeguir'
		);

		$routes['pesquisarPor'] = array(
			'route' => '/pesquisarPor',
			'controller' => 'AppController',
			'action' => 'pesquisarPor'
		);

		$routes['follow'] = array(
			'route' => '/follow',
			'controller' => 'AppController',
			'action' => 'follow'
		);

		$routes['unfollow'] = array(
			'route' => '/unfollow',
			'controller' => 'AppController',
			'action' => 'unfollow'
		);

		$this->setRoutes($routes);

	}

}

?>