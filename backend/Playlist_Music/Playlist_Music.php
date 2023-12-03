<?php 
	require_once "../Connection.php";

	class Playlist_Music {
		private $nome;

		public function __construct($idMusic, $idPlaylist){
			$this->idMusic = $idMusic;
			$this->idPlaylist = $idPlaylist;
			$this->db = Connection::getDb();
		}

		public function __get($atributo){
			return $this->$atributo;
		}

		public function register() {
			$idMusic = $this->__get('idMusic');
			$idPlaylist = $this->__get('idPlaylist');
			if(!empty($idMusic) && !empty($idPlaylist))
			{
			    $query = "insert into playlist_musica (idMusic, idPlaylist)values(:idMusic, :idPlaylist)";
				$stmt = $this->db->prepare($query);
				$stmt->bindValue(':idMusic', $idMusic); 
				$stmt->bindValue(':idPlaylist', $idPlaylist); 
				$result = $stmt->execute();
			}
			
		}
	};

?>