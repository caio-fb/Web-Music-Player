<?php 
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Allow-Headers: Content-Type");
	require_once "Connection.php";

	$playlists = [];

	$db = Connection::getDb();
	$query = "SELECT nome FROM playlist";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);	

	foreach ($result as $row) {
	    $nome = $row['nome'];

	    array_push($playlists, [$nome]);
	}

	header('Content-Type: application/json');
	echo json_encode($playlists);
	
	
	?>