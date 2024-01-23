<?php 
	header('Access-Control-Allow-Origin: *');
	// Permite que o cliente envie os cabeçalhos necessários para a requisição
	header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
	// Permite que o cliente faça requisições POST
	header('Access-Control-Allow-Methods: POST');

	require_once "../Connection.php";

	$search = $_POST['search'];
	$playlists = [];

	$db = Connection::getDb();
	$query = "SELECT playlist_id, nome  FROM playlist WHERE nome LIKE :search"; 
	$stmt = $db->prepare($query);
	$stmt->bindValue(":search", "%" . $search . "%");
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);	

	foreach ($result as $row) {
		$playlist_id = $row["playlist_id"];
	    $nome = $row['nome'];

	    array_push($playlists, [$playlist_id, $nome]);
	}

	header('Content-Type: application/json');
	echo json_encode($playlists);


?>