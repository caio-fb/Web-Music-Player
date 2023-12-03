<?php 
	require_once "../Connection.php";
	require_once "../Music/Music.php";

	class Playlist {
		private $nome;

		public function __construct($nome){
			$this->nome = $nome;
			$this->db = Connection::getDb();
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function playlistExists(){
			$query = "SELECT nome FROM playlist WHERE nome = :nome";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(":nome", $this->__get('nome'));			
			$stmt->execute();
			$result = $stmt->fetch(); 

			if($result != false){
				return true;
			} else{
				return false;
			}
		}

		public function register() {
			$nome = $this->__get('nome');
			if(!empty($nome) && !$this->playlistExists()){
			    $query = "insert into playlist (nome)values(:nome)";
				$stmt = $this->db->prepare($query);
				$stmt->bindValue(':nome', $nome); 
				$result = $stmt->execute();
			}
			
		}

		public function idPlaylist($nome){
			$query = "select playlist_id into musicas (nome) values (:nome)";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':nome', $nome);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}

		public function addMusic(){
			$idPlaylist = idPlaylist($playlistName);
		}
	};

?>