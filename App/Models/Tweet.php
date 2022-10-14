<?php

	namespace App\Models;

	use MF\Model\Model;

	class Tweet extends Model {

		private $id;
		private $id_usuario;
		private $nome;
		private $tweet;

		public function __get($atributo){
			return $this->$atributo;
		}

		public function __set($atributo, $valor){
			$this->$atributo = $valor;
		}

		//INSERE UM TWEET
		public function inserir(){
			
			$query = 'insert into tweets(id_usuario, nome, tweet)values(:id_usuario, :nome, :tweet)';
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
			$stmt->bindValue(':nome', $this->__get('nome'));
			$stmt->bindValue(':tweet', $this->__get('tweet'));
			$stmt->execute();

		}

		//RECUPERA O TOTAL DE REGISTROS
		public function totalRegistros(){
			
			$query = "
			select
				count(*) 
			from 
				tweets as t
			where
				t.id_usuario = :id_usuario
				or t.id_usuario in(select usuario_seguindo from usuarios_seguindo where id_usuario = :id_usuario)
			order by
				t.data desc
			";

			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
			$stmt->execute();

			return $stmt->fetch();

		}

		//EXIBE OS TWEETS
		public function exibir($limit, $offset){
			
			$query = "
			select
				t.id,
				t.nome, 
				t.id_usuario, 
				t.tweet, 
				date_format(t.data, '%d/%m/%Y %H:%i') as data  
			from 
				tweets as t
			where
				t.id_usuario = :id_usuario
				or t.id_usuario in(select usuario_seguindo from usuarios_seguindo where id_usuario = :id_usuario)
			order by
				t.data desc
			limit
				$offset, $limit
			";

			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);

		}

		//REMOVE OS TWEETS
		public function remover(){
			
			$query = 'delete from tweets where id = :id and id_usuario = :id_usuario';
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':id', $this->__get('id'));
			$stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
			$stmt->execute();

		}

		//VERIFICA QUANTOS TWEETS O USUÁRIO FEZ
		public function tweets_usuario(){
			
			$query = "select count(*) from tweets where id_usuario = :id_usuario";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
			$stmt->execute();

			return $stmt->fetch();

		}

		//VERIFICA QUANTO SEGUIDORES O USUÁRIO TEM
		public function seguidores_usuario(){
			
			$query = "select count(*) from usuarios_seguindo where id_usuario = :id_usuario";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
			$stmt->execute();

			return $stmt->fetch();

		}

		//VERIFICA QUANTOS PERFIS O USUÁRIO ESTÁ SEGUINDO
		public function usuario_seguindo(){
			
			$query = "select count(*) from usuarios_seguindo where usuario_seguindo = :id_usuario";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
			$stmt->execute();

			return $stmt->fetch();

		}

	}

?>