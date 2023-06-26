<?php 
	require_once "Connection.php";
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

		public function register() {
			 if (empty($this->nome)) {
		        throw new Exception('O campo nome não pode estar vazio.');
		    }

			$query = "insert into musicas (nome, artista, genero, link, curtida)values(:nome, :artista, :genero, :link, :curtida)";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':nome', $this->__get('nome'));
			$stmt->bindValue(':artista', $this->__get('artista'));
			$stmt->bindValue(':genero', $this->__get('genero')); 
			$stmt->bindValue(':link', $this->__get('link')); 
			$stmt->bindValue(':curtida', $this->__get('curtida')); 
			$result = $stmt->execute();
		}
	};

?>