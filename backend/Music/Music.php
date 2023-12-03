<?php 
	require_once "../Connection.php";
	class Music {
		private $nome;
		private $artista;
		private $genero;
		private $link;
		private $curtida;
		private $db;

		public function __construct($nome , $artista , $genero , $link){
			$this->nome = $nome;
			$this->artista = $artista;
			$this->genero = $genero;
			$this->link = $link;
			$this->curtida = 0;
			$this->db = Connection::getDb();
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function musicExists(){
			$query = "SELECT link FROM musicas WHERE link = :link";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(":link", $this->__get('link'));			
			$stmt->execute();
			$result = $stmt->fetch(); 

			if($result != false){
				return true;
			} else{
				return false;
			}
		}

		public function register(){
			$nome = $this->__get('nome');
			if(!empty($nome) && !$this->musicExists()){
			    $query = "insert into musicas (nome, artista, genero, link, curtida)values(:nome, :artista, :genero, :link, :curtida)";
				$stmt = $this->db->prepare($query);
				$stmt->bindValue(':nome', $nome);
				$stmt->bindValue(':artista', $this->__get('artista'));
				$stmt->bindValue(':genero', $this->__get('genero')); 
				$stmt->bindValue(':link', $this->__get('link')); 
				$stmt->bindValue(':curtida', $this->__get('curtida')); 
				$result = $stmt->execute();
			}			
		}

		public function idMusic($nome , $artista){
			$query = "select musica_id into musicas (nome, artista) values (:nome, :artista)";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':nome', $nome);
			$stmt->bindValue(':artista', $artista);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
	};
?>