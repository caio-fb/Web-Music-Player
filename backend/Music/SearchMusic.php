<?php 
	header('Access-Control-Allow-Origin: *');
	// Permite que o cliente envie os cabeçalhos necessários para a requisição
	header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
	// Permite que o cliente faça requisições POST
	header('Access-Control-Allow-Methods: POST');

	require_once "../Connection.php";

	$search = $_POST['search'];
	$musicas = [];

	$db = Connection::getDb();
	$query = "SELECT musica_id, nome, artista FROM musicas WHERE artista LIKE :search OR nome LIKE :search";
	$stmt = $db->prepare($query);
	$stmt->bindValue(":search", "%" . $search . "%");
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);	

	foreach ($result as $row) {
		$musica_id = $row['musica_id'];
	    $nome = $row['nome'];
	    $artista = $row['artista'];
	    

	    array_push($musicas, [$musica_id, $nome, $artista]);
	}

	header('Content-Type: application/json');
	echo json_encode($musicas);

?>