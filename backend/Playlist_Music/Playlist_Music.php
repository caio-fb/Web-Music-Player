<?php 
	require_once "../Connection.php";

	class Playlist_Music {
		private $musica_id;
		private $playlist_id;
		private $db;

		public function __construct($musica_id, $playlist_id){
			$this->musica_id = $musica_id;
			$this->playlist_id = $playlist_id;
			$this->db = Connection::getDb();
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function register() {
			$musica_id = $this->__get('musica_id');
			$playlist_id = $this->__get('playlist_id');
			if(!empty($musica_id) && !empty($playlist_id))
			{
			    $query = "insert into playlist_musica (musica_id, playlist_id)values(:musica_id, :playlist_id)";
				$stmt = $this->db->prepare($query);
				$stmt->bindValue(':musica_id', $musica_id); 
				$stmt->bindValue(':playlist_id', $playlist_id); 
				$result = $stmt->execute();
			}
			
		}
	};

?>