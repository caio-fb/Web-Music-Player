<?php 
	require_once "Connection.php";
	class Playlist {
		private $nome;

		public function __construct($nome){
			$this->nome = $nome;
			$this->db = Connection::getDb();
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function register() {
			$nome = $this->__get('nome');
			if(!empty($nome))
			{
			    $query = "insert into playlist (nome)values(:nome)";
				$stmt = $this->db->prepare($query);
				$stmt->bindValue(':nome', $nome); 
				$result = $stmt->execute();
			}
			
		}
	};

?>