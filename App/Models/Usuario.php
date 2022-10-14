<?php

	namespace App\Models;

	use MF\Model\Model;

	class Usuario extends Model {

		private $id;
		private $nome;
		private $email;
		private $senha;

		public function __get($atributo){
			return $this->$atributo;
		}

		public function __set($atributo, $valor){
			$this->$atributo = $valor;
		}

		//REGISTRA UM USUÁRIO
		public function registrar(){
			
			$query = 'insert into usuarios(nome, email, senha)values(:nome, :email, :senha)';
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':nome', $this->__get('nome'));
			$stmt->bindValue(':email', $this->__get('email'));
			$stmt->bindValue(':senha', $this->__get('senha'));
			$stmt->execute();

		}

		//VERIFICA SE O EMAIL ESTÁ REGISTRADO
		public function verificarEmail(){
			
			$query = 'select email from usuarios where email = :email';
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':email', $this->__get('email'));
			$stmt->execute();

			return $stmt->fetch(\PDO::FETCH_ASSOC);

		}

		//VALIDA LOGIN DO USUÁRIO
		public function validarUsuario(){
			
			$query = 'select id, nome, email, senha from usuarios where email = :email and senha = :senha';
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':email', $this->__get('email'));
			$stmt->bindValue(':senha', $this->__get('senha'));
			$stmt->execute();

			return $stmt->fetch(\PDO::FETCH_ASSOC);

		}

		//PESQUISA DE PERFIS
		public function getUsuarios(){
			
			$query = '
			select
				u.id,
				u.nome,
				(select count(*) from usuarios_seguindo as us where us.id_usuario = :id and us.usuario_seguindo = u.id) as seguindo_sn
			from
				usuarios as u
			where
				u.nome like :nome AND u.id != :id';

			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':nome', '%'.$this->__get('nome').'%'); //quem se deseja procurar
			$stmt->bindValue(':id', $this->__get('id')); //usuário da sessão
			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);

		}

		//SEGUE UM PERFIL
		public function follow(){
			
			$query = 'insert into usuarios_seguindo(id_usuario, usuario_seguindo)values(:id, :usuario_seguindo)';
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':id', $_SESSION['id']);
			$stmt->bindValue(':usuario_seguindo', $this->__get('id'));
			$stmt->execute();

		}

		//DEIXA DE SEGUIR UM PERFIL
		public function unfollow(){
			
			$query = 'delete from usuarios_seguindo where id_usuario = :id and usuario_seguindo = :usuario_seguindo';
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':id', $_SESSION['id']);
			$stmt->bindValue(':usuario_seguindo', $this->__get('id'));
			$stmt->execute();
			
		}

	}

?>