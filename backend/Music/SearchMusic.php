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
	$query = "SELECT nome, artista, curtida FROM musicas WHERE artista LIKE :search OR nome LIKE :search";
	$stmt = $db->prepare($query);
	$stmt->bindValue(":search", "%" . $search . "%");
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);	

	foreach ($result as $row) {
	    $nome = $row['nome'];
	    $artista = $row['artista'];
	    $curtida = $row['curtida'];

	    array_push($musicas, [$nome, $artista, $curtida]);
	}

	header('Content-Type: application/json');
	echo json_encode($musicas);

?>