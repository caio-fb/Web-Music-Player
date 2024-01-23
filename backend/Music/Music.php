<?php 
	require_once "../Connection.php";
	class Music {
		private $nome;
		private $artista;
		private $genero;
		private $link;
		private $db;

		public function __construct($nome , $artista , $genero , $link){
			$this->nome = $nome;
			$this->artista = $artista;
			$this->genero = $genero;
			$this->link = $link;
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
			    $query = "insert into musicas (nome, artista, genero, link, curtida)values(:nome, :artista, :genero, :link)";
				$stmt = $this->db->prepare($query);
				$stmt->bindValue(':nome', $nome);
				$stmt->bindValue(':artista', $this->__get('artista'));
				$stmt->bindValue(':genero', $this->__get('genero')); 
				$stmt->bindValue(':link', $this->__get('link')); 
				$result = $stmt->execute();
			}			
		}

	};
?>